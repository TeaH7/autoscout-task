@extends('back.layout.app')

@section('admin_title')
    Edit Tag
@endsection

@section('admin_content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4 mt-5 text-center"><span class="text-muted fw-light">Edit Tag</h4>

        <form action="{{ route('tags.update', $tag->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <h5 class="card-header">Tag</h5>
                        <div class="card-body">
                            <div>
                                <label for="defaultFormControlInput" class="form-label">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid  @enderror"
                                    id="defaultFormControlInput" aria-describedby="defaultFormControlHelp" name="name"
                                    value="{{ $tag->name }}" />
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
