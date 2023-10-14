@extends('back.layout.app')

@section('admin_title')
    Tags
@endsection

@section('admin_content')

    <div class="container mx-auto">
        <div class="d-flex align-items-center justify-content-between py-3 mb-4 mt-5">
            <h4 class="fw-bold"><span class="text-muted fw-light">Tags List</h4>
            <a href="{{ route('tags.create') }}" class="btn btn-outline-primary">Create Tag</a>
        </div>
        <div class="col-12 mx-auto">



            <ul class="list-group">
                @if ($tags->count())
                    @foreach ($tags as $tag)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <p class='mb-0'>{{ $tag->name }}</p>
                            <div>
                                <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-outline-primary btn-sm">Edit

                                </a>
                                <a class="btn btn-outline-danger btn-sm" href="{{ route('tags.destroy', $tag->id) }}"
                                    onclick="event.preventDefault();
                                                     document.getElementById('delete-tag-{{ $tag->id }}').submit();">
                                    Delete
                                </a>
                                <form id="delete-tag-{{ $tag->id }}" action="{{ route('tags.destroy', $tag->id) }}"
                                    method="POST" class="d-none">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                        </li>
                    @endforeach
                @else
                    <li class="list-group-item d-flex justify-content-center align-items-center">
                        <p class='mb-0'>No Tags</p>
                    </li>
                @endif
            </ul>

        </div>

    </div>
@endsection
