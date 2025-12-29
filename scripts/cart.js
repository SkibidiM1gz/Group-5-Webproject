class Product {
    type;
    name;
    price;
    id;
    isFeatured;
    isBestseller;
    /*description;*/
    imagePath;
    
    constructor(type, name, price, isBestseller, isFeatured, /*description,*/ imagePath) {
        this.type = type;
        this.name = name;
        this.price = price;
        /*this.description = description;*/
        this.isBestseller = isBestseller;
        this.isFeatured = isFeatured;
        this.imagePath = imagePath;
    }
    
    formatID(num) {
        return `${this.type.toString()}-${num}`;
    }
}

class ProductType {
    static PIZZA = Symbol("pizza");
    static DESSERT = Symbol("dessert");
    static BEVERAGE = Symbol("beverage");
}

const products = {
    "pizza": [
        new Product(ProductType.PIZZA,
            "Super Supreme Pizza", 299, false, true,
            // "Tomato Sauce, Mozzarella Cheese, Pepperoni, Ham, Onions, Bell Peppers, Mushrooms, and Olives.",
            "./images/pizza1_supersupreme.png"),
        new Product(ProductType.PIZZA,
            "Ham and Cheese Pizza", 399, false, false,
            // "Tomato Sauce, Mozzarella Cheese, Ham",
            "./images/pizza2_ham_cheese.png"),
        new Product(ProductType.PIZZA,
            "Pepperoni Pizza", 399, false, true,
            // "Tomato Sauce, Mozzarella Cheese, Pepperoni",
            "./images/pizza3_pepperoni.png"),
        new Product(ProductType.PIZZA,
            "Prosciutto Pizza", 599, false, false,
            // "Tomato Sauce, Mozzarella Cheese, Italian Prosciutto Ham",
            "./images/pizza4_prosciutto.png"),
        new Product(ProductType.PIZZA,
            "Mushroom Pizza", 199, false, true,
            // "Tomato Sauce, Mozzarella Cheese, Fresh Mushrooms",
            "./images/pizza5_mushroom.png"),
        
    ],
    "beverage": [
        new Product(ProductType.BEVERAGE,
            "Evian Natural Spring Water",
            25, false, false,
            "./images/beverage1_water.png"),
        new Product(ProductType.BEVERAGE,
            "Coke In A Can",
            50, false, false,
            "./images/beverage2_coke.png"),
        new Product(ProductType.BEVERAGE,
            "Fanta In A Can",
            50, false, false,
            "./images/beverage3_fanta.png"),
        new Product(ProductType.BEVERAGE,
            "Mountain Dew In A Can",
            40, false, false,
            "./images/beverage4_mountain_dew.png"),
        new Product(ProductType.BEVERAGE,
            "Pepsi In A Can",
            30, false, false,
            "./images/beverage5_pepsi.png"),
    ],
    "dessert": [
        new Product(ProductType.DESSERT,
            "Cheese Cake",
            99, false, false,
            "./images/dessert1_cheesecake.png"),
        new Product(ProductType.DESSERT,
            "Brownies",
            80, false, false,
            "./images/dessert2_brownies.png"),
        new Product(ProductType.DESSERT,
            "Tiramisu",
            99, false, false,
            "./images/dessert3_tiramisu.png"),
        new Product(ProductType.DESSERT,
            "Cupcake",
            70, false, false,
            "./images/dessert4_cupcake.png"),
        new Product(ProductType.DESSERT,
            "Chocolate Milkshake",
            120, false, false,
            "./images/dessert5_chocolate_milkshake.png"),
        new Product(ProductType.DESSERT,
            "Strawberry Milkshake",
            120, false, false,
            "./images/dessert6_strawberry_milkshake.png"),
    ]
};


class Cart {
    static flagAddToCartThrottle = false;
}

class Widget {
    static toastTime = 4000;
}

function setSessionData(key, value) {
    sessionStorage.setItem(key, JSON.stringify(value));
}

function getSessionData(key) {
    return JSON.parse(sessionStorage.getItem(key));
}

/**
 * Gets the product object via its ID
 */
