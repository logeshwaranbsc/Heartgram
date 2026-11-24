<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\OccasionSong;

class OccasionSongController extends Controller
{
    public function index()
    {
        $hasTable = true;
        $songs = collect();

        try {
            $songs = OccasionSong::orderBy('sort_order', 'asc')
                ->orderBy('id', 'asc')
                ->get();
        } catch (\Throwable $e) {
            $hasTable = false;
            session()->now('warning', 'The "occasion_songs" table does not exist in your MySQL database yet. Please run the SQL CREATE TABLE query provided below in phpMyAdmin.');
        }

        return view('admin.occasion-songs.index', compact('songs', 'hasTable'));
    }

    public function create()
    {
        $song = new OccasionSong();
        $song->is_active = true;
        $song->sort_order = 0;

        return view('admin.occasion-songs.form', compact('song'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'occasion_id' => 'required|string|max:100|unique:occasion_songs,occasion_id',
            'title' => 'required|string|max:255',
            'uppercase' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:100',
            'language' => 'nullable|string|max:100',
            'image' => 'nullable|string',
            'audio' => 'nullable|string', // Cloudinary audio URL
            'sort_order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');
        $validated['sort_order'] = $validated['sort_order'] ?? 0;
        if (empty($validated['uppercase'])) {
            $validated['uppercase'] = strtoupper($validated['title']);
        }

        OccasionSong::create($validated);

        return redirect()->route('admin.occasion-songs.index')
            ->with('success', 'Occasion song added successfully.');
    }

    public function edit($id)
    {
        $song = OccasionSong::findOrFail($id);
        return view('admin.occasion-songs.form', compact('song'));
    }

    public function update(Request $request, $id)
    {
        $song = OccasionSong::findOrFail($id);

        $validated = $request->validate([
            'occasion_id' => 'required|string|max:100|unique:occasion_songs,occasion_id,' . $song->id,
            'title' => 'required|string|max:255',
            'uppercase' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:100',
            'language' => 'nullable|string|max:100',
            'image' => 'nullable|string',
            'audio' => 'nullable|string', // Cloudinary audio URL
            'sort_order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');
        $validated['sort_order'] = $validated['sort_order'] ?? 0;
        if (empty($validated['uppercase'])) {
            $validated['uppercase'] = strtoupper($validated['title']);
        }

        $song->update($validated);

        return redirect()->route('admin.occasion-songs.index')
            ->with('success', 'Occasion audio and details updated successfully.');
    }

    public function quickAudioUpdate(Request $request, $id)
    {
        $song = OccasionSong::findOrFail($id);
        $song->audio = $request->input('audio');
        $song->save();

        return redirect()->route('admin.occasion-songs.index')
            ->with('success', 'Cloudinary audio URL for "' . $song->title . '" updated successfully!');
    }

    public function destroy($id)
    {
        $song = OccasionSong::findOrFail($id);
        $song->delete();

        return redirect()->route('admin.occasion-songs.index')
            ->with('success', 'Occasion song deleted successfully.');
    }

    public function seedDefaults()
    {
        $defaults = [
            [
                'occasion_id' => 'birthday',
                'title' => 'Birthday',
                'uppercase' => 'BIRTHDAY',
                'subtitle' => 'Make their day truly unforgettable',
                'category' => 'milestones',
                'language' => 'English',
                'image' => 'https://images.unsplash.com/photo-1558636508-e0db3814bd1d?q=80&w=400&auto=format&fit=crop',
                'audio' => null,
                'sort_order' => 1,
            ],
            [
                'occasion_id' => 'proposal',
                'title' => 'Proposal',
                'uppercase' => 'PROPOSAL',
                'subtitle' => 'The question of forever and always',
                'category' => 'love',
                'language' => 'Tamil',
                'image' => 'https://images.unsplash.com/photo-1515934751635-c81c6bc9a2d8?q=80&w=400&auto=format&fit=crop',
                'audio' => null,
                'sort_order' => 2,
            ],
            [
                'occasion_id' => 'valentines-day',
                'title' => 'Valentine’s Day',
                'uppercase' => 'VALENTINE’S DAY',
                'subtitle' => 'Whispered straight from the heart',
                'category' => 'love',
                'language' => 'Hindi',
                'image' => 'https://images.unsplash.com/photo-1518199266791-5375a83190b7?q=80&w=400&auto=format&fit=crop',
                'audio' => null,
                'sort_order' => 3,
            ],
            [
                'occasion_id' => 'wedding',
                'title' => 'Wedding',
                'uppercase' => 'WEDDING',
                'subtitle' => 'The soundtrack to your sacred vows',
                'category' => 'love',
                'language' => 'Telugu',
                'image' => 'https://images.unsplash.com/photo-1519741497674-611481863552?q=80&w=400&auto=format&fit=crop',
                'audio' => null,
                'sort_order' => 4,
            ],
            [
                'occasion_id' => 'love-and-romance',
                'title' => 'Love & Romance',
                'uppercase' => 'LOVE & ROMANCE',
                'subtitle' => 'Every beat written just for you',
                'category' => 'love',
                'language' => 'English',
                'image' => 'https://images.unsplash.com/photo-1522673607200-164d1b6ce486?q=80&w=400&auto=format&fit=crop',
                'audio' => null,
                'sort_order' => 5,
            ],
            [
                'occasion_id' => 'friends',
                'title' => 'Friends',
                'uppercase' => 'FRIENDS',
                'subtitle' => 'Laughter, chai & memories we hold',
                'category' => 'milestones',
                'language' => 'Tamil',
                'image' => 'https://images.unsplash.com/photo-1529156069898-49953e39b3ac?q=80&w=400&auto=format&fit=crop',
                'audio' => null,
                'sort_order' => 6,
            ],
            [
                'occasion_id' => 'just-for-you',
                'title' => 'Just for You',
                'uppercase' => 'JUST FOR YOU',
                'subtitle' => 'Because you deserve something timeless',
                'category' => 'heartfelt',
                'language' => 'Hindi',
                'image' => 'https://images.unsplash.com/photo-1549465220-1a8b9238cd48?q=80&w=400&auto=format&fit=crop',
                'audio' => null,
                'sort_order' => 7,
            ],
            [
                'occasion_id' => 'anniversary',
                'title' => 'Anniversary',
                'uppercase' => 'ANNIVERSARY',
                'subtitle' => 'Every year a new favorite chapter',
                'category' => 'love',
                'language' => 'Malayalam',
                'image' => 'https://images.unsplash.com/photo-1494774157365-9e04c6720e47?q=80&w=400&auto=format&fit=crop',
                'audio' => null,
                'sort_order' => 8,
            ],
            [
                'occasion_id' => 'memories',
                'title' => 'Memories',
                'uppercase' => 'MEMORIES',
                'subtitle' => 'Preserved forever in sweet melody',
                'category' => 'heartfelt',
                'language' => 'Tamil',
                'image' => 'https://images.unsplash.com/photo-1534447677768-be436bb09401?q=80&w=400&auto=format&fit=crop',
                'audio' => null,
                'sort_order' => 9,
            ],
            [
                'occasion_id' => 'mothers-day',
                'title' => 'Mother’s Day',
                'uppercase' => 'MOTHER’S DAY',
                'subtitle' => 'For the heart that held you first',
                'category' => 'family',
                'language' => 'Tamil',
                'image' => 'https://images.unsplash.com/photo-1544717305-2782549b5136?q=80&w=400&auto=format&fit=crop',
                'audio' => null,
                'sort_order' => 10,
            ],
            [
                'occasion_id' => 'corporate',
                'title' => 'Corporate',
                'uppercase' => 'CORPORATE',
                'subtitle' => 'Honoring dedication & milestones',
                'category' => 'corporate',
                'language' => 'English',
                'image' => 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?q=80&w=400&auto=format&fit=crop',
                'audio' => null,
                'sort_order' => 11,
            ],
            [
                'occasion_id' => 'missing-you',
                'title' => 'Missing You',
                'uppercase' => 'MISSING YOU',
                'subtitle' => 'Counting sunsets until we meet again',
                'category' => 'heartfelt',
                'language' => 'Hindi',
                'image' => 'https://images.unsplash.com/photo-1518495973542-4542c06a5843?q=80&w=400&auto=format&fit=crop',
                'audio' => null,
                'sort_order' => 12,
            ],
            [
                'occasion_id' => 'long-distance',
                'title' => 'Long Distance',
                'uppercase' => 'LONG DISTANCE',
                'subtitle' => 'Two hearts under the same starry sky',
                'category' => 'love',
                'language' => 'English',
                'image' => 'https://images.unsplash.com/photo-1506863530036-1efeddceb993?q=80&w=400&auto=format&fit=crop',
                'audio' => null,
                'sort_order' => 13,
            ],
            [
                'occasion_id' => 'apology',
                'title' => 'Apology',
                'uppercase' => 'APOLOGY',
                'subtitle' => "For the sorry you couldn't say out loud",
                'category' => 'heartfelt',
                'language' => 'Hindi',
                'image' => 'https://images.unsplash.com/photo-1513201099705-a9746e1e201f?q=80&w=400&auto=format&fit=crop',
                'audio' => null,
                'sort_order' => 14,
            ],
        ];

        try {
            foreach ($defaults as $d) {
                OccasionSong::firstOrCreate(
                    ['occasion_id' => $d['occasion_id']],
                    $d
                );
            }
            return redirect()->route('admin.occasion-songs.index')
                ->with('success', 'All 14 default occasion categories have been populated into the database!');
        } catch (\Throwable $e) {
            return redirect()->route('admin.occasion-songs.index')
                ->with('error', 'Error creating categories. Please ensure the "occasion_songs" table exists in your database first.');
        }
    }
}
