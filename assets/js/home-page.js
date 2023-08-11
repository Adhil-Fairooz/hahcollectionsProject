$(document).ready(function(){
    loadAllProducts();
    $('#homeSearch').submit(function(event){
        event.preventDefault();
        var searchData = $('input[name="search"]').val();
        $('#title').html('Search: '+searchData);
        Swal.fire({
            title: 'Please Wait...',
            html: '<div class="loading-spinner"></div>',
            text: '',
            showConfirmButton: false,
            allowOutsideClick: false,
            willOpen: () => {
                Swal.showLoading();
            }
        });

        $.ajax({
            url:"customerPanel/loadProducts.php",
            data:{task:"searchProductCustomer",searchData:searchData},
            success: function(response){
                Swal.close();
                $('#items').html(response);
            },
        });
    });
})
function loadAllProducts(){
    $('#title').html('All products')
    $.ajax({
        url: 'customerPanel/loadProducts.php',
        data: { table: "all" },
        success: function(response) {
          $("#items").html(response);
        }
    });
  }

function showModal(element){
    var productId = $(element).attr('data-productId'); 
    $.ajax({
        url: "customerPanel/viewProducts.php",
        data: {pId:productId,task:'homepage'},
        success: function(response){
            $(".modal-content").html(response);
            $("#viewProduct").modal('show');
            $('#addtoCart').show();
            $('#stockOut').hide();
        }
    });
}
