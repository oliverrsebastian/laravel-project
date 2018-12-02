<a href="{{ route('genres.insert') }}">Create Genre</a>

@if(isset($success))
    <div>{{ $success }}</div>
@endif

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
    </tr>
    @foreach($genres as $genre)
        <tr>
            <td>{{ $genre->id }}</td>
            <td>{{ $genre->name }}</td>
            <td><a href="{{ route('genres.edit', $genre->id) }}">Update</a></td>
            <td><a href="{{ route('genres.delete', $genre->id) }}">Remove</a></td>
        </tr>
    @endforeach
</table>
{{ $genres->links() }}