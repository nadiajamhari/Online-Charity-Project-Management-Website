function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
  }
  
  function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft = "0";
  }
  
  
  //delete row
  var rec,input,projek,message;
  
  $(document).ready(function () {
      $('.btn-danger.btn-rounded.btn-sm.my-0').on('click', function () {
          projek=$(this).data("projid");
          rec = $(this).data("numb");
          name = $(this).data("name");
          
          console.log(rec);
          console.log(name);
          console.log(projek);
  
          $('#ModalDelete').modal();
          
          message="Are you sure you want to remove <b>"+name+"</b>?";
          document.getElementById('message').innerHTML=message;
  
          input="document.location='assignProjectDel.php?vol="+rec+"&proj="+projek+"'";
          document.getElementById('deleteConfirm').setAttribute("onClick",input);
  
        });
  
  });