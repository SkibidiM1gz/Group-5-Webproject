function showToastNotification() {
    let notif = document.getElementById("toastbox");
    
    notif.classList.remove("hidden");
}

function hideToastNotification() {
    let notif = document.getElementById("toastbox");
    
    notif.classList.add("hidden");
}