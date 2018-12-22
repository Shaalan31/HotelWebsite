var chosenRooms = [];

// Increment quantity of items
function incrementValue(id){
    var value = parseInt(document.getElementById(id).innerText, 10);
    value = isNaN(value) ? 1 : value;
    value++;
    if(value > 10)
        value = 1;
    document.getElementById(id).innerText = value;
}

// Decrement quantity of items
function decrementValue(id){
    var value = parseInt(document.getElementById(id).innerText, 10);
    value = isNaN(value) ? 1 : value;
    value--;
    if(value < 1)
        value = 10;
    document.getElementById(id).innerText = value;
}

// Add The room to the list
function addRoom() {
    var rooms = document.getElementById('roomsList');
    var newRoomName = document.forms['book']['room'].value;
    var newRoom = document.forms['book']['room'].id;
    var quantity = parseInt(document.getElementById('quantity').innerText, 10);
    var found = false;

    // Check if the room is already chosen
    if(chosenRooms.length != 0){
        for(var i = 0; i < chosenRooms.length; i++){
            if(chosenRooms[i].name.toLowerCase().trim() == newRoomName.toLowerCase().trim()){
                if(chosenRooms[i].quantity + quantity <= 10)
                    chosenRooms[i].quantity += quantity;
                document.getElementById('quantity' + i).innerText = chosenRooms[i].quantity;
                found = true;
                break;
            }
        }
        if(!found){
            rooms.innerHTML = rooms.innerHTML +
                '<li class="list-group-item d-flex justify-content-between align-items-center" id="room' + chosenRooms.length + '">' +
                newRoomName +
                '<span class="badge badge-primary badge-pill" id="quantity'+ chosenRooms.length +'">' +
                quantity +
                '</span></li>';

            chosenRooms.push({name: newRoomName.toLowerCase().trim(), quantity: quantity})
        }
    } else {
        chosenRooms.push({name: newRoomName.toLowerCase().trim(), quantity: quantity})

        rooms.innerHTML = rooms.innerHTML +
            '<li class="list-group-item d-flex justify-content-between align-items-center" id="room0">' +
            newRoomName +
            '<span class="badge badge-primary badge-pill" id="quantity0">' +
            quantity +
            '</span></li>';
    }
}

// Validate Credir Card
function validateCC() {
    var ccNum = document.getElementById("cardNum").value;
    var visaRegEx = /^(?:4[0-9]{12}(?:[0-9]{3})?)$/;
    var mastercardRegEx = /^(?:5[1-5][0-9]{14})$/;
    var amexpRegEx = /^(?:3[47][0-9]{13})$/;
    var discovRegEx = /^(?:6(?:011|5[0-9][0-9])[0-9]{12})$/;
    var isValid = false;

    if (visaRegEx.test(ccNum)) {
        isValid = true;
    } else if(mastercardRegEx.test(ccNum)) {
        isValid = true;
    } else if(amexpRegEx.test(ccNum)) {
        isValid = true;
    } else if(discovRegEx.test(ccNum)) {
        isValid = true;
    }

    if(!isValid) {
        document.getElementById('credit_card').setCustomValidity("Please press enter a valid credit card number!");
        document.getElementById('credit_card').reportValidity();
    } else {
        document.getElementById('credit_card').setCustomValidity("");
        document.getElementById('credit_card').reportValidity();
    }
    return isValid;

}

function aubmit(){
    // Submit the form
    $('.bookForm').on("submit", function (event) {
        event.preventDefault();

        // Validate the credit card
        if(validateCC()){

        }
    });
}