@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Create New Page</h2>
        <form action="/admin/page/store" method="POST">
            @csrf
            <div class="mb-3">
                <label>Component Name:</label>
                <input type="text" name="component" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Title:</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Description:</label>
                <textarea name="description" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label>Keywords:</label>
                <input type="text" name="keywords" class="form-control">
            </div>
            <div class="mb-3">
                <label>Message:</label>
                <input type="text" name="message" class="form-control">
            </div>
            <div class="mb-3">
                <label>Subtitle:</label>
                <input type="text" name="subtitle" class="form-control">
            </div>
            <div class="mb-3">
                <label>Email:</label>
                <input type="email" name="email" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Save Page</button>
        </form>
    </div>
@endsection
