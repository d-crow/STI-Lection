function initialisation(id) {
    var somme_value = 0;
    var slider = document.getElementById(id);
    var value = document.getElementById(id + "_value");

    value.innerHTML = slider.value;

    for(var i=1; i<20; i++) {

        somme_value = somme_value + parseInt(document.getElementById(i + "_value").innerHTML)

        if(somme_value > 100) {
            console.log(somme_value - 100);
            value.innerHTML = parseInt(value.innerHTML - (somme_value - 100));
            slider.value = parseInt(value.innerHTML);

            document.getElementById("somme_value").innerHTML = parseInt((somme_value) - (somme_value - 100));
            
            break;
        }
        else {
            document.getElementById("somme_value").innerHTML = parseInt(somme_value);
        }
    }  
    console.log("Variable bloquante" + variable_bloquante);
}
