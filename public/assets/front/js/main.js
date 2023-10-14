//add object to local storage
function addToCart(obj) {
    let cart = JSON.parse(localStorage.getItem("cart"));

    //check if cart exists
    if (cart === null || cart.length === 0) {
        //if cart does not exists create cart on storage
        cart = localStorage.setItem("cart", JSON.stringify([obj]));
    } else {
        //update storage
        cart.forEach((el) => {
            //if this object exists add quantity and multiply price
            if (el.id == obj.id) {
                el.quantity = el.quantity + 1;
                el.price = parseFloat(el.price) * el.quantity;

                localStorage.setItem("cart", JSON.stringify(cart));
            } else {
                //adde to existing cart
                localStorage.setItem("cart", JSON.stringify([...cart, obj]));
            }
        });
    }
}

// decrease quantity of one item by ID
function decreaseCart(id) {
    let cart = JSON.parse(localStorage.getItem("cart"));

    cart.forEach((el) => {
        //if id exists decrease qty and divide price
        if (el.id == id) {
            el.price = parseFloat(el.price) / el.quantity;
            el.quantity = el.quantity - 1;
            //if qty = 0 remove item from cart
            if (el.quantity === 0) {
                localStorage.setItem(
                    "cart",
                    JSON.stringify(cart.filter((el) => el.id != id))
                );
                window.location.reload();
            } else {
                //decrease qty
                localStorage.setItem("cart", JSON.stringify(cart));
                //update values on UI
                $(`.quantity-field-${id}`).text(el.quantity);
                $(`.quantity-price-${id}`).val(el.price);
                $(`.quantity-price-txt-${id}`).text(el.price + "$");
            }
        }
    });
}

// increase quantity of one item by ID
function increaseCart(id) {
    let cart = JSON.parse(localStorage.getItem("cart"));

    cart.forEach((el) => {
        //if id exists increase qty and multiply price
        if (el.id == id) {
            el.quantity = el.quantity + 1;
            el.price = parseFloat(el.price) * el.quantity;
            //increase qty
            localStorage.setItem("cart", JSON.stringify(cart));
            //update values on UI
            $(`.quantity-field-${id}`).text(el.quantity);
            $(`.quantity-price-${id}`).val(el.price);
            $(`.quantity-price-txt-${id}`).text(el.price + "$");
        }
    });
}

//remove one item by ID
function deleteItem(id) {
    let cart = JSON.parse(localStorage.getItem("cart"));

    //filter cart by removing an item based on ID
    let newCart = cart.filter((item) => item.id != id);

    //update local storage
    localStorage.setItem("cart", JSON.stringify(newCart));

    //reload page
    window.location.reload();
}

//on click to place order, empty cart
function emptyCart() {
    localStorage.clear();
}
