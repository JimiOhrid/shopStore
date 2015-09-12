<!DOCTYPE html>
<html lang="en">
<head>
    <title>Payment | E-Shop</title>
</head>
<body>

<form action="/payment" method="POST">
    <script
            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
            data-key="pk_test_faCj8JNyqTnGoBYEwyjJIjrS"
            data-amount="2000"
            data-name="Demo Site"
            data-description="2 widgets ($20.00)"
            data-image="/128x128.png"
            data-locale="auto">
    </script>
</form>
</body>
</html>

