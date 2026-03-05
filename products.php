<?php 
    require "./connections/db_connection.php";
    require "./connections/db.php";
    require "./core/project.php";
    require "./core/navigation.php";
    require "./core/page.php";
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=1600, height=1200, initial-scale=1">
    <title>Products | Golby's Pizzeria</title>
    <link rel="stylesheet" type="text/css" href="./styles/theme.css">
    <link rel="stylesheet" type="text/css" href="./styles/layout.css">
    <link rel="stylesheet" type="text/css" href="./styles/products.css">
</head>

<body>
    <header class="no-margin-bottom">
        <?php 
            generateNavigationBar();
         ?>
    </header>
    <main>
        <div class="productnav">
            <ul>
                <li><a href="#section-pizzas">Pizzas</a></li>
                <li><a href="#section-beverages">Beverages</a></li>
                <li><a href="#section-desserts">Desserts</a></li>
            </ul>
        </div>
        <h1>Products</h1>
        <!-- <div class="menu">
            <a href="#">
                <div class="card">
                    <img src="./../images/pizza1_supersupreme.png">
                    <span class="title">Pizzas</span>
                </div>
            </a>
            <a href="#">
                <div class="card">
                    <img src="./../images/pizza1_supersupreme.png">
                    <font class="title">Pizzas</font>
                </div>
            </a>
            <a href="#">
                <div class="card">
                    <img src="./../images/pizza1_supersupreme.png">
                    <font class="title">Pizzas</font>
                </div>
            </a>
        </div> -->
        <section id="section-pizzas">
            <h2>Pizzas</h2>
            <div class="product-card-container">
                <a href="./pizza/pizza1.html">
                    <div id="pizza-super-supreme" class="product-card">
                        <img src="./../images/pizza1_supersupreme.png">
                        <p class="product-price">299</p>
                        <h3 class="product-title">Super Supreme Pizza</h3>
                    </div>
                </a>
                <a href="./pizza/pizza2.html">
                    <div id="pizza-ham-cheese" class="product-card">
                        <img src="./../images/pizza2_ham_cheese.png">
                        <p class="product-price">399</p>
                        <h3 class="product-title">Ham and Cheese Pizza</h3>
                    </div>
                </a>
                <a href="./pizza/pizza3.html">
                    <div id="pizza-pepperoni" class="product-card">
                        <img src="../images/pizza3_pepperoni.png">
                        <p class="product-price">399</p>
                        <h3 class="product-title">Pepperoni Pizza</h3>
                    </div>
                </a>
                <a href="./pizza/pizza4.html">
                    <div id="pizza-prosciutto" class="product-card">
                        <img src="../images/pizza4_prosciutto.png">
                        <p class="product-price">599</p>
                        <h3 class="product-title">Prosciutto Pizza</h3>
                    </div>
                </a>
                <a href="./pizza/pizza5.html">
                    <div id="pizza-mushroom" class="product-card">
                        <img src="../images/pizza5_mushroom.png">
                        <p class="product-price">199</p>
                        <h3 class="product-title">Mushroom Pizza</h3>
                    </div>
                </a>
            </div>
        </section>
        <section id="section-beverages">
            <h2>Beverages</h2>
            <div class="product-card-container">
                <a href="./beverage/beverage1.html">
                    <div id="beverage-evian-water" class="product-card">
                        <img src="./../images/beverage1_water.png">
                        <p class="product-price">20</p>
                        <h3 class="product-title">Evian Natural Spring Water</h3>
                    </div>
                </a>
                <a href="./beverage/beverage2.html">
                    <div id="beverage-coke" class="product-card">
                        <img src="./../images/beverage2_coke.png">
                        <p class="product-price">50</p>
                        <h3 class="product-title">Coke in Can</h3>
                    </div>
                </a>
                <a href="./beverage/beverage3.html">
                    <div id="beverage-fanta" class="product-card">
                        <img src="./../images/beverage3_fanta.png">
                        <p class="product-price">50</p>
                        <h3 class="product-title">Fanta in Can</h3>
                    </div>
                </a>
                <a href="./beverage/beverage4.html">
                    <div id="beverage-mountain-dew" class="product-card">
                        <img src="./../images/beverage4_mountain_dew.png">
                        <p class="product-price">40</p>
                        <h3 class="product-title">Mountain Dew in Can</h3>
                    </div>
                </a>
                <a href="./beverage/beverage5.html">
                    <div class="product-card">
                        <img src="./../images/beverage5_pepsi.png">
                        <p class="product-price">30</p>
                        <h3 class="product-title">Pepsi in Can</h3>
                    </div>
                </a>
            </div>
        </section>
        <section id="section-desserts">
            <h2>Desserts</h2>
            <div class="product-card-container">
                <a href="./dessert/dessert1.html">
                    <div id="dessert-cheesecake" class="product-card">
                        <img src="../images/dessert1_cheesecake.png">
                        <p class="product-price">99</p>
                        <h3 class="product-title">Cheese Cake</h3>
                    </div>
                </a>
                <a href="./dessert/dessert2.html">
                    <div id="dessert-brownies" class="product-card">
                        <img src="../images/dessert2_brownies.png">
                        <p class="product-price">80</p>
                        <h3 class="product-title">Brownies</h3>
                    </div>
                </a>
                <a href="./dessert/dessert3.html">
                    <div id="dessert-tiramisu" class="product-card">
                        <img src="../images/dessert3_tiramisu.png">
                        <p class="product-price">99</p>
                        <h3 class="product-title">Tiramisu</h3>
                    </div>
                </a>
                <a href="./dessert/dessert4.html">
                    <div id="dessert-cupcake" class="product-card">
                        <img src="../images/dessert4_cupcake.png">
                        <p class="product-price">70</p>
                        <h3 class="product-title">Cupcake</h3>
                    </div>
                </a>
                <a href="./dessert/dessert5.html">
                    <div id="dessert-chocolate-milkshake" class="product-card">
                        <img src="../images/dessert5_chocolate_milkshake.png">
                        <p class="product-price">120</p>
                        <h3 class="product-title">Chocolate Milkshake</h3>
                    </div>
                </a>
                <a href="./dessert/dessert6.html">
                    <div id="dessert-strawberry-milkshake" class="product-card">
                        <img src="../images/dessert6_strawberry_milkshake.png">
                        <p class="product-price">120</p>
                        <h3 class="product-title">Strawberry Milkshake</h3>
                    </div>
                </a>
            </div>
        </section>
    </main>
    <footer>
        <?php generateFooterInfo(); ?>
        <!-- <p class="footer-content">&copy;Golby's Pizzeria 2025</p> -->
        <!-- <p class="footer-content">Contact us: golbyspizzeria@gmail.com | +639618250366</p> -->
    </footer>
</body>

</html>