<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Anime List</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-8 text-center">Anime List</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($anime as $animeEntry)
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <img src="{{ asset('/storage/' . $animeEntry->image_url) }}" alt="{{ $animeEntry->title }}" class="w-full h-64 object-cover">
                    <div class="p-4">
                        <h2 class="text-xl font-bold mb-2">{{ $animeEntry->title }}</h2>
                        <p class="text-gray-700">{{ $animeEntry->synopsis }}</p>
                        <div class="mt-4 flex justify-between">
                            <a href="{{ route('anime.show', ['anime' => $animeEntry->id]) }}" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