function lookupProduct(productID) {
    let tokens = productID.split("-");
    let type = tokens[0];
    let index = parseInt(tokens[1]);
    return products[type][index];
}

function initializeProductData() {
    let hasInit = getSessionData("productsInitialized");
    
    // If not yet
    if (hasInit === null) {
        // Set flag to true
        setSessionData("productsInitialized", "true");
        
        let keys = Object.keys(products);
        
        // Initialize IDs for each product
        for (let i = 0; i < keys.length; i++) {
            let values = products[keys[i]];
            for (let j = 0; j < values.length; j++) {
                values[j].formatID(j);
            }
        }
    }
}

function initializeCartData() {
    
    // Don't override if exists
    if (getSessionData("cart")) {
        return;
    }
    
    let cart = {
        "items": [],
        "serialCount": 0
    };
    
    setSessionData("cart", cart);
}

/**
 * Adds the product internally in session data via its ID
 */
function addCartItem(productID) {
    // Don't let user spam the add-to-cart button
    // One add-to-cart action at a time
    if (Cart.flagAddToCartThrottle) {
        return;
    } else {
        Cart.flagAddToCartThrottle = true;
        setTimeout(() => {
            Cart.flagAddToCartThrottle = false;
        }, Widget.toastTime);
    }
    
    // Get cart data
    let cart = getSessionData("cart");
    // Add item
    cart.items = cart.items.concat({ "productID": productID, "sessionID": cart.serialCount });
    cart.serialCount++;
    // Update cart data
    setSessionData("cart", cart);
    // Set notification message
    notify(lookupProduct(productID).name + " added to cart!");
}

/**
 * Removes the product internally from session data via its sessionID
 */
function removeCartItem(sessionID) {
    let cart = getSessionData("cart");
    
    for (let i = 0; i < cart.items.length; i++) {
        if (cart.items[i].sessionID === sessionID) {
            console.log("item removed" + sessionID);
            cart.items.splice(i, 1);
            break;
        }
    }
    
    setSessionData("cart", cart);
}

function loadCartItems() {
    // Get Table element
    let tbody = document.getElementById("cart-table-items");
    
    // Abort If there is no table
    if (!tbody) {
        return;
    }
    
    // Get the item data
    let cartItems = getSessionData("cart").items;
    
    
    // Get a static array of elements of class item
    let items = document.querySelectorAll(".item");
    
    // Clear existing items
    for (let i = 0; i < items.length; i++) {
        items[i].remove();
    }
    
    let tr_total = document.getElementById("total");
    let rawPriceSum = 0;
    
    // Insert elements into table
    for (let i = 0; i < cartItems.length; i++) {
        let product = lookupProduct(cartItems[i].productID);
        
        let img = document.createElement("img");
        img.setAttribute("src", product.imagePath);
        
        let td_image = document.createElement("td");
        td_image.appendChild(img);
        
        let td_details = document.createElement("td");
        td_details.innerHTML = product.name;
        
        let tr_item = document.createElement("tr");
        
        let button_remove = document.createElement("button");
        button_remove.id = "btn-remove-item";
        button_remove.innerHTML = "X";
        button_remove.onclick = () => {
            // Remove displayed item
            tr_item.remove();
            // Remove item from session data
            removeCartItem(cartItems[i].sessionID);
            // Reload cart items
            loadCartItems();
        };
        
        let td_amount = document.createElement("td");
        td_amount.innerHTML = product.price + ".00 Php";
        td_amount.appendChild(button_remove);
        
        tr_item.classList.add("item");
        tr_item.appendChild(td_image);
        tr_item.appendChild(td_details);
        tr_item.appendChild(td_amount);
        
        tbody.insertBefore(tr_item, tr_total);
        
        rawPriceSum += product.price;
    }
    
    // Calculate subtotal
    
    // Calculate total
    let td_total_amount = document.getElementById("total-amount");
    
    td_total_amount.innerHTML = rawPriceSum + ".00 Php";
}

function checkoutCartItems() {
    
}

function gotoCheckoutPage() {
    window.location.href = "./checkout.html";
}

initializeCartData();
loadCartItems();