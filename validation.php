<script>
$(document).ready(function() {
    $("myform").submit(function(event) {
        event.preventDefault();
        var firstname = $("#firstname").val();
        var lastname = $("#lastname").val();
        var email = $("#email").val();
        var password = $("#password").val();
        var confirm = $("#confirm").val();
        $(".form-message").load("valdation.php", {
            firstname: firstname,
            lastname: lastname,
            email: email,
            password: password,
            confirm: confirm
        });
    });
});

</script>