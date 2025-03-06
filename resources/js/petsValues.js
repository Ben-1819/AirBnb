var checkPets = document.getElementById("pets_allowed");
var maxPets = document.getElementById("max_pets");
var pricePerPet = document.getElementById("price_per_pet");

function updateFields(){
    if(checkPets.checked) {
        maxPets.removeAttribute("readonly");
        pricePerPet.removeAttribute("readonly");
    }
    else {
        maxPets.setAttribute("readonly", "readonly");
        maxPets.value = 0;
        pricePerPet.setAttribute("readonly", "readonly");
        pricePerPet.value = 0;
    }
}
updateFields();
checkPets.addEventListener("change", updateFields);

