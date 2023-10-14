@extends('back.layout.app')

@section('admin_title')
    Create Tag
@endsection

@section('admin_content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="d-flex align-items-center justify-content-between py-3 mb-4 mt-5">
            <h4 class="fw-bold"><span class="text-muted fw-light">Create Tag</h4>
            <a href="{{ route('tags.index') }}" class="btn btn-outline-primary">Go Back</a>
        </div>

        <form action="{{ route('tags.store') }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <h5 class="card-header">Tag</h5>
                        <div class="card-body">
                            <div>
                                <label for="defaultFormControlInput" class="form-label">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid  @enderror"
                                    id="defaultFormControlInput" aria-describedby="defaultFormControlHelp" name="name"
                                    value="{{ old('name') }}" />
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
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
