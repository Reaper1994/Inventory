

<?php 

require_once(dirname(dirname(__FILE__)).'\Carinventory\configuration.php');
require_once(dirname(dirname(__FILE__)).'\Carinventory\BrandClass.php');
ini_set('display_errors', 1);
error_reporting(E_ERROR | E_WARNING | E_PARSE);






if(isset($_REQUEST['id'])){



$id=$crud->escape_string($_REQUEST['id']);

	$query = "SELECT car_stock.id, manufacturer,model,qty FROM car_master inner join car_stock on car_stock.mf_id=car_master.id  where car_master.del=0 and qty>0  and car_stock.del=0 and  car_stock.id=".$id;


$result = $crud->getData($query);

foreach ($result as $key => $value) {
	# code...

	$qty=$value['qty'];
}
$qty=$qty-1;
$qty=$crud->escape_string($qty);

$update="update  car_stock set qty='$qty' where id=".$id;

 $result = $crud->execute($update);



}





 $query = "SELECT car_stock.id, manufacturer,model,qty FROM car_master inner join car_stock on car_stock.mf_id=car_master.id  where car_master.del=0  and qty>0 and car_stock.del=0 ";


$result = $crud->getData($query);



echo $car->getlist($result);

 
   

          
 ?>
