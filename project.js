$(document).ready(function(){

    $('.btn-danger.a-btn-slide-text').on('click',function(){

        rec = $(this).data("deleteid");
        console.log(rec);
         
        $('#modalDelete').modal();
        input2= `<input type='hidden' name ='iddelete' value=${rec}>`;
        document.getElementById('iddelete').innerHTML=input2;
    });
});