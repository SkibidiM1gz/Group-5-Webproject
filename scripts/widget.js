/*
 * widget.js includes widgets and UI-related features in website
 */

/**
 * Creates an element for a toast message
 */
function createToast() {
    let div = document.createElement("div");
    div.id = "toastbox";
    
    let p = document.createElement("p");
    p.id = "toastbox-message";
    
    div.appendChild(p);
    let main = document.getElementsByTagName("main")[0];
    main.prepend(div);
    // let noscript = document.getElementsByTagName("noscript")[0];
    // main.insertBefore(div, noscript);
}

/**
 * Creates a toast message with the specified {@code msg}
 * 
 * Duration is set to {@code Widget.toastTime} 
 */
function notify(msg) {
    let toastbox_message = document.getElementById("toastbox-message");
    
    if (toastbox_message === null || toastbox_message === undefined) {
        createToast();
        toastbox_message = document.getElementById("toastbox-message");
    }
    
    toastbox_message.textContent = msg;
    setTimeout(() => {
        toastbox_message.parentElement.remove();
    }, Widget.toastTime);
}