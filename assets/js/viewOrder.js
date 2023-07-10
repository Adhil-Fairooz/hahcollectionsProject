$(document).ready(function(){
    loadOrders();
    $('tbody').on('click',"#view",function(){
        var invoiceID = $(this).attr("data-invoiceID");
        var paymentID = $(this).attr("data-paymentID");
        loadViewOrder(invoiceID,paymentID);
    });

});

function loadOrders(){
    $.ajax({
        url: "orderAjaxCalls.php",
        data: {task:"loadTable"},
        success:function(response){
            $('tbody').html(response);
        }
    });
}
function loadViewOrder(invoiceID,paymentID){
    $.ajax({
        url: "orderAjaxCalls.php",
        data: {task:"viewOrder",invoiceID:invoiceID,paymentID:paymentID},
        success:function(response){
            $('.modal-content').html(response);
            $('#viewEachOrder').modal('show');
        }
    })
}

function loadOrderDetailsOfInvoice($invoiceID){
    $.ajax({
        url: "orderAjaxCalls.php",
        data: {task:"loadOrderdetails",invoiceID:invoiceID},
        success:function(response){
            $('.modal-content').html(response);
            $('#viewEachOrder').modal('show');
        }
    })
}