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
    Swal.fire({
        title: 'Do you want to remove?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
    }).then((result)=>{
        if(result.isConfirmed){
            $.ajax({
                url: "loadCartInfo.php",
                data:{pid:product_id,sid:size_id,colid:color_id,custid:customer_id},
                success: function(response){
                    loadCarttbl();
                    getCounttbl();
                    getTotaltbl();
                    $("#discount").val(0);
                    $('#discountAmount').html("0.00");
                }
            });
        }
    });
    

}
var subtotal;
function getTotaltbl(){
    var customer_id = $('#getCustID').attr('data-customerID'); 
    $.ajax({
        url: "checkoutPage.php",
        data:{custTotalcart:customer_id},
        success: function(response){
            if(parseInt(response) === 0){
                $('#total').html("0.00");
                response = 0;
            }else{
                $('#total').html(response);
                subtotal = response;
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
var conditionAmount;
var discountvalue;

function setAmounts(){
    if(subtotal >= parseFloat(conditionAmount)){
        $('#discountAmount').html(discountvalue);
        var total = subtotal - parseFloat(discountvalue);
        $('#total').html(total);
    }else{
        $('#discountAmount').html("0.00");
        $('#total').html(subtotal);
    }
    
}
$( document ).ready(function() {
    loadCarttbl();
    getCounttbl();
    getTotaltbl();

    $('input[name="offerTable"]').click(function(){
        var table = $('input[name="offerTable"]:checked').val();
        loadOptions(table);
    });
    $('#discount').click(function(){
        var offerID = $(this).val();
        if(parseInt(offerID) === 0){
            $('#discountAmount').html("0.00");
            getTotaltbl();
        }else{
            $.ajax({
                url: "checkoutPage.php",
                dataType : 'json',
                data:{offerID:offerID,subtotal:subtotal},
                success:function(response){
                    conditionAmount = response.billValue;
                    discountvalue = response.discountAmount;
                    setAmounts();
                }

            });
        }
    });
/* Slide 2 : payment */
    $('input[name="paymentMethod"]').click(function(){
        var type = $('input[name="paymentMethod"]:checked').val();
        loadPaymentMethodForm(type);

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

function loadPaymentMethodForm(type){
    $('#my-payment-card').html('');
    if(type === 'COD'){
        loadForm(type);
    }else if(type === 'BD'){
        loadForm(type);
    }else if(type === 'Pick'){
        loadForm(type);
    }

}

function loadForm(type){
    $.ajax({
        url : "checkout-payment-options.php",
        data:{form:type,task:"show"},
        success: function(response){
            $('#my-payment-card').html(response);
        }

    });
}