@extends('back.layout.app')

@section('admin_title')
    Homepage
@endsection


@section('admin_content')
    <div class="container mt-5">
        <h3 class="text-center text-black">Welcome to Admin Panel</h3>
        <div class="d-flex align-items-center justify-content-center py-3 mb-4 mt-5">

            <a href="{{ route('cars.index') }}" class="btn btn-primary me-1 px-3">All Cars</a>
            <a href="{{ route('cars.create') }}" class="btn btn-primary me-1 px-3">Create Car</a>

            <a href="{{ route('tags.index') }}" class="btn btn-success ms-1 px-3">All Tags</a>
            <a href="{{ route('tags.create') }}" class="btn btn-success ms-1 px-3"> Create Tag</a>

        </div>

    </div>
@endsection
