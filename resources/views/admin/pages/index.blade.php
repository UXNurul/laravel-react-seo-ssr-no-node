@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Manage Pages</h2>
        <a href="/admin/page/create" class="btn btn-primary mb-3">Create New Page</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Component</th>
                    <th>Title</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pages as $page)
                    <tr>
                        <td>{{ $page->component }}</td>
                        <td>{{ $page->title }}</td>
                        <td>
                            <a href="/admin/page/{{ $page->id }}/edit" class="btn btn-sm btn-warning">Edit</a>
                            <form action="/admin/page/{{ $page->id }}/delete" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
