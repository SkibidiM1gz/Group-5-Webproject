class Product {
    type;
    name;
    price;
    id;
    isFeatured;
    isBestseller;
    description;
    imagePath;
    
    constructor(type, name, price, isBestseller, isFeatured, description, imagePath) {
        this.type = type;
        this.name = name;
        this.price = price;
        this.description = description;
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
            "Tomato Sauce, Mozzarella Cheese, Pepperoni, Ham, Onions, Bell Peppers, Mushrooms, and Olives.",
            "./images/pizza1_supersupreme.png"),
        new Product(ProductType.PIZZA,
            "Ham and Cheese Pizza", 399, false, true,
            "Tomato Sauce, Mozzarella Cheese, Ham",
            "./images/pizza2_ham_cheese.png"),
        new Product(ProductType.PIZZA,
            "Pepperoni Pizza", 399, false, true,
            "Tomato Sauce, Mozzarella Cheese, Pepperoni",
            "./images/pizza3_pepperoni.png"),
        new Product(ProductType.PIZZA,
            "Prosciutto Pizza", 599, false, true,
            "Tomato Sauce, Mozzarella Cheese, Italian Prosciutto Ham",
            "./images/pizza4_prosciutto.png"),
        new Product(ProductType.PIZZA,
            "Mushroom Pizza", 199, false, true,
            "Tomato Sauce, Mozzarella Cheese, Fresh Mushrooms",
            "./images/pizza5_mushroom.png"),
        
    ],
    "beverage": [
        
    ],
    "dessert": [
        
    ]
};

let keys = Object.keys(products);

// Initialize IDs
for (let i = 0; i < keys.length; i++) {
    let values = products[keys[i]];
    for (let j = 0; j < values.length; j++) {
        values[j].formatID(j);
    }
}

function setSessionData(key, value) {
    sessionStorage.setItem(key, JSON.stringify(value));
}

function getSessionData(key) {
    return JSON.parse(sessionStorage.getItem(key));
}

function lookupProduct(productID) {
    let tokens = productID.split("-");
    let type = tokens[0];
    let index = parseInt(tokens[1]);
    return products[type][index];
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

function addCartItem(id) {
    // Get cart data
    let cart = getSessionData("cart");
    // Add item
    cart.items = cart.items.concat({ "productID": id, "sessionID": cart.serialCount });
    cart.serialCount++;
    // Update cart data
    setSessionData("cart", cart);
}

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
        td_amount.innerHTML = product.price + "Php";
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
    
    td_total_amount.innerHTML = rawPriceSum + "Php";
}

function checkoutCartItems() {
    
}

initializeCartData();
loadCartItems();