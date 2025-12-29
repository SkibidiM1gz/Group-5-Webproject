function initToolSize() {
    let div = document.querySelector('#dev-tools');
    div.style.width = `${window.innerWidth / 2}px`;
    div.style.height = `${window.innerHeight / 2}px`;
}

function generateTools() {
    if (document.querySelector("#dev-tools")) {
        return;
    }
    
    let main = document.getElementsByTagName("main")[0];
    
    let input = document.createElement("input");
    input.value = "100";
    input.id = "dev-input-additive";
    input.type = "number";
    
    let p = document.createElement("p");
    p.id = "dev-info-viewport";
    
    let button_add_vw = document.createElement("button");
    button_add_vw.id = "dev-add-viewport";
    button_add_vw.textContent = "+ VIEWPORT";
    button_add_vw.onclick = () => {
        increaseViewportWidth();
    };
    
    let button_sub_vw = document.createElement("button");
    button_sub_vw.id = "dev-sub-viewport";
    button_sub_vw.textContent = "- VIEWPORT";
    button_sub_vw.onclick = () => {
        decreaseViewportWidth();
    };
    
    let div = document.createElement("div");
    div.id = "dev-tools";
    div.appendChild(input);
    div.appendChild(p);
    div.appendChild(button_add_vw);
    div.appendChild(button_sub_vw);
    
    main.appendChild(div);
}

generateTools();
initToolSize();
