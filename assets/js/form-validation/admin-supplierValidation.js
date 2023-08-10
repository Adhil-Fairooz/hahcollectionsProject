$(document).ready(function(){
    $('#AddSupplier').submit(function(event){

        var name = $('input[name="supName"]');
        var email = $('input[name="supEmail"]');
        var contact = $('input[name="supContact"]');

        $('.myinputText').removeClass('is-invalid');
        $('#strSupNameERROR').html('');
        $('#strSupContactERROR').html('');
        $('#strSupEmailERROR').html('');
        var isFnameValid = true;
        var isEmailValid = true;
        var isContactValid = true;

        if($.trim(name.val()) === ''){
            name.addClass('is-invalid');
            $('#strSupNameERROR').html('This Field is Required');
            isFnameValid = false;
        }

        if($.trim(email.val()) === ''){
            email.addClass('is-invalid');
            $('#strSupEmailERROR').html('This Field is Required');
            isEmailValid = false;
        }else{
            // Regular expression for email validation
            var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test($.trim(email.val()))) {
                $('#strSupEmailERROR').html('Invalid valid email entered.');
                email.addClass('is-invalid');
                isEmailValid = false;
            }
        }

        if($.trim(contact.val()) == ''){
            $('#strSupContactERROR').html("This field is required");
            contact.addClass('is-invalid');
            isContactValid = false;
        }else{
            if($.isNumeric($.trim(contact.val()))){
                if($.trim(contact.val()).length == 10){
                    isContactValid = true;
                    contact.removeClass('is-invalid');
                    $('#strSupContactERROR').html('');
                }else{
                    $('#strSupContactERROR').html("Contact number must have 10 digits");
                    contact.addClass('is-invalid');
                    isContactValid = false;
                }
            }else{
                $('#strSupContactERROR').html("Invalid characters");
                contact.addClass('is-invalid');
                isContactValid = false;
            }
        }

        if(isFnameValid && isEmailValid && isContactValid){
            $('.myinputText').removeClass('is-invalid');
            $('#strSupNameERROR').html('');
            $('#strSupContactERROR').html('');
            $('#strSupEmailERROR').html('');
        }else{
            event.preventDefault();
        }
    });

    $('#suppTbl').on('click','#supUpdate',function(){
        var supID = $(this).attr('data-id');
        updateSupplier(supID)
    });
    $('#suppTbl').on('click','#supDelete',function(){
        var supID = $(this).attr('data-id');
        Swal.fire({
            title: 'Are you Sure',
            text:'Do you really want to Romove it !',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#686de0',
            cancelButtonColor: '#f46e50',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                deletesupplier(supID);
            }
        });
    });
    $('.modal-content').on('submit','#UpdateSupplier',function(event){
        event.preventDefault();
        var id = $(this).attr('data-id');
        var name = $('input[name="supNameUP"]');
        var email = $('input[name="supEmailUP"]');
        var contact = $('input[name="supContactUP"]');
        console.log("updateForm "+id);
        $('.myinputText').removeClass('is-invalid');
        $('#strSupNameERRORUP').html('');
        $('#strSupContactERRORUP').html('');
        $('#strSupEmailERRORUP').html('');
        var isFnameValid = true;
        var isEmailValid = true;
        var isContactValid = true;

        if($.trim(name.val()) === ''){
            name.addClass('is-invalid');
            $('#strSupNameERRORUP').html('This Field is Required');
            isFnameValid = false;
        }

        if($.trim(email.val()) === ''){
            email.addClass('is-invalid');
            $('#strSupEmailERRORUP').html('This Field is Required');
            isEmailValid = false;
        }else{
            // Regular expression for email validation
            var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test($.trim(email.val()))) {
                $('#strSupEmailERRORUP').html('Invalid valid email entered.');
                email.addClass('is-invalid');
                isEmailValid = false;
            }
        }

        if($.trim(contact.val()) == ''){
            $('#strSupContactERRORUP').html("This field is required");
            contact.addClass('is-invalid');
            isContactValid = false;
        }else{
            if($.isNumeric($.trim(contact.val()))){
                if($.trim(contact.val()).length == 10){
                    isContactValid = true;
                    contact.removeClass('is-invalid');
                    $('#strSupContactERRORUP').html('');
                }else{
                    $('#strSupContactERRORUP').html("Contact number must have 10 digits");
                    contact.addClass('is-invalid');
                    isContactValid = false;
                }
            }else{
                $('#strSupContactERRORUP').html("Invalid characters");
                contact.addClass('is-invalid');
                isContactValid = false;
            }
        }

        if(isFnameValid && isEmailValid && isContactValid){
            $('.myinputText').removeClass('is-invalid');
            $('#strSupNameERRORUP').html('');
            $('#strSupContactERRORUP').html('');
            $('#strSupEmailERRORUP').html('');

            $.ajax({
                url:"supplierAjax.php",
                data:{task:"updateSupData",name:name.val(),email:email.val(),contact:contact.val(),id:id},
                success: function(response){
                    if(parseInt(response) === 1){
                        Swal.fire({icon:'success',title:'Done !',text:'Supplier Updated successfully'});
                    }else{
                        console.log(response);
                        Swal.fire({icon:'warning',title:'Something is not right',text:''});
                    }
                }
            })
        }
    });
});
function updateSupplier(id){
    $.ajax({
        url: "supplierAjax.php",
        data: {task:"showUpdateForm",id:id},
        success:function(response){
            $('.modal-content').html(response);
            $('#Update-modal-supplier').modal('show');
        }
    })
}
function deletesupplier(id){
    $.ajax({
        url: "supplierAjax.php",
        data: {task:"deleteSupplier",id:id},
        success:function(response){
            if(parseInt(response) === 1){
                Swal.fire({icon:'success',title:'Done !',text:'Supplier Removed successfully'});
            }else{
                console.log(response);
                Swal.fire({icon:'warning',title:'Sorry Cannot Delete',text:'There are Records associated with this supplier'});
            }
        }
    })
}

