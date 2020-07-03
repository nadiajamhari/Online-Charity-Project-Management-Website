$( document ).ready(function() {
    var arr = ['bg_1.jpg','bg_2.jpg','bg_3.jpg'];
    var i = 0;
    setInterval(function(){
        if(i == arr.length - 1){
            i = 0;
        }else{
            i++;
        }
        var img = 'url(../assets/images/'+arr[i]+')';
        $(".full-bg").css('background-image',img); 
     
    }, 4000)
	
	 //submit profile update form
    $('#confirmSubmit').click(function (e) {
      e.preventDefault();
      var error = 0; 
      var inputs = $('.required');

      //check if all the required fields are filled
      for(var i = 0; i < inputs.length; i++){
        if($(inputs[i]).val() == ''){ //if textbox empty then show error and dont submit form
          $(inputs[i]).css({'border':'1px solid red','border-radius':'4px'});
          error = 1;
        }else{
          $(inputs[i]).css({'border':''});
        }
      }

    //if error!=1 means if there is no error(all required textboxes are filled)
    if(error != 1){
      var password = $('#password').val();
      var Re_enterPassword = $('#re-enterpassword').val();
      if(password != Re_enterPassword){
        $('.error').show();
        $('.error').html('Password and re-enter password must be same.');
      }else{
        swal({
        title: "Are you sure?",
        text: "",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Yes, Submit!",
        cancelButtonText: "Cancel",
        closeOnConfirm: false,
        closeOnCancel: true
        },
        function(isConfirm) {
        if (isConfirm) {
        $('form#ProfileUpdate').submit();
        } else {

        }
        });
      }
    }
    });
		
    //remove uploaded image on remove button click
		$('#remove').click(function(e){
			e.preventDefault();
			$('#profileImage').val('');
			$('#blah').attr('src', '');
			$(this).hide();
		});

    $('#deleteProfile').click(function (e) {
      e.preventDefault();
      var profileid = $('#profileid').val();
      swal({
      title: "Are you sure?",
      text: "",
      type: "warning",
      showCancelButton: true,
      confirmButtonClass: "btn-danger",
      confirmButtonText: "Yes, Delete!",
      cancelButtonText: "Cancel",
      closeOnConfirm: false,
      closeOnCancel: true
      },
      function(isConfirm) {
        if (isConfirm) {
        $.ajax({
          url: "delete.php",
          type: "post",
          data: {profileid:profileid} ,
          success: function (response) {
          var result = $.parseJSON(response);
          console.log(result);
          if(result == 'success'){
          header("Location:../IndexLoginSignup/index.html?action=delete_success");

          }
          },
        });
        } else {

        }
      });
    });
    
  });

  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
      $('#blah').show();
      $('.btn').show();
      $('#blah').attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }

    