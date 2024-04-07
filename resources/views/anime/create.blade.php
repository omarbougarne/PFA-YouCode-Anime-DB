<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1>Anime List</h1>
        <form action="{{ route('anime.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <select name="status" class="form-control" required>
                    <option value="ongoing">Ongoing</option>
                    <option value="completed">Completed</option>
                    <option value="on_hold">On Hold</option>
                    <option value="dropped">Dropped</option>
                </select>
            </div>
            <div class="form-group">
                <label for="episodes">Episodes:</label>
                <input type="number" name="episodes" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="synopsis">Synopsis:</label>
                <textarea name="synopsis" class="form-control" rows="4"></textarea>
            </div>
            <div class="form-group">
                <label for="rating">Rating (out of 10):</label>
                <input type="number" name="rating" class="form-control" min="0" max="10" step="0.1">
            </div>
            <div class="form-group">
                <label for="start_date">Start Date:</label>
                <input type="date" name="start_date" class="form-control">
            </div>

            <div class="form-group">
                <label for="end_date">End Date:</label>
                <input type="date" name="end_date" class="form-control">
            </div>
            <div class="form-group">
                <label for="image_url">Image:</label>
                <input type="file" name="image_url" class="form-control-file">
            </div>
            <button type="submit" class="btn btn-primary">Add Anime</button>
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
                        <td>{{ $animeEntry->status }}</td>
                        <td>{{ $animeEntry->episodes }}</td>
                        <td>{{ $animeEntry->rating }}</td>
                        <td>{{ $animeEntry->synopsis }}</td>
                        <td>{{ $animeEntry->start_date }}</td>
                        <td>{{ $animeEntry->end_date }}</td>
                        <td><img src="{{ asset('/storage/' . $animeEntry->image_url) }}" alt="Anime Image"></td>
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
    </div>
</body>
</html>
