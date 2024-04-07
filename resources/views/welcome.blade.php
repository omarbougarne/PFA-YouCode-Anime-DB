<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @auth
        @if(auth()->user()->role === 'admin')
            <p>Welcome, Admin!</p>
        @elseif(auth()->user()->role === 'mod')
            <p>Welcome, Moderator!</p>
        @else
            <p>Welcome, User!</p>
        @endif

        <form class="inline" method="POST" action="/logout">
            @csrf
            <button type="submit">
                <i class="fa-solid fa-door-closed"></i> Logout
            </button>
        </form>
    @else
        <li>
            <a href="/register" class="hover:text-laravel"><i class="fa-solid fa-user-plus"></i> Register</a>
        </li>
        <li>
            <a href="/login" class="hover:text-laravel"><i class="fa-solid fa-arrow-right-to-bracket"></i> Login</a>
        </li>
    @endauth
</body>
</html>




    {{-- <div class="container">
        <h1>Anime List</h1>
        <form action="{{ route('anime.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="synopsis">Synopsis:</label>
                <textarea name="synopsis" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="episodes">Episodes:</label>
                <input type="number" name="episodes" class="form-control">
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <select name="status" class="form-control">
                    <option value="ongoing">Ongoing</option>
                    <option value="completed">Completed</option>
                    <option value="on_hold">On Hold</option>
                    <option value="dropped">Dropped</option>
                </select>
            </div>
            <div class="form-group">
                <label for="rating">Rating:</label>
                <input type="text" name="rating" class="form-control">
            </div>
            <div class="form-group">
                <label for="start_date">Start Date:</label>
                <input type="date" name="start_date" class="form-control">
            </div>
            <div class="form-group">
                <label for="end_date">End Date:</label>
                <input type="date" name="end_date" class="form-control">
            </div>
            {{-- <div class="form-group">
                <label for="image_url">Image:</label>
                <input type="file" name="image_url" class="form-control-file">
            </div> --}}
            {{-- <button type="submit" class="btn btn-primary">Add Anime</button>
        </form>
        <hr>
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($anime as $animeEntry)
                    <tr>
                        <td>{{ $animeEntry->title }}</td>
                        <td>
                            <a href="{{ route('anime.edit', ['anime' => $animeEntry->id]) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('anime.destroy', ['anime' => $animeEntry->id]) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this anime?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div> --}}


