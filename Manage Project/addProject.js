//Addmorebutton for objective

$(document).ready(function () {
    
  
    var addButton = $('.addService'); //Add button selector
    
    var fieldHTML = '<div><input type="text" class="form-control-sm" id="objective" name="objective[]" placeholder="Objective"><button type="button" <span class="btn-danger glyphicon glyphicon-remove remove" aria-hidden="true"></span></button></div>'; //New input field html 
      //Once add button is clicked
    $(addButton).click(function () {
        
            $('.Field1').append(fieldHTML); //Add field html
        
    });

    //Once remove button is clicked
    $(wrapper).on('click', '.remove', function (e) {
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
    });
});

///add data into table committe
$(function () {
    var data = document.getElementById("add");
    data.addEventListener("click", Details);

    // var row=1;

    function Details() {

        var rid = document.getElementById("rid").value;
        // var nmembers = document.getElementById("nmembers").value;
        var pmember = document.getElementById("pmember").value;

        var _tr = `<tr><td><input class="form-control" id="cccname" name="ccname[]" value="${rid}"></td>     <td><input class="form-control" id="ppmember" name="ppmember[]" value="${pmember}"></td>    <td class="table-remove"><button type="button" <span class="btn-danger glyphicon glyphicon-remove delete" aria-hidden="true"></span></button></td></tr>`;
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

        var _tr = `<tr><td><input class="form-control" id="aadate" name="aadate[]" value="${adate}"></td>     <td><input type="time" class="form-control" id="aatime" name="aatime[]" value="${atime}"></td>   <td><input class="form-control" id="aactivity" name="aactivity[]" value="${activity}"></td>    <td class="table-remove"><button type="button" <span class="btn-danger glyphicon glyphicon-remove delete2" aria-hidden="true"></span></button></td></tr>`;
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

        var _tr = `<tr><td><input class="form-control" id="iitem1" name="iitem1[]" value="${item1}"></td>   <td><input class="form-control" id="iincome" name="iincome[]" value="${income}"></td>     <td><button type="button" <span class="btn-danger glyphicon glyphicon-remove delete3" aria-hidden="true"></span></button></td></tr>`;
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

        var _tr = `<tr><td><input class="form-control" id="iitem2" name="iitem2[]" value="${item2}"></td>   <td><input class="form-control" id="eexpenditure" name="eexpenditure[]" value="${expenditure}"></td>     <td><button type="button" <span class="btn-danger glyphicon glyphicon-remove delete4" aria-hidden="true"></span></button></td></tr>`;
        $('#tab5').append(_tr);
    };

    $(document).on('click', '.delete4', function () {
        $(this).closest('tr').remove();

    });

});

// remove objective
$(document).on('click', '.removeob', function () {
    $(this).closest('tr').remove();

});

// remove committee
$(document).on('click', '.removecommittee', function () {
    $(this).closest('tr').remove();

});

// remove agenda
$(document).on('click', '.removeagenda', function () {
    $(this).closest('tr').remove();

});

// remove income
$(document).on('click', '.removeincome', function () {
    $(this).closest('tr').remove();

});

// remove expenditure
$(document).on('click', '.removeexpenditure', function () {
    $(this).closest('tr').remove();

});

//data into modal



