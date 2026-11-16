<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Heartgrams Admin Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
</head>
<body class="bg-[#fdf8f6] min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8 bg-white p-10 rounded-3xl shadow-[0_8px_30px_rgba(200,50,100,0.06)] border border-pink-50">
        <div>
            <div class="flex justify-center text-[#c02d4b] mb-6">
                <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 24 24"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
            </div>
            <h2 class="text-center text-3xl font-extrabold text-gray-900 font-['Playfair_Display']">
                Admin Area
            </h2>
            <p class="mt-2 text-center text-sm text-gray-600">
                Sign in to manage your Heartgrams
            </p>
        </div>
        
        @if ($errors->any())
            <div class="bg-red-50 text-red-700 p-4 rounded-xl text-sm font-medium">
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </div>
        @endif

        <form class="mt-8 space-y-6" action="{{ url('admin/login') }}" method="POST">
            @csrf
            <div class="rounded-md space-y-4">
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email address</label>
                    <input id="email" name="email" type="email" required class="appearance-none rounded-xl relative block w-full px-4 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-[#c02d4b] focus:border-[#c02d4b] focus:z-10 sm:text-sm transition-colors" placeholder="admin@heartgrams.com" value="{{ old('email') }}">
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <input id="password" name="password" type="password" required class="appearance-none rounded-xl relative block w-full px-4 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-[#c02d4b] focus:border-[#c02d4b] focus:z-10 sm:text-sm transition-colors" placeholder="••••••••">
                </div>
            </div>

            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input id="remember" name="remember" type="checkbox" class="h-4 w-4 text-[#c02d4b] focus:ring-[#c02d4b] border-gray-300 rounded text-pink-600">
                    <label for="remember" class="ml-2 block text-sm text-gray-900">
                        Remember me
                    </label>
                </div>
            </div>

            <div>
                <button type="submit" class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-xl text-white bg-[#c02d4b] hover:bg-[#9f253e] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#c02d4b] transition-colors shadow-lg shadow-pink-500/30">
                    Sign in
                </button>
            </div>
        </form>
    </div>
</body>
</html>
