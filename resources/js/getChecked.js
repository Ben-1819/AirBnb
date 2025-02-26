function getSelected() {

    //Create the array
    var amenitiesSelected = new Array();

    //Reference the div element everything is contained in
    var divChecks = document.getElementById("checkboxes");

    //Reference all of the checkboxes in the div
    var checked = divChecks.getElementsByTagName("input");

    //Loop and push the checked CheckBox values into the Array
    for (var i = 0; i< checked.length; i++){
        if(checked[i].checked){
            amenitiesSelected.push(checked[i].value);
        }
    }

    console.log(amenitiesSelected);
    var requestAmenities = JSON.stringify(amenitiesSelected);
    //Pass the array to the controller
    $.ajax({
        url: "{{ url('/amenity') }}",
        method:"post",
        data: requestAmenities,
        dataType: "json",
    });
}
