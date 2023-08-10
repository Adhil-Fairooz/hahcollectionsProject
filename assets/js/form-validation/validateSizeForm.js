$(document).ready(function(){

    $('#addProductSize').submit(function(event){
        var type = $('input[name="type"]');
        var value = $('input[name="value"]');
        
        $('.myinputText').removeClass('is-invalid');
        $('#strTypeError').html('');
        $('#strValueError').html('');
        var isValid = true;

        if($.trim(type.val()) === ''){
            type.addClass('is-invalid');
            $('#strTypeError').html('This Field is required');
            isValid = false;
        }
        if($.trim(value.val()) === ''){
            value.addClass('is-invalid');
            $('#strValueError').html('This Field is required');
            isValid = false;
        }

        if(isValid){
            $('.myinputText').removeClass('is-invalid');
            $('#strTypeError').html('');
            $('#strValueError').html('');
        }else{
            event.preventDefault();
        }

    });

    $('tbody').on('click','#update',function(){
        var id = $(this).attr('data-id');
        showUpdateForm(id);
    });
    $('tbody').on('click','#delete',function(){
        var id = $(this).attr('data-id');
        
        Swal.fire({
            title: 'Are you Sure',
            text:'Yoy really want to delete it !',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#686de0',
            cancelButtonColor: '#f46e50',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                DeleteSize(id);
            }
        });
    });
    $('.modal-content').on('submit','#UpdateSize',function(event){
        event.preventDefault();
        var id = $(this).attr('data-id');

        var colorName = $('input[name="typeUP"]');
        var colorValue = $('input[name="valueUP"]').val();
        
        $('.UP').removeClass('is-invalid');
        $('#strTypeErrorUP').html('');
        $('#strValueErrorUP').html('');
        var isValid = true;

        if($.trim(colorName.val()) === ''){
            colorName.addClass('is-invalid');
            $('#strTypeErrorUP').html('This Field is required');
            isValid = false;
        }
        if($.trim(colorValue) === ''){
            $('input[name="valueUP"]').addClass('is-invalid');
            $('#strValueErrorUP').html('This Field is required');
            isValid = false;
        }

        if(isValid){
            $('.UP').removeClass('is-invalid');
            $('#strTypeErrorUP').html('');
            $('#strValueErrorUP').html('');

            $.ajax({
                url: "colorsizeAjax.php",
                data:{task:'updateSizeValue',name:colorName.val(),value:colorValue,id:id},
                success : function(response){
                    if(parseInt(response) === 1){
                        Swal.fire({icon:'success',title:'Done !',text:'Size Updated successfully'});
                    }else{
                        Swal.fire({icon:'error',title:'Something is not right',text:'Query Failed'});
                    }
                }
            })
        }
    })
});

function showUpdateForm(id){
    $.ajax({
        url: "colorsizeAjax.php",
        data:{task:"showUpdateFormSize",id:id},
        success:function(response){
            $('.modal-content').html(response);
            $('#Update-modal-color').modal('show');
        }
    });
}

function DeleteSize(id){
    $.ajax({
        url : "colorsizeAjax.php",
        data : {task: "deleteSize",id:id},
        success : function (response){
            if(parseInt(response) === 1){
                Swal.fire({icon:'success',title:'Done !',text:'Size Removed successfully'});
            }else{
                console.log(response);
                Swal.fire({icon:'warning',title:'Sorry Cannot Delete',text:'There are Records associated with this Size'});
            }
        }
    })
}