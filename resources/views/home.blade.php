@extends('front.layout.app')

@section('title')
    Homepage
@endsection

@section('content')
    <div class="container-xl">

        <div class="row mt-5">
            <div class="col-12">
                <form action="{{ route('home') }}" method="GET">
                    <div class="input-group ">
                        <input type="search" class="form-control rounded me-2"
                            placeholder="Search by Brand, Engine or Price..." aria-label="Search"
                            aria-describedby="search-addon" name="search" />
                        <div class="col-12 col-md-3 me-2 mb-2 mb-md-0">
                            <input type="number" name="engine" placeholder="Engine Size" class="form-control py-2 col-2">
                        </div>
                        <div class="col-12 col-md-3  me-2 mb-2 mb-md-0">
                            <select name="price" id="" class="form-select py-2">
                                <option disabled selected class="text-gray">Price Range in $</option>
                                <option value="100-2000">100-2000</option>
                                <option value="2000-10000">2000-10000</option>
                                <option value="10000+">10000+</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-outline-primary">search</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row mt-5">
            @if ($cars->count())
                @foreach ($cars as $car)
                    <div class="col-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $car->brand }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{ $car->model }}</h6>
                                <p class="card-text">Engine: {{ $car->engine_size }}cc</p>
                                <p class="card-text">Registration Date: {{ $car->registration_date }}</p>
                                <h6 class="card-subtitle mb-2 text-muted">Specifics</h6>
                                <ul>

                                    @foreach ($car->tags as $tag)
                                        <li>{{ $tag->name }}</li>
                                    @endforeach


                                </ul>
                                <hr>
                                <div class="d-flex justify-content-between">
                                    <button type="submit" class="btn btn-primary btn-sm px-2"
                                        onclick="addToCart({
                                            id: `{!! $car->id !!}`,
                                        brand: `{!! $car->brand !!}`,
                                        quantity: 1,
                                        price:`{!! $car->price !!}`
                                    })">Add
                                        to
                                        Cart</button>

                                    <p>Price {{ $car->price }}$</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p>No Cars</p>
            @endif
        </div>
    </div>
@endsection
