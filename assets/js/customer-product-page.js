$(document).ready(function () {
  $("#sidebarCollapse").on("click", function () {
    $("#sidebar").toggleClass("active");
  });
});

$(document).ready(function (){
  $("#sidebar").find("a").on("click",function (){
    var Main = $(this).attr('data-mainCat');  
    var Sub = $(this).attr('data-subCat');
    $.ajax({
      url: 'loadProducts.php',
      data:{mainId: Main,subId:Sub},
      success: function(response){
        $("#items").html(response);
        $("#sidebar").toggleClass("active");
      }
    });
  });
});

$(document).ready(function (){
  $("#sidebar").find("button").on("click",function (){
    var Main = $(this).attr('data-mainCate');  
    $.ajax({
      url: 'loadProducts.php',
      data:{mainCatOnlyId: Main},
      success: function(response){
        $("#items").html(response);
        $("#sidebar").toggleClass("active");
      }
    });
  });
});

function loadAllProducts(){
  $.ajax({
      url: 'loadProducts.php',
      data: { table: "all" },
      success: function(response) {
        $("#items").html(response);
      }
  });
}
$(document).ready(function(){
  $('#customerSearchBox').submit(function(event){
      event.preventDefault();
      var searchData = $('input[name="search"]').val();

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
          url:"loadProducts.php",
          data:{task:"searchProductCustomer",searchData:searchData},
          success: function(response){
              Swal.close();
              $('#items').html(response);
          },
      });
  });
});