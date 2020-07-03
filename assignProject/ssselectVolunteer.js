function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
  }
  
  function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft = "0";
  }
  
  
$(document).ready(function(){  
    $('.btn-default.btn-rounded.btn-sm.my-0').on('click', function () {  
         var volid = $(this).attr("id");
         console.log("masukview"); 
         console.log(volid); 
         $.ajax({  
              url:"selectVolunteerView.php",  
              method:"post",  
              data:{volid:volid},  
              success:function(data){  
                   $('#volunteer_detail').html(data);  
                   $('#ModalView').modal("show");  
              }  
         });  
    });  
   

});
