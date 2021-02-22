$("document").ready(function() {
    var cart = [];

    addToCart = function(name, quantity) {
        console.log("addToCart");
        var item = {"name": name, "quantity": quantity}

        cart.push(item);
        updateDiv();
        
    };
    removefromCart = function() {
        console.log("removefromCart");
        updateDiv();
    };

    updateDiv = function() {
        console.log("updateDiv");
        $('#cart').html(cart);
    }
});
