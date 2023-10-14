@extends('front.layout.app')

@section('content')
    <div class="container mt-5">
        <div class="d-flex align-items-center justify-content-between py-3 mb-4 mt-5">
            <h4 class="fw-bold"><span class="text-muted fw-light">Cart</h4>
            <a href="{{ route('home') }}" class="btn btn-outline-primary">Go Back</a>
        </div>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        @endif
        <form action="{{ route('order') }}" method="POST">
            @csrf
            <table class="table table-responsive">
                <thead>
                    <tr>

                        <th scope="col">Car</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col">Remove </th>


                    </tr>
                </thead>
                {{-- Cart Items --}}
                <tbody id="item-row">

                </tbody>
                {{-- Cart Items End --}}
            </table>
            @auth
                <div id="buy" class="d-flex justify-content-end">

                </div>
            @endauth
            @guest
                <div id="login">

                </div>
            @endguest
        </form>
    </div>
@endsection

@section('cart_script')
    <script>
        $(document).ready(function() {
            let cart = JSON.parse(localStorage.getItem("cart"));

            if (cart !== null) {
                cart.forEach((item, index) => {
                    $("#item-row").append(`
                     <tr>
                    <input type="hidden" name="cart_items[${index}][id]" value="${item.id}"/>
                    <td>${item.brand}<input type="hidden" name="cart_items[${index}][brand]" value="${item.brand}"/></td>
                    <td class="w-50">
                        <div class="input-group w-50">
                            <input type="button" value="-"
                                class="button-minus border rounded-circle  icon-shape icon-sm mx-1 " onclick="decreaseCart(${item.id})">

                                <p class="quantity-field-${item.id} border-0 text-center w-25 mb-0 d-flex align-items-center justify-content-center">${item.quantity}</p>
                            <input type="button" value="+"
                                class="button-plus border rounded-circle icon-shape icon-sm" onclick="increaseCart(${item.id})" data-field="quantity">
                                <input type="hidden" name="cart_items[${index}][qty]" value="${item.quantity}"/>
                        </div>
                    </td>
                    <td><span class="quantity-price-txt-${item.id}">${item.price}$</span> <input type="hidden" name="cart_items[${index}][price]" class="quantity-price-${item.id}" value="${item.price}"/></td>
                    <td><button type="button" class="btn btn-outline-primary" onclick="deleteItem(${item.id})">Remove Item</button></td>
                </tr>
                    `)
                });





                $('#order-now').on('click', function() {
                    localStorage.removeItem('cart')
                })
            }

            if (cart !== null) {
                if (cart.length !== 0) {
                    $('#buy').append(
                        '<button type="submit" id="order-now" class="btn btn-primary" onclick="emptyCart()">Buy</button>'
                        )
                    $('#login').append(`<a class="btn btn-outline-primary d-table ms-auto mt-2" aria-current="page"
                    href="{{ route('login') }}">Login</a>`)
                }
            }


        })
    </script>
@endsection
