$(document).ready(function(){
    $('.viewStockModal').click(function(){
        var productId = $(this).attr('data-productId');        
        $.ajax({
            url: "viewAddStockModal.php",
            type : "POST",
            data: {pId:productId},
            success: function(response){
                $(".modal-content").html(response);
                $("#addStockModal").modal('show');
            }
        });
    });
});