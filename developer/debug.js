/**
 * debug.js contains methods for debugging
 */

function increaseViewportWidth(v) {
    if (v === null || v === undefined || isNaN(v)) {
        let input = document.getElementById("dev-input-additive");
        v = parseInt(input.value) || 0;
    }
    
    let meta = document.querySelector("meta[name='viewport']");
    // get viewport width
    let attribs = meta.content.split(",");
    let viewportWidth = 0;
    let vw = 0;
    for (let i = 0; i < attribs.length; i++) {
        let c = attribs[i];
        
        if (c.startsWith("width=")) {
            viewportWidth = c;
            vw = parseInt(c.substring("width=".length));
            vw += v;
            meta.content = meta.content.replace(c, `width=${vw}`);
            break;
        }
    }
    
    console.log("added " + v + " to viewport");
    
    setInfoViewport(vw);
    
    initToolSize();
}

function decreaseViewportWidth(v) {
    if (v === null || v === undefined || isNaN(v)) {
        let input = document.getElementById("dev-input-additive");
        v = -parseInt(input.value) || 0;
    }
    increaseViewportWidth(v);
}

function setInfoViewport(vw, vh) {
    let info = document.getElementById("dev-info-viewport");
    info.innerHTML = `width=${vw}, height=${vh}`;
}

function setSelectorUnit() {
    let selector = document.getElementById("dev-input-selector").value;
    // let unit = document.getElementById("dev-input-selector-unit").value;
    // let additive = document.getElementById("dev-input-selector-additive").value;
    let value = document.getElementById("dev-input-selector-value").value;
    let property = document.getElementById("dev-input-selector-property").value;
    
    if (!value || !property || !selector) {
        return;
    }
    
    let elements = document.querySelectorAll(selector);
    
    for (const e of elements) {
        e.style.setProperty(property, value);
    }
}