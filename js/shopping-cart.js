var shoppingCart = (function() {
    //private methods/properties
    var cart = [];
    persistCart = function() {
        localStorage.setItem("shoppingCart", JSON.stringify(cart));
    }

    function loadCart() {
        cart = JSON.parse(localStorage.getItem("shoppingCart"));
        if (cart === null) {
            cart = [];
        }
    }

    loadCart();

    //private methods/properties
    var obj = {};
    obj.addToCart = function(name, quantity, price) {
        console.log("addToCart");

        for (cartItem of cart) {
            if (cartItem["name"] == name) {
                cartItem["quantity"] += quantity;
                persistCart();
                return;
            }
        }

        var itemToAdd = {"name": name, "quantity": quantity, "price" : price}
        cart.push(itemToAdd);
        persistCart();
    };

    obj.removeFromCart = function(name) {
        console.log("removefromCart");
        for (var i = 0; i < cart.length; ++i) {
            if (cart[i]["name"] == name) {
                cart.splice(i, 1);
                persistCart();
                return;
            }
        }
    };

    obj.clearCart = function () {
        cart = [];
        persistCart();
    };

    obj.getCart = function() {
        console.log("getCart");
        console.log("cart: " + JSON.stringify(cart));

        return cart.map(item => {
            return item;
        });
    };

    return obj;
})();

function change(){

    document.getElementById("cart-container").style.visibility="visible";
}
function endedTransaction(){
    
    document.getElementById("cart-container").style.visibility="hidden";
    alert("PAYMENT SUCCESSFUL!\nPizzas are on the way!");

}
