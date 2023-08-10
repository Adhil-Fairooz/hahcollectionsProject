<?php 
include "..\classes\DBConnect.php";
include "..\classes\OrderController.php";
$db = new DatabaseConnection;
$orderObj = new OrderController;
?>

<?php 
if(isset($_REQUEST['task']) && $_REQUEST['task'] === "GetHighestDemandingProduct"){
    $chartResult = $orderObj -> getAllHighestDemandingProduct();
    
        $data = array();
        while ($row = $chartResult->fetch_assoc()) {
            $data[] = $row;
        }
        echo json_encode($data);
    
    
}
?>