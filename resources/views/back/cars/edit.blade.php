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



        <form action="" method="POST">
            @csrf
            @method('PUT')
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
                                        name="brand" value="{{ $car->brand }}" />
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
                                        name="model" value="{{ $car->model }}" />
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
                                        name="engine_size" value="{{ $car->engine_size }}" />
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
                                        name="price" value="{{ $car->price }}" />
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
                                        name="registration_date" value="{{ $car->registration_date }}" />
                                    @error('registration_date')
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
                                        <option value="0" {{ $car->is_active == 0 ? 'selected' : '' }}>No</option>
                                        <option value="1" {{ $car->is_active == 1 ? 'selected' : '' }}>Yes</option>
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
                                                <input class="form-check-input @error('tag_id') is-invalid  @enderror"
                                                    type="checkbox" value="{{ $tag->id }}" id="flexCheckDefault"
                                                    name='tags[]' {{ in_array($tag->id, $carTagsIds) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    {{ $tag->name }}
                                                </label>
                                            </div>
                                        @endforeach
                                    @endif

                                    @error('tag_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
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
