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
    var quantity = parseInt(document.getElementById('quantity').innerText, 10);
    var found = false;

    // Check if the room is already chosen
    if(chosenRooms.length != 0){
        for(var i = 0; i < chosenRooms.length; i++){
            if(chosenRooms[i].name.toLowerCase().trim() == newRoomName.toLowerCase().trim()){
                if(chosenRooms[i].quantity + quantity <= 10) {
                    chosenRooms[i].quantity += quantity;
                    document.getElementById('quantity' + chosenRooms[i].name).setAttribute('value', chosenRooms[i].quantity);
                }
                found = true;
                break;
            }
        }
        if(!found){
            rooms.innerHTML = rooms.innerHTML +
                '<div class="input-group mb-3">' +
                '<input type="text" name="chosenRooms[]" class="form-control" readonly="readonly" value="'+ newRoomName +'" id="room' + newRoomName.trim().toLowerCase() +'">' +
                '<div class="input-group-append">' +
                '<input name="quantities[]" type="number" style="text-align: center;" readonly="readonly" class="form-control" value="'+ quantity +'" id="quantity'+ newRoomName.trim().toLowerCase() +'">' +
                '<button class="btn btn-outline-danger" type="button" onclick="deleteRoom(&#39;' + newRoomName + '&#39;, this);">-</button>' +
                '</div>' +
                '</div>';

            chosenRooms.push({name: newRoomName.toLowerCase().trim(), quantity: quantity})
        }
    } else {
        chosenRooms.push({name: newRoomName.toLowerCase().trim(), quantity: quantity})

        rooms.innerHTML = rooms.innerHTML +
            '<div class="input-group mb-3">' +
            '<input type="text" name="chosenRooms[]" class="form-control"  readonly="readonly" value="'+ newRoomName +'" id="room' + newRoomName.trim().toLowerCase() +'" >' +
            '<div class="input-group-append">' +
            '<input name="quantities[]" type="number" style="text-align: center;" readonly="readonly" class="form-control" value="'+ quantity +'" id="quantity'+ newRoomName.trim().toLowerCase() +'">' +
            '<button class="btn btn-outline-danger" type="button" onclick="deleteRoom(&#39;'+ newRoomName +'&#39;, this);">-</button>' +
            '</div>' +
            '</div>';
    }
}

// Delete Room
function deleteRoom(newRoomName, e){
    for(var i = 0; i < chosenRooms.length; i++){
        if(chosenRooms[i].name.toLowerCase().trim() == newRoomName.toLowerCase().trim()){
            found = true;
            //delete from array
            chosenRooms.splice(i, 1);
            e.parentNode.parentNode.parentNode.removeChild(e.parentNode.parentNode);
            break;
        }
    }
}

// Validate Credir Card
function validateCC() {
    var ccNum = document.getElementById("credit_card").value;
    var visaRegEx = /^(?:4[0-9]{12}(?:[0-9]{3})?)$/;
    var isValid = false;

    if (visaRegEx.test(ccNum)) {
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

// Check if the chosen start date is after the chosen end date
function checkStartDate() {
    var startDate = document.getElementById('start_date').value;
    var endDate = document.getElementById('end_date').value;
    var today = new Date().toISOString().split('T')[0];

    if(startDate < today)
        document.getElementById('start_date').value = today;

    if(endDate != null && startDate > endDate)
        document.getElementById('end_date').value = startDate;

    document.getElementById("end_date").setAttribute('min', startDate);

}

// Check if the chosen start date is after the chosen end date
function checkEndDate() {
    var startDate = document.getElementById('start_date').value;
    var endDate = document.getElementById('end_date').value;
    var today = new Date().toISOString().split('T')[0];

    if(endDate < today)
        document.getElementById('end_date').value = today;

    if(startDate != null && startDate > endDate)
        document.getElementById('end_date').value = startDate;

    document.getElementById("end_date").setAttribute('min', startDate);
}
