<?php
    require "./project.php";
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=1600, height=1200, initial-scale=1">
    <title>Cart | Golby's Pizzeria</title>
    <link rel="stylesheet" href="./theme.css">
    <link rel="stylesheet" href="./layout.css">
    <link rel="stylesheet" href="./components.css">
    <style type="text/css">
        :root {
            /*font-size: 1.2rem;*/
        }
        
        div.table-container {
            display: inline-block;
            height: 50vh;
            max-height: 60%;
            overflow-y: auto;
        }

        table#cart-items {
            background-color: var(--theme-color-background-light);
            color: var(--theme-color-text-onlight);
            width: 80%;
            margin: auto;
            border-collapse: collapse;
            padding: 20vw;
            /* clamp(1rem, 5vw, 2.5rem); */
        }

        table#cart-items caption {
            color: var(--theme-color-text-ondark);
            margin-bottom: 2rem;
        }
        
        /* Add small spacing */
        thead tr th {
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
        }
        
        td>img {
            display: block;
            width: 50%;
            height: auto;
            margin: auto;
        }
        
        /* To constraint image size */
        tr.item>td:nth-child(1) {
            width: 33%;
        }
        
        tr.item {
            border-top: 1px solid black;
        }
        
        tr.item td:nth-child(3) {
            text-align: center;
            /*background-color: var(--peach);*/
        }
        
        /* Align total label to the right */
        tr#total>td:nth-child(1) {
            text-align: right;
        }
        
        tr#total>td:nth-child(2) {
            background-color: var(--peach);
        }
        
        tr#total {
            border-top: 1px solid black;
        }
        
        /* Add small spacing */
        tr#total td {
            padding-top: 0.5rem;
        }
        
        tr#checkout button {
            display: block;
            width: 100%;
            background-color: var(--brick);
            color: var(--theme-color-text-ondark);
            border: none;
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
        }
        
        tr#checkout button:hover {
            background-color: var(--darkTerracota);
        }
        
        /*h1 {
            color: var(--theme-color-text-ondark);
            text-align: center;
        }*/
        
        p {
            color: var(--theme-color-text-ondark);
            text-align: center;
            text-justify: justify;
        }
    </style>
</head>

<body>
    <header>
        <?php
            require "./navbar.php";
        ?>
    </header>
    <main>
        <noscript>
            Please enable JavaScript to allow features to run on this website
        </noscript>
        <h1 class="page-title">Your Cart</h1>
        <p class="description">
            
        </p>
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
        <p class="footer-content">&copy;Golby's Pizzeria 2025</p>
        <p class="footer-content">Contact us: golbyspizzeria@gmail.com | +639618250366</p>
    </footer>
    <script src="./scripts/cart.js"></script>
    <script>addCartItem('pizza-0');</script>
</body>

</html>