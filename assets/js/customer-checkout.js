function loadCarttbl(){
    var customer_id = $('#getCustID').attr('data-customerID'); 
    console.log(customer_id);
    $.ajax({
        url: "checkoutPage.php",
        data:{cid:customer_id,task:"show"},
        success: function(response){
            $('.tbody').html(response);          
        },
        error: function(xhr, status, error) {
            console.log('An error occurred: ' + error);
          }
      });
}
function removeFromCarttbl(element){
    var product_id = $(element).attr('data-pid');
    var size_id = $(element).attr('data-sid');
    var color_id = $(element).attr('data-cid');
    var customer_id = $(element).attr('data-custid');
    $.ajax({
        url: "loadCartInfo.php",
        data:{pid:product_id,sid:size_id,colid:color_id,custid:customer_id},
        success: function(response){
            loadCarttbl();
            getCounttbl();
            getTotaltbl();
        }
    });

}
function getTotaltbl(){
    var customer_id = $('#getCustID').attr('data-customerID'); 
    $.ajax({
        url: "checkoutPage.php",
        data:{custTotalcart:customer_id},
        success: function(response){
            if(parseInt(response) === 0){
                $('#total').html("0.00");
            }else{
                $('#total').html(response);
                console.log(response)
            }
        }
    })
 }
function getCounttbl(){
    var customer_id = $('#getCustID').attr('data-customerID'); 
    $.ajax({
        url: "loadCartInfo.php",
        data:{customerID:customer_id},
        success: function(response){
            if(parseInt(response) === 0){
                $('#cartBadge').html("");
            }else{
                $('#cartBadge').html(response);
            }
        }
    })
}
$( document ).ready(function() {
    loadCarttbl();
    getCounttbl();
    getTotaltbl();

    $('input[type="radio"]').click(function(){
        var table = $('input[name="offerTable"]:checked').val();
        loadOptions(table);
    });
});

function loadOptions(table){
    var customer_id = $('#getCustID').attr('data-customerID'); 
    $.ajax({
        url: 'customer_offer.php',
        method: 'post',
        data: { table: table,customer_id:customer_id },
        success: function(data) {
            $('#discount').html(data);
        }
    });
}