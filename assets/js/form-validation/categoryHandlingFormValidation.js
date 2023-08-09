$(document).ready(function(){

    /* Validate Main Category Form */

    $('#AddmainCategory').submit(function(event){
        var mainName = $('input[name="CategoryName"]');
        $('#strmainNameError').html("");
        $('.myinputText').removeClass('is-invalid');
        var is_Valid_MainName = true;

        if($.trim(mainName.val()) === ''){
            $('#strmainNameError').html("This field is required");
            $('.myinputText').addClass('is-invalid');
            is_Valid_MainName = false;
        }

        if(is_Valid_MainName){
            $('#strmainNameError').html("");
            $('.myinputText').removeClass('is-invalid');
        }else{
            event.preventDefault();
        }
    })

    $('#main-tbody').on('click','#update-Main',function(){
        var MainID = $(this).attr('data-mainCat');
        displayMainUpdateForm(MainID);
    })
    $('#main-tbody').on('click','#del-Main',function(){
        var MainID = $(this).attr('data-mainCat');
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
                removeMainCategory(MainID);
            }
        });
        
    });

    $('.main-content').on('submit','#UpdateMainCategory',function(event){
        event.preventDefault();
        var MainID = $(this).attr('data-id');
        var mainName = $('input[name="UPMainName"]');
        $('#strmainNameErrorUP').html("");
        $('.UP').removeClass('is-invalid');
        var is_Valid_MainName = true;

        if($.trim(mainName.val()) === ''){
            $('#strmainNameErrorUP').html("This field is required");
            $('.UP').addClass('is-invalid');
            is_Valid_MainName = false;
        }

        if(is_Valid_MainName){
            $('#strmainNameErrorUP').html("");
            $('.UP').removeClass('is-invalid');

            // ajax request to database for UPDATE

            $.ajax({
                url: "categoryHandlingAjax.php",
                data : {task: "UpdateMainCat",id:MainID,name:mainName.val()},
                success : function(response){
                    if(parseInt(response) === 1){
                        Swal.fire({icon:'success',title:'Done !',text:'Main Category Updated successfully'});
                    }else{
                        Swal.fire({icon:'error',title:'Something is not right',text:'Query Failed'});
                    }
                }
            });
        }
    });

    //---------------- Main Category Ended -----------------------------

    /* Validate Sub Category Form */

    $('#AddSubCategory').submit(function(event){
        var subName = $('input[name="CategoryName"]');
        $('#strSubNameError').html("");
        $('.myinputText').removeClass('is-invalid');
        var is_Valid = true;

        if($.trim(subName.val()) === ''){
            $('#strSubNameError').html("This field is required");
            $('.myinputText').addClass('is-invalid');
            is_Valid = false;
        }

        if(is_Valid){
            $('#strSubNameError').html("");
            $('.myinputText').removeClass('is-invalid');
        }else{
            event.preventDefault();
        }
    });

    $('#sub-tbody').on('click','#update-sub',function(){
        var SubID = $(this).attr('data-subCat');
        displaySubUpdateForm(SubID);
    });
    $('#sub-tbody').on('click','#del-sub',function(){
        var SubID = $(this).attr('data-subCat');
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
                removeSubCategory(SubID);
            }
        });
        
    });
// update Form sub category
    $('.sub-content').on('submit','#UpdateSubCategory',function(event){
        event.preventDefault();
        var subID = $(this).attr('data-id');
        var subName = $('input[name="UPSubName"]');
        $('#strSubNameErrorUP').html("");
        $('.UP').removeClass('is-invalid');
        var is_Valid = true;

        if($.trim(subName.val()) === ''){
            $('#strSubNameErrorUP').html("This field is required");
            $('.UP').addClass('is-invalid');
            is_Valid = false;
        }

        if(is_Valid){
            $('#strSubNameErrorUP').html("");
            $('.UP').removeClass('is-invalid');

            // ajax request to database for UPDATE

            $.ajax({
                url: "categoryHandlingAjax.php",
                data : {task: "UpdateSubCat",id:subID,name:subName.val()},
                success : function(response){
                    if(parseInt(response) === 1){
                        Swal.fire({icon:'success',title:'Done !',text:'Sub Category Updated successfully'});
                    }else{
                        console.log(response);
                        Swal.fire({icon:'error',title:'Something is not right',text:'Query Failed'});
                    }
                }
            });
        }
    });

     //---------------- Sub Category Ended -----------------------------
    /* Validate Brand  */

    $('#AddBrandName').submit(function(event){
        var brandName = $('input[name="CategoryName"]');
        $('#strBrandError').html("");
        $('.myinputText').removeClass('is-invalid');
        var is_Valid_Brand = true;

        if($.trim(brandName.val()) === ''){
            $('#strBrandError').html("This field is required");
            $('.myinputText').addClass('is-invalid');
            is_Valid_Brand = false;
        }

        if(is_Valid_Brand){
            $('#strBrandError').html("");
            $('.myinputText').removeClass('is-invalid');
        }else{
            event.preventDefault();
        }
    });

    $('#brand-tbody').on('click','#Update-brand',function(){
        var BrandID = $(this).attr('data-brandID');
        displayBrandUpdateForm(BrandID);
    });
    $('#brand-tbody').on('click','#del-brand',function(){
        var BrandID = $(this).attr('data-brandID');
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
                removeBrandName(BrandID);
            }
        });
        
    });
