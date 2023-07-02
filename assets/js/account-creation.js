function displayForm(){
    $.ajax({
        url: "customerRegForm.php",
        type: "post",
        data: {task:"create"},
        success: function(response){
            $('.modal-content').html(response);
            $('#register-form-modal').modal('show');
        }
    });
}