$(document).ready(function () {
    var cid = $('#displayInvoice').attr('data-customerid');
    displayInvoice(cid);
    $("#sidebarCollapse").on("click", function () {
      $("#sidebar").toggleClass("active");
    });

    $('#currentOrders').on('click',function(event){
      displayInvoice(cid);
      $("#sidebar").toggleClass("active");

    });
    $('#completedOrders').on('click',function(event){
      displayCompletedOrders(cid);
      $("#sidebar").toggleClass("active");
            
    });
    
    $('#displayInvoice').on('click',"#cust-view-order",function(){
      var invoiceID = $(this).attr("data-invoiceID");
      var paymentID = $(this).attr("data-paymentID");
      viewCustOrder(invoiceID,paymentID);
    });

    $('#displayInvoice').on('click',"#cust-cancel-order",function(){
      var invoiceID = $(this).attr("data-invoiceID");
      var paymentID = $(this).attr("data-paymentID");
      Swal.fire({
        title: 'Do you wish to cancel Your Order ?',
        icon: 'info',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
      }).then((result) => {
          if (result.isConfirmed) {
            cancelOrder(invoiceID,paymentID);
          }
      });
      displayInvoice(cid);
      
    });

    $('#displayInvoice').on('submit',"#paymentProof",function(event){
      event.preventDefault();

      // validate that form
      var fileInput = $('#imgproof',this)[0];
      var paymentID = $('#paymentID').val();
      $('#imgproof').removeClass('is-invalid');
      var isValid = true;

      if (fileInput.files.length === 0) {
        $('#imgproof',this).addClass('is-invalid');
        isValid = false;
      }
      if(isValid){
        $('#imgproof',this).removeClass('is-invalid');

        const formData = new FormData();

        // Append the selected file to the FormData object
        formData.append("proof", fileInput.files[0]); // Use "file" as the key to access the file on the server-side

        formData.append("task", "updateProof");
        formData.append("paymentID", paymentID);
        updatePaymentProof(formData);
      }
      displayInvoice(cid);
      
    });

    //Rating
    $('#displayInvoice').on('click',".rating-viewbtn",function(){
      var invoiceID = $(this).attr("data-invoiceID");
      var paymentID = $(this).attr("data-paymentID");
      var orderStatus = $(this).attr("data-orderStatus");
      viewOrderWithRating(invoiceID,paymentID,orderStatus);

    });

    $('.cust-order-content').on('click','#RateButton',function(){
      var ProductID = $(this).attr("data-productID");
      viewRatingForm(ProductID,cid);
      
    });

    $('.rating-content').on('submit',"#RateProduct",function(event){
      event.preventDefault();
      var productID = $(this).attr('data-ProductID');
      var customerID = $(this).attr('data-CustomerID');
      
      // validation
      var ratings = $('input[name="rating"]');
      var feedback =$('textarea[name="feedback"]');
      $('#strStarError').html('');
      $('#strFeedbackError').html('');
      feedback.removeClass('is-invalid');
      var isRatingValid = true;
      var isFeedbackValid = true;

      if(!ratings.is(':checked')){
        $('#strStarError').html('Please check Atleast One star to procced');
        isRatingValid = false;
      }

      if($.trim(feedback.val()) === ''){
        $('#strFeedbackError').html('This field is required');
        feedback.addClass('is-invalid');
        isFeedbackValid = false;
      }

      if(isRatingValid && isFeedbackValid){
        var rate = ratings.filter(':checked').val();
        
        $.ajax({
          url : "invoiceAjax.php",
          data : {task:"AddReview",pid:productID,cid:customerID,rate:rate,feedback:feedback.val()},
          success : function(response){
            if(parseInt(response) === 1){
              Swal.fire({icon:'success',title:'Done !',text:'Your review was submitted !'});
            }else{
              console.log(response);
              Swal.fire({icon:'warning',title:'Something is not right',text:''});
            }
          }
        });

      }

    });

  });

function viewRatingForm(pid,custID){
  $.ajax({
    url:"invoiceAjax.php",
    data:{task:"showRatingModal",productID:pid,customerID:custID},
    success: function(response){
      $('.rating-content').html(response);
      $('#product-rating-Modal').modal('show');
    }
  })
}

function viewOrderWithRating(invoiceID,paymentID,orderStatus){
  $.ajax({
    url: "invoiceAjax.php",
    data:{task:"viewCustomerOrderWithRating",invoice:invoiceID,payment:paymentID,orderStatus:orderStatus},
    success: function(response){
      $('.cust-order-content').html(response);
      $('#view-customer-order').modal('show');
    }
  });
}

function displayInvoice(cid){
  $.ajax({
    url: "invoiceAjax.php",
    data: {task:"displayInvoice",custID:cid,status:"Completed"},
    success: function(response){
      $('#displayInvoice').html(response);
    }
  });
}

function displayCompletedOrders(cid){
  $.ajax({
    url: "invoiceAjax.php",
    data: {task:"displayCompletedInvoice",custID:cid,status:"Completed"},
    success: function(response){
      $('#displayInvoice').html(response);
    }
  });
}

function viewCustOrder(invoiceID,paymentID){
  $.ajax({
    url: "invoiceAjax.php",
    data:{task:"viewCustomerOrder",invoice:invoiceID,payment:paymentID},
    success: function(response){
      $('.cust-order-content').html(response);
      $('#view-customer-order').modal('show');
    }
  });
}

function cancelOrder(invoiceID,paymentID){
  $.ajax({
    url: "invoiceAjax.php",
    data:{task:"cancelOrder",invoice:invoiceID,payment:paymentID},
    success: function(response){
      if(parseInt(response) === 1){
        Swal.fire({icon:'success',title:'Done !',text:'Your Order '+invoiceID+' is cancelled'});
      }else{
        console.log(response);
        Swal.fire({icon:'warning',title:'Something is not right',text:''});
      }
    }
  });
}

function updatePaymentProof(data){
  $.ajax({
    url: "invoiceAjax.php",
    type:"post",
    data: data,
    processData: false,
    contentType: false,
    success: function(response) {
        if(parseInt(response) === 1){
            Swal.fire({icon:'success',title:'Done !',text:'Payment Proof Added'});
        }else{
            console.log(response);
            Swal.fire({icon:'warning',title:'Something is not right',text:''});
        }
    },
    error: function(xhr, status, error) {
        // Handle errors if the AJAX request fails
        console.error("Error:", error);
    }
});
}