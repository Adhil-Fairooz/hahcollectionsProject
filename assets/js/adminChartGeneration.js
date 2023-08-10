$(document).ready(function(){
    displayAllSoldProductQuantity();
});

function displayAllSoldProductQuantity(){
    $.ajax({
        url: 'adminChartAjax.php',
        data :{task:'GetHighestDemandingProduct'},
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            var product = [];
            var soldQty = [];

            // Extract data from JSON response
            for (var i = 0; i < response.length; i++) {
                product.push(response[i].Product_ID+'-'+response[i].Pro_Name);
                soldQty.push(response[i].orderOTY);
            }

            var productData = {
                labels: product,
                datasets: [{
                    label: 'Sold Quantity',
                    data: soldQty,
                    backgroundColor: '#a29bfe',
                    borderColor: '#2c3e50',
                    borderWidth: 1
                }]
            };

            var ctx = document.getElementById('myProductSalesChart').getContext('2d');
            var productChart = new Chart(ctx, {
                type: 'bar',
                data: productData,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        },
        error: function(xhr, status, error) {
            console.log("Error: " + error);
        }
    });
}