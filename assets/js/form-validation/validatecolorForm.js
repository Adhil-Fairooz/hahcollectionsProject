$(document).ready(function(){

    $('#addProductColors').submit(function(event){
        var colorName = $('input[name="colorName"]');
        
        $('.myinputText').removeClass('is-invalid');
        $('#strNameEror').html('');
        var isValid = true;

        if($.trim(colorName.val()) === ''){
            $('.myinputText').addClass('is-invalid');
            $('#strNameEror').html('This Field is required');
            isValid = false;
        }

        if(isValid){
            $('.myinputText').removeClass('is-invalid');
            $('#strNameEror').html('');
        }else{
            event.preventDefault();
        }

    });

    $('tbody').on('click','#update',function(){
        var id = $(this).attr('data-id');
        showUpdateForm(id);
    });
    $('tbody').on('click','#del-color',function(){
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
                DeleteColor(id);
            }
        });
    });
    $('.modal-content').on('submit','#UpdateColor',function(event){
        event.preventDefault();
        var id = $(this).attr('data-id');

        var colorName = $('input[name="colorNameUP"]');
        var colorValue = $('input[name="colorValueUP"]').val();
        
        $('.UP').removeClass('is-invalid');
        $('#strNameErorUP').html('');
        var isValid = true;

        if($.trim(colorName.val()) === ''){
            $('.UP').addClass('is-invalid');
            $('#strNameErorUP').html('This Field is required');
            isValid = false;
        }

        if(isValid){
            $('.UP').removeClass('is-invalid');
            $('#strNameErorUP').html('');

            $.ajax({
                url: "colorsizeAjax.php",
                data:{task:'updatecolorValue',name:colorName.val(),value:colorValue,id:id},
                success : function(response){
                    if(parseInt(response) === 1){
                        Swal.fire({icon:'success',title:'Done !',text:'Color Updated successfully'});
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
        data:{task:"showUpdateFormColor",id:id},
        success:function(response){
            $('.modal-content').html(response);
            $('#Update-modal-color').modal('show');
        }
    });
}

function DeleteColor(id){
    $.ajax({
        url : "colorsizeAjax.php",
        data : {task: "deleteColor",id:id},
        success : function (response){
            if(parseInt(response) === 1){
                Swal.fire({icon:'success',title:'Done !',text:'Color Removed successfully'});
            }else{
                console.log(response);
                Swal.fire({icon:'warning',title:'Sorry Cannot Delete',text:'There are Records associated with this Color'});
            }
        }
    })
}