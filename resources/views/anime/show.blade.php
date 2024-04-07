<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $anime->title }} - Anime Detail</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-8 text-center">{{ $anime->title }} - Anime Detail</h1>
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <img src="{{ asset('/storage/' . $anime->image_url) }}" alt="{{ $anime->title }}" class="w-full h-64 object-cover">
            <div class="p-4">
                <h2 class="text-xl font-bold mb-2">{{ $anime->title }}</h2>
                <p class="text-gray-700">{{ $anime->synopsis }}</p>
            </div>
        </div>


        <div class="mt-8">
            <form action="{{ route('comments.store') }}" method="POST">
                @csrf
                <input type="hidden" name="anime_id" value="{{ $anime->id }}">
                <textarea name="content" placeholder="Enter your comment" class="w-full h-32 px-3 py-2 text-base placeholder-gray-600 border rounded-lg focus:outline-none focus:shadow-outline"></textarea>
                @error('content')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
                <button type="submit" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>
