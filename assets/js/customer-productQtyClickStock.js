$(document).ready(function(){
    $('.my-modal-content').on('click','.minus',function(){
        var sizeId = $('input[name="size"]:checked').val();
        var colorID = $('input[name="color"]:checked').val();
        var productID = $('input[name="productId"]').val();
        var reqQty = $('input[name="quantity"]').val();
        console.log(reqQty);
        getAvailability(sizeId,colorID,productID,reqQty);
    });
    $('.my-modal-content').on('click','.plus',function(){
        var sizeId = $('input[name="size"]:checked').val();
        var colorID = $('input[name="color"]:checked').val();
        var productID = $('input[name="productId"]').val();
        var reqQty = $('input[name="quantity"]').val();
        console.log(reqQty);
        getAvailability(sizeId,colorID,productID,reqQty);
    });
});

function getAvailability(sid,cid,pid,qty){
    $.ajax({
        url: "loadProducts.php",
        data:{pId:pid,sId:sid,cId:cid,qty:qty},
        success: function(result){
          //$("#stockStatus").html(result);
          if (parseInt(result) === 0) {
            $('#addtoCart').show();
            $('#stockOut').hide();
            $("#stockStatus").html("<p class='stock-in'>Its available</p>");
          } else if (parseInt(result)  === 1) {
            $('#addtoCart').hide();
            $('#stockOut').show();
            $("#stockStatus").html("<p class='stock-out'>Sorry insufficient stock ! </p>");
          } else if (parseInt(result)  === 2) {
            $('#addtoCart').hide();
            $('#stockOut').show();
            $("#stockStatus").html("<p class='stock-out'>Sorry, Not in stock yet !</p>");
          } else {
            console.log('Unexpected server response.'+result);
          }
        }
      });
}