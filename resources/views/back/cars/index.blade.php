@extends('back.layout.app')

@section('admin_title')
    Cars
@endsection

@section('admin_content')
    <div class="container mt-5">
        <div class="d-flex align-items-center justify-content-between py-3 mb-4 mt-5">
            <h4 class="fw-bold"><span class="text-muted fw-light">Cars List</h4>
            <a href="{{ route('cars.create') }}" class="btn btn-outline-primary">Create Car</a>
        </div>
        <table class="table">
            <thead>
                <tr>

                    <th>Brand</th>
                    <th>Model</th>
                    <th>Engine Size</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @if ($cars->count())
                    @foreach ($cars as $car)
                        <tr>

                            <td>{{ $car->brand }}</td>
                            <td>{{ $car->model }}</td>
                            <td>{{ $car->engine_size }}</td>
                            <td>{{ $car->price }}$</td>

                            <td>
                                <div>
                                    @if ($car->is_active == 0)
                                        <form action="{{ route('cars.approveCar', $car->id) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            @method('PUT')

                                            <button type="submit" class="btn btn-success  btn-sm px-2">
                                                Approve
                                            </button>
                                        </form>
                                    @else
                                        <form action="{{ route('cars.disapproveCar', $car->id) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            @method('PUT')

                                            <button type="submit" class="btn btn-danger btn-sm px-2">
                                                Dissaprove
                                            </button>
                                        </form>
                                    @endif

                                    <a href="{{ route('cars.edit', $car->id) }}" class="btn btn-outline-primary btn-sm">Edit
                                    </a>
                                    <a class="btn btn-outline-danger btn-sm" href="{{ route('cars.delete', $car->id) }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('delete-car-{{ $car->id }}').submit();">
                                        Delete
                                    </a>
                                    <form id="delete-car-{{ $car->id }}"
                                        action="{{ route('cars.delete', $car->id) }}" method="POST" class="d-none">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="7">No Cars </td>
                    </tr>
                @endif

            </tbody>
        </table>
    </div>
@endsection
