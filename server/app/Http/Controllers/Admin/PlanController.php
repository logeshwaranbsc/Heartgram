<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\PageContent;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function index()
    {
        $plans = [
            'classic_name' => PageContent::get('plan_classic_name', 'Heartgram Classic'),
            'classic_price' => PageContent::get('plan_classic_price', '1,999'),
            'classic_subtitle' => PageContent::get('plan_classic_subtitle', 'FOR HEARTFELT PERSONAL GIFTS'),
            'classic_delivery' => PageContent::get('plan_classic_delivery', '3–5 days delivery time'),
            'classic_tagline' => PageContent::get('plan_classic_tagline', 'all-inclusive · no hidden fees'),

            'premium_name' => PageContent::get('plan_premium_name', 'Heartgram Premium'),
            'premium_price' => PageContent::get('plan_premium_price', '2,999'),
            'premium_subtitle' => PageContent::get('plan_premium_subtitle', 'FOR DEEPER EMOTIONAL STORIES'),
            'premium_badge' => PageContent::get('plan_premium_badge', 'MOST RECOMMENDED'),
            'premium_delivery' => PageContent::get('plan_premium_delivery', '1–2 days express delivery'),
            'premium_tagline' => PageContent::get('plan_premium_tagline', 'all-inclusive · no hidden fees'),
        ];

        return view('admin.plans', compact('plans'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'classic_name' => 'required|string|max:255',
            'classic_price' => 'required|string|max:50',
            'classic_subtitle' => 'nullable|string|max:255',
            'classic_delivery' => 'nullable|string|max:255',
            'classic_tagline' => 'nullable|string|max:255',

            'premium_name' => 'required|string|max:255',
            'premium_price' => 'required|string|max:50',
            'premium_subtitle' => 'nullable|string|max:255',
            'premium_badge' => 'nullable|string|max:255',
            'premium_delivery' => 'nullable|string|max:255',
            'premium_tagline' => 'nullable|string|max:255',
        ]);

        foreach ($validated as $key => $value) {
            // Strip any raw ₹ character so price formatting remains clean
            if (str_ends_with($key, '_price')) {
                $value = trim(str_replace('₹', '', $value));
            }
            PageContent::updateOrCreate(
                ['key' => 'plan_' . $key],
                ['value' => $value ?? '']
            );
        }

        return redirect()->route('admin.plans.index')->with('success', 'Plan pricing and details have been successfully updated.');
    }
}
