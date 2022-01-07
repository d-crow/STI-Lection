function menu_deroulant_bloquant() {
    let checkbox = document.getElementById("checkbox_burger");
    let body = document.getElementById("body_contact");
    if (checkbox.checked) {
        body.style.overflowY = "hidden";
        bool_deroulant_bloquant = true;
    } else {
        body.style.overflowY = "visible";
        bool_deroulant_bloquant = false;
    }
}