// update Form Brand Validation
    $('.brand-content').on('submit','#UpdateBRAND',function(event){
        event.preventDefault();
        var BrandID = $(this).attr('data-id');
        var brandName = $('input[name="UPBrandName"]');
        $('#strBrandErrorUP').html("");
        $('.UP').removeClass('is-invalid');
        var is_Valid_Brand = true;

        if($.trim(brandName.val()) === ''){
            $('#strBrandErrorUP').html("This field is required");
            $('.UP').addClass('is-invalid');
            is_Valid_Brand = false;
        }

        if(is_Valid_Brand){
            $('#strBrandErrorUP').html("");
            $('.UP').removeClass('is-invalid');

            // ajax request to database for UPDATE

            $.ajax({
                url: "categoryHandlingAjax.php",
                data : {task: "UpdateBrandvalue",id:BrandID,name:brandName.val()},
                success : function(response){
                    if(parseInt(response) === 1){
                        Swal.fire({icon:'success',title:'Done !',text:'Brand Name Updated successfully'});
                    }else{
                        console.log(response);
                        Swal.fire({icon:'error',title:'Something is not right',text:'Query Failed'});
                    }
                }
            });
        }
    });


});

//function to display Update Main Category Modal Form
function displayMainUpdateForm(id){
    $.ajax({
        url : "categoryHandlingAjax.php",
        data : {task: "showMainCategoryUpdateForm",mid:id},
        success : function (response){
            $('.main-content').html(response);
            $('#Update-modal-mainCategory').modal('show');
        }
    })
}
function removeMainCategory(id){
    $.ajax({
        url : "categoryHandlingAjax.php",
        data : {task: "deleteMainCategory",mid:id},
        success : function (response){
            if(parseInt(response) === 1){
                Swal.fire({icon:'success',title:'Done !',text:'Main Category Removed successfully'});
            }else{
                console.log(response);
                Swal.fire({icon:'warning',title:'Sorry Cannot Delete',text:'There are Records associated with this Main Category'});
            }
        }
    })
}

//function to display Update Sub Category Modal Form
function displaySubUpdateForm(id){
    $.ajax({
        url : "categoryHandlingAjax.php",
        data : {task: "showSubCategoryUpdateForm",sid:id},
        success : function (response){
            $('.sub-content').html(response);
            $('#Update-modal-subCategory').modal('show');
        }
    })
}
function removeSubCategory(id){
    $.ajax({
        url : "categoryHandlingAjax.php",
        data : {task: "deleteSubCategory",sid:id},
        success : function (response){
            if(parseInt(response) === 1){
                Swal.fire({icon:'success',title:'Done !',text:'Sub Category Removed successfully'});
            }else{
                console.log(response);
                Swal.fire({icon:'warning',title:'Sorry Cannot Delete',text:'There are Records associated with this Sub Category'});
            }
        }
    })
}

//function to display Brand Modal Form
function displayBrandUpdateForm(id){
    $.ajax({
        url : "categoryHandlingAjax.php",
        data : {task: "showBrandUpdateForm",bid:id},
        success : function (response){
            $('.brand-content').html(response);
            $('#Update-modal-brand').modal('show');
        }
    })
}

function removeBrandName(id){
    $.ajax({
        url : "categoryHandlingAjax.php",
        data : {task: "DELETEBrandvalue",bid:id},
        success : function (response){
            if(parseInt(response) === 1){
                Swal.fire({icon:'success',title:'Done !',text:'Brand Name Removed successfully'});
            }else{
                console.log(response);
                Swal.fire({icon:'warning',title:'Sorry Cannot Delete',text:'There are Records associated with this Brand'});
            }
        }
    })
}

