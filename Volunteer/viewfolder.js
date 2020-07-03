
  $(document).ready(function(){  
    $('.btn-default.btn-rounded.btn-sm.my-0').on('click', function () {  
        console.log("masuk");
         var volun_id = $(this).attr("id");
         console.log(volun_id); 

         $.ajax({  
              url:"viewfolder.php",  
              method:"POST",  
              data:{
                volun_id:volun_id
              },  
              success:function(data){  
                   $('#volunteer_detail').html(data);  
                   $('#ModalView').modal("show");  
              }  
         });
    });  
  });  



  function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
  }
  
  function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft = "0";
  }