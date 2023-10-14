@extends('back.layout.app')

@section('admin_title')
    Order
@endsection

@section('admin_content')
    <div class="container mx-auto">
        <div class="d-flex align-items-center justify-content-between py-3 mb-4 mt-5">
            <h4 class="fw-bold"><span class="text-muted fw-light">Order</h4>
            <a href="{{ route('orders.index') }}" class="btn btn-outline-primary">Go Back</a>
        </div>
        <div class="col-12 mx-auto">
            <div class="card mb-4">

                <div class="card-body">
                    <div class="ms-2 mt-2">
                        <h4 class="card-title">{{ $order->name }}</h4>
                        <h5 class="card-subtitle mb-2 text-muted">{{ $order->email }}</h5>
                    </div>
                    <hr>
                    <h5 class="ms-2">Orders:</h5>

                    <div class="d-flex">
                        @foreach ($order->orderItems as $item)
                            <ul class="list-group w-25 ms-2">
                                <li class="list-group-item"> Brand: {{ $item->brand }}</li>
                                <li class="list-group-item"> Model: {{ $item->car->model }}</li>
                                <li class="list-group-item"> Quantity: {{ $item->qty }}</li>
                                <li class="list-group-item"> Total Price: {{ number_format($item->price) }}$</li>

                            </ul>
                        @endforeach
                    </div>


                </div>

            </div>

        </div>
    </div>
@endsection
