var max_pets = document.getElementById("max_pets");
var max_guests = document.getElementById("max_guests");
var amount_of_pets = document.getElementById("amount_of_pets");
var amount_of_guests = document.getElementById("amount_of_guests");

function start(){
    amount_of_guests.value = 0;
    amount_of_pets.value = 0;
}

function checkGuests(){
    if(amount_of_guests.value > max_guests.value){
        alert("Amount of guests on booking exceeds the maximum amount of guests allowed");
    }
}

function checkPets(){
    if(amount_of_pets.value > max_pets.value){
        alert("Amount of pets of booking exceeds the maximum amount of pets allowed");
    }
}

start();

amount_of_guests.addEventListener("change", checkGuests);
amount_of_pets.addEventListener("change", checkPets);
