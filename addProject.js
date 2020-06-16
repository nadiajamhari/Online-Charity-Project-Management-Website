//Addmorebutton for objective

$(document).ready(function () {
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.addService'); //Add button selector
    var wrapper = $('.Field1'); //Input field wrapper
    var fieldHTML = '<div><input type="text" class="form-control-sm" id="objective" name="objective[]" placeholder="Objective"><button type="button" <span class="btn-danger glyphicon glyphicon-remove remove" aria-hidden="true"></span></button></div>'; //New input field html 
    var x = 1; //Initial field counter is 1

    //Once add button is clicked
    $(addButton).click(function () {
        //Check maximum number of input fields
        if (x < maxField) {
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });

    //Once remove button is clicked
    $(wrapper).on('click', '.remove', function (e) {
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});

// /add data into table committe old
$(function () {
    var data = document.getElementById("add");
    data.addEventListener("click", Details);

    // var row=1;

    function Details() {

        var committee = document.getElementById("rid").value;
        var nmembers = document.getElementById("nmembers").value;
        var pmember = document.getElementById("pmember").value;

        var _tr = `<tr><td>${committee}</td>   <td>${nmembers}</td>   <td>${pmember}</td>    <td class="table-remove"><button type="button" <span class="btn-danger glyphicon glyphicon-remove delete" aria-hidden="true"></span></button></td></tr>`;
        $('#tab1').append(_tr);
    };

    $(document).on('click', '.delete', function () {
        $(this).closest('tr').remove(); 



    });

});




//add for activity agenda
$(function () {
    var data = document.getElementById("Add2");
    data.addEventListener("click", Details);

    // var row=1;

    function Details() {
        var adate = document.getElementById("adate").value;
        var atime = document.getElementById("atime").value;
        var activity = document.getElementById("activity").value;

        var _tr = `<tr><td>${adate}</td>   <td>${atime}</td>   <td>${activity}</td>    <td class="table-remove"><button type="button" <span class="btn-danger glyphicon glyphicon-remove delete2" aria-hidden="true"></span></button></td></tr>`;
        $('#tab3').append(_tr);
    };

    $(document).on('click', '.delete2', function () {
        $(this).closest('tr').remove();
        

    });

});

//add for income
$(function () {
    var data = document.getElementById("Add3");
    data.addEventListener("click", Details);

    // var row=1;

    function Details() {
        var item1 = document.getElementById("item1").value;
        var income = document.getElementById("income").value;

        var _tr = `<tr><td>${item1}</td>   <td>${income}</td>     <td><button type="button" <span class="btn-danger glyphicon glyphicon-remove delete3" aria-hidden="true"></span></button></td></tr>`;
        $('#tab4').append(_tr);
    };

    $(document).on('click', '.delete3', function () {
        $(this).closest('tr').remove();

    });

});

//add for expenciture
$(function () {
    var data = document.getElementById("Add4");
    data.addEventListener("click", Details);

    // var row=1;

    function Details() {
        var item2 = document.getElementById("item2").value;
        var expenditure = document.getElementById("expenditure").value;

        var _tr = `<tr><td>${item2}</td>   <td>${expenditure}</td>     <td><button type="button" <span class="btn-danger glyphicon glyphicon-remove delete4" aria-hidden="true"></span></button></td></tr>`;
        $('#tab5').append(_tr);
    };

    $(document).on('click', '.delete4', function () {
        $(this).closest('tr').remove();

    });

});
