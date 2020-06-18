//modal delete obj
$(document).ready(function(){

    $('.btn-danger.a-btn-slide-text.objective').on('click',function(){

        rec = $(this).data("deleteid");
        rec1= $(this).data("projectid")
        console.log(rec);
        console.log(rec1);
         
        $('#deleteObjective').modal();
        input2= `<input type='hidden' name ='deleteID' value=${rec}>`;
        input3= `<input type='hidden' name ='projectID' value=${rec1}>`;
        document.getElementById('deleteobjectiveID').innerHTML=input2;
        document.getElementById('projectobjectiveID').innerHTML=input3;
    });
});

// committee

$(document).ready(function(){

    $('.btn-danger.a-btn-slide-text.committee').on('click',function(){

        rec = $(this).data("deleteid");
        rec1= $(this).data("projectid")
        console.log(rec);
        console.log(rec1);
         
        $('#deleteCommittee').modal();
        input2= "<input type='hidden' name ='deleteID' value="+rec+">";
        input3= "<input type='hidden' name ='projectID' value="+rec1+">";
        document.getElementById('deletecommitteeID').innerHTML=input2;
        document.getElementById('projectcommitteeID').innerHTML=input3;
    });
});

// agenda

$(document).ready(function(){

    $('.btn-danger.a-btn-slide-text.agenda').on('click',function(){

        rec = $(this).data("deleteid");
        rec1= $(this).data("projectid")
        console.log(rec);
        console.log(rec1);
         
        $('#deleteAgenda').modal();
        input2= "<input type='hidden' name ='deleteID' value="+rec+">";
        input3= "<input type='hidden' name ='projectID' value="+rec1+">";
        document.getElementById('deleteagendaID').innerHTML=input2;
        document.getElementById('projectagendaID').innerHTML=input3;
    });
});


// income

$(document).ready(function(){

    $('.btn-danger.a-btn-slide-text.income').on('click',function(){

        rec = $(this).data("deleteid");
        rec1= $(this).data("projectid")
        console.log(rec);
        console.log(rec1);
         
        $('#deleteIncome').modal();
        input2= "<input type='hidden' name ='deleteID' value="+rec+">";
        input3= `<input type='hidden' name ='projectID' value=${rec1}>`;
        document.getElementById('deleteincomeID').innerHTML=input2;
        document.getElementById('projectincomeID').innerHTML=input3;
    });
});


// expenditure
$(document).ready(function(){

    $('.btn-danger.a-btn-slide-text.expenditure').on('click',function(){

        rec = $(this).data("deleteid");
        rec1= $(this).data("projectid")
        console.log(rec);
        console.log(rec1);
         
        $('#deleteExpenditure').modal();
        input2= "<input type='hidden' name ='deleteID' value="+rec+">";
        input3= `<input type='hidden' name ='projectID' value=${rec1}>`;
        document.getElementById('deleteexpenditureID').innerHTML=input2;
        document.getElementById('projectexpenditureID').innerHTML=input3;
    });
});

