<?php
    require "./core/project.php";
    require "./core/navigation.php";
    require "./core/page.php";
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=1600, height=1200, initial-scale=1">
    <title>Cart | Golby's Pizzeria</title>
    <link rel="stylesheet" href="./styles/theme.css">
    <link rel="stylesheet" href="./styles/layout.css">
    <link rel="stylesheet" href="./styles/components.css">
    <link rel="stylesheet" href="./styles/cart.css">
</head>

<body>
    <header>
        <?php
            generateNavigationBar();
        ?>
    </header>
    <main>
        <noscript>
            Please enable JavaScript to allow features to run on this website
        </noscript>
        <h1 class="page-title">Your Cart</h1>
        <div class="table-container">
            <table id="cart-items">
                <caption>The cart is where your orders are collected</caption>
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Details</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody id="cart-table-items">
                    <!-- <tr id="total">
                        <td colspan="2">Total:</td>
                        <td id="total-amount">0 Php</td>
                    </tr> -->
                    <!-- <tr id="checkout">
                        <td colspan="3">
                            <button onclick="checkoutCartItems(); gotoCheckoutPage()">Checkout</button>
                        </td>
                    </tr> -->
                </tbody>
            </table>
        </div>
        <!-- TODO FINISH Implementation -->
        <div class="cart-interface">
            <p>Total:</p>
            <button id="checkout-button" onclick="checkoutCartItems(); gotoCheckoutPage()">Checkout</button>
        </div>
    </main>
    <footer>
        <?php generateFooterInfo(); ?>
        <!-- <p class="footer-content">&copy;Golby's Pizzeria 2025</p> -->
        <!-- <p class="footer-content">Contact us: golbyspizzeria@gmail.com | +639618250366</p> -->
    </footer>
    <script src="./scripts/cart.js"></script>
    <script>addCartItem('pizza-0');</script>
</body>

</html>