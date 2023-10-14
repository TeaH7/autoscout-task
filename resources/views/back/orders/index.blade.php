@extends('back.layout.app')

@section('admin_title')
    Orders
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

                    <th>Name</th>
                    <th>Email</th>
                    <th>Created At</th>
                    <th>See Order</th>


                </tr>
            </thead>
            <tbody>
                @if ($orders->count())
                    @foreach ($orders as $order)
                        <tr>

                            <td>{{ $order->name }}</td>
                            <td>{{ $order->email }}</td>
                            <td>{{ $order->created_at }}</td>

                            <td>
                                <div>
                                    <a href="{{ route('orders.show', $order->id) }}" class="btn btn-outline-info btn-sm">Show
                                    </a>

                                </div>
                            </td>

                            </td>


                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="7">No Orders</td>
                    </tr>
                @endif

            </tbody>
        </table>
    </div>
@endsection
