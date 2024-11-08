function resetStrError(){
    $('#strFnameError').html('');
    $('#strLnameError').html('');
    $('#strEmailError').html('');
    $('#strPasswordError').html('');
    $('#strRePasswordError').html('');
}
function checkEmailinDB(email,callback){
    $.ajax({
        url:"customerRegForm.php",
        data:{validateEmail:email},
        success: function(response){
            if(parseInt(response) === 1){
                callback(true);
            }else{
                callback(false); 
            }
        }
    });
}
$(document).ready(function() {
    $('.regForm').on('submit','#customerRegisterForm',function(event) {
      event.preventDefault(); // Prevent the default form submission
  
      // Perform validation
      var fname = $.trim($('#Fname').val());
      var lname = $.trim($('#Lname').val());
      var email = $.trim($('#email').val());
      var password = $.trim($('#password').val());
      var repeat_password = $.trim($('#repeat_password').val());
  
      $('.myinputText').removeClass('is-invalid');
      resetStrError();
      var isFnameValid = true;
      var isLnameValid = true;
      var isEmailValid = true;
      var isPasswordValid = true;
      var isRePasswordValid = true;
    
      // Validate name
      if (fname === '') {
          $('#strFnameError').html("This field is required");
          $('#Fname').addClass('is-invalid');
          isFnameValid = false;
      }
  
      if (lname === '') {
          $('#strLnameError').html("This field is required");
          $('#Lname').addClass('is-invalid');
          isLnameValid = false;
      }
  
      // Validate email
      if (email === '') {
          $('#strEmailError').html('Please enter your email.');
          $('#email').addClass('is-invalid');
          isEmailValid = false;
      } else {
          // Regular expression for email validation
          var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email)) {
                $('#strEmailError').html('Invalid valid email entered.');
                $('#email').addClass('is-invalid');
                isEmailValid = false;
            }else{
                checkEmailinDB(email, function(exists) {
                    if (exists) {
                        $('#strEmailError').html('Email already exists.');
                        $('#email').addClass('is-invalid');
                        isEmailValid = false;
                    } else {
                        $('#email').addClass('is-valid');
                    }
                });
            }
      }
  
      // Validate password
      if (password.length === 0 || repeat_password.length === 0) {
          $('#strPasswordError').html('Please enter a valid password.');
          $('#strRePasswordError').html('Please enter a valid password.');
          $('#password').addClass('is-invalid');
          $('#repeat_password').addClass('is-invalid');
          isPasswordValid = false;
          isRePasswordValid = false;
      } else {
          if (password !== repeat_password) {
              $('#strPasswordError').html('Password does not match.');
              $('#strRePasswordError').html('Password does not match.');
              $('#password').addClass('is-invalid');
              $('#repeat_password').addClass('is-invalid');
              isPasswordValid = false;
              isRePasswordValid = false;
          }
      }
  
      if (isFnameValid && isLnameValid && isEmailValid && isPasswordValid && isRePasswordValid) {
          $('.myinputText').removeClass('is-invalid')
          resetStrError();
          isEmailValid = false;
          checkEmailinDB(email, function(exists) {
            if (exists) {
                $('#strEmailError').html('Email already exists.');
                $('#email').addClass('is-invalid');
                isEmailValid = false;
            } else {
                $('#email').addClass('is-valid');
                $.ajax({
                    url: "customerRegForm.php",
                    type:"post",
                    data:{fname:fname,lname:lname,email:email,pass:password},
                    success: function(response){
                        if(parseInt(response) === 1){
                            Swal.fire({
                                icon: 'success',
                                title: 'Done!',
                                text: 'Your Account was created successfully',
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    $('#register-form-modal').modal('hide');
                                }
                            });
                        }else{
                            console.log(response);
                            Swal.fire({icon:'warning',title:'Something is not right',text:''});
                        }
                    }
                 });
            }
        });
         
      }
    });
  });
  