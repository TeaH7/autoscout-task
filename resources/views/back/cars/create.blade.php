@extends('back.layout.app')

@section('admin_title')
    Create Car
@endsection

@section('admin_content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="d-flex align-items-center justify-content-between py-3 mb-4 mt-5">
            <h4 class="fw-bold"><span class="text-muted fw-light">Create Car</h4>
            <a href="{{ route('cars.index') }}" class="btn btn-outline-primary">Go Back</a>
        </div>

        <form action="{{ route('cars.store') }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <h5 class="card-header">Car</h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">

                                    <label for="defaultFormControlInput" class="form-label">Brand</label>
                                    <input type="text" class="form-control @error('brand') is-invalid  @enderror"
                                        id="defaultFormControlInput" aria-describedby="defaultFormControlHelp"
                                        name="brand" value="{{ old('brand') }}" />
                                    @error('brand')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                                <div class="col-6">

                                    <label for="defaultFormControlInput" class="form-label">Model</label>
                                    <input type="text" class="form-control @error('model') is-invalid  @enderror"
                                        id="defaultFormControlInput" aria-describedby="defaultFormControlHelp"
                                        name="model" value="{{ old('model') }}" />
                                    @error('model')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                                <div class="col-6 mt-3">

                                    <label for="defaultFormControlInput" class="form-label">Engine Size</label>
                                    <input type="number" class="form-control @error('engine_size') is-invalid  @enderror"
                                        id="defaultFormControlInput" aria-describedby="defaultFormControlHelp"
                                        name="engine_size" value="{{ old('engine_size') }}" />
                                    @error('engine_size')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>

                                <div class="col-6 mt-3">
                                    <label for="defaultFormControlInput" class="form-label">Price</label>
                                    <input type="number" class="form-control @error('price') is-invalid  @enderror"
                                        id="defaultFormControlInput" aria-describedby="defaultFormControlHelp"
                                        name="price" value="{{ old('price') }}" />
                                    @error('price')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>

                                <div class="col-6 mt-3">
                                    <label for="defaultFormControlInput" class="form-label">Registration Date</label>
                                    <input type="date" class="form-control @error('price') is-invalid  @enderror"
                                        id="defaultFormControlInput" aria-describedby="defaultFormControlHelp"
                                        name="registration_date" value="{{ old('registration_date') }}" />
                                    @error('model')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-6 mt-3">
                                    <label for="exampleFormControlSelect1" name='is_active' class="form-label">Active?
                                    </label>
                                    <select class="form-select @error('is_active') is-invalid  @enderror" id="is_active"
                                        name='is_active'>
                                        <option selected disabled>-Zgjidh-</option>
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                    @error('is_active')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-6 mt-3">
                                    <label for="exampleFormControlSelect1" name='tag_id' class="form-label mb-3">Choose
                                        Tags
                                    </label>
                                    @if ($tags->count())
                                        @foreach ($tags as $tag)
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="{{ $tag->id }}"
                                                    id="flexCheckDefault" name='tags[]'>
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    {{ $tag->name }}
                                                </label>
                                            </div>
                                        @endforeach
                                    @endif

                                </div>
                            </div>




                        </div>
                    </div>
                </div>

            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
