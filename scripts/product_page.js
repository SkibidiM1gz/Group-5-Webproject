function showAddToCartNotif() {
    let notif = document.getElementById("alertbox");
    
    notif.classList.remove("hidden");
}

function hideAddToCartNotif() {
    let notif = document.getElementById("alertbox");
    
    notif.classList.add("hidden");
}