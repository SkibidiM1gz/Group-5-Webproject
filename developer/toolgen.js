/*
 * toolgen.js generates HTML elements used for debugging
 */

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
    
    let input_additive = document.createElement("input");
    input_additive.value = "100";
    input_additive.id = "dev-input-additive";
    input_additive.type = "number";
    input_additive.placeholder = "viewport additive";
    
    let info_viewport = document.createElement("p");
    info_viewport.id = "dev-info-viewport";
    info_viewport.textContent = "info";
    
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
    
    let input_selector = document.createElement("input");
    input_selector.id = "dev-input-selector";
    input_selector.placeholder = "selector";
    input_selector.type = "text";
    
    let info_selector = document.createElement("p");
    info_selector.id = "dev-info-selector";
    info_selector.textContent = "info:";
    
    let input_selector_property = document.createElement("input");
    input_selector_property.id = "dev-input-selector-property";
    input_selector_property.value = "font-size";
    input_selector_property.placeholder = "property";
    
    let input_selector_value = document.createElement("input");
    input_selector_value.id = "dev-input-selector-value";
    input_selector_value.type = "text";
    input_selector_value.placeholder = "value";
    
    let button_set_unit = document.createElement("button");
    button_set_unit.id = "dev-set-unit";
    button_set_unit.textContent = "SET UNIT";
    button_set_unit.onclick = () => {
        setSelectorUnit();
    };
    
    let div = document.createElement("div");
    div.id = "dev-tools";
    div.appendChild(input_additive);
    div.appendChild(info_viewport);
    div.appendChild(button_add_vw);
    div.appendChild(button_sub_vw);
    div.appendChild(input_selector);
    div.appendChild(info_selector);
    div.appendChild(input_selector_property);
    div.appendChild(input_selector_value);
    div.appendChild(button_set_unit);
    
    main.appendChild(div);
    
    // let link = document.createElement("link");
    // link.rel = "stylesheet";
    
    // ./products/pizza/pizza1.html
    // ./developer/dev/toolgen.js
    
    // ./../../developer/dev/toolgen.js
    
    // ./developer/toolgen.js
    // ./products/pizza/pizza1.html
    
    // ./../products/pizza/pizza1.html
    
    // let head = document.getElementsByTagName("head")[0];
    
    // head.appendChild();
}



/**
 * @param fromPath a valid origin path starting with "./"
 * @param toPath a valid destination path starting with "./"
 * 
 * @returns a relative file path
 */
function createRelativePath(rootFile, fromPath = "./", toPath = "./") {
    let fromPathTokens = fromPath.replace("./", "").split("/");
    let toPathTokens = toPath.replace("./", "").split("/");
    
    let length = Math.max(fromPathTokens.length, toPathTokens.length);
    
    for (let i = 0; i < length; i++) {
        
        let t1 = fromPathTokens[i];
        let t2 = toPathTokens[i];
        
        if (t1 === t2) {
            
        }
    }
}

generateTools();
initToolSize();