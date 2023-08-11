/* view Product Modal */
function showModal(element){
        var productId = $(element).attr('data-productId'); 
        $.ajax({
            url: "viewProducts.php",
            data: {pid:productId,task:"customer"},
            success: function(response){
                $(".modal-content").html(response);
                $("#viewProduct").modal('show');
                $('#addtoCart').show();
                $('#stockOut').hide();
            }
        });
}
