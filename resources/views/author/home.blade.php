<a href="{{ route('authors.insert') }}">Create Author</a>

@if(isset($success))
    <div>{{ $success }}</div>
@endif

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Date Of Birth</th>
        <th>Country</th>
    </tr>
    @foreach($authors as $author)
        <tr>
            <td>{{ $author->id }}</td>
            <td>{{ $author->name }}</td>
            <td>{{ $author->dob }}</td>
            <td>{{ $author->country }}</td>
            <td><a href="{{ route('authors.edit', $author->id) }}">Update</a></td>
            <td><a href="{{ route('authors.delete.verify', $author->id) }}">Remove</a></td>
        </tr>
    @endforeach
</table>
{{ $authors->links() }}