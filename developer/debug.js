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
