// $(document).ready(function(){
//     $('btn-danger.a-btn-slide-text.deletevol').on('click',function()
//     {
//         rec=$(this).data("deleteid");
//         console.log(rec);

//         $('deleteVol').modal();
        
//         input="<input type='hidden' name ='delete' value="+rec+">";
//         document.getElementById('delete_id').innerHTML=input;
//     });
// });


function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
  }
  
  function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft = "0";
  }
  
  
  //delete row
  var rec,input;
  
  $(document).ready(function () {
      $('.btn-danger.btn-rounded.btn-sm.my-0').on('click', function () {
          rec = $(this).data("numb");
          console.log(rec);
  
          $('#ModalDelete').modal();
          
          input="<input type='hidden' name ='delete_id' value="+rec+">Delete";
          document.getElementById('myform').innerHTML =input;
        });
  
  });

  