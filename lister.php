

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

$ctr=1;
$html="<table class='table'>
    
      <tr>
        <th>Number</th>
        <th>Manufacturer Name</th>
        <th>Model Name</th>
        <th>Count</th>
        <th>Sold Button</th>
      </tr> <tbody>";

foreach ($result as $key => $res) {


  $html.=" 
   
    <tr><td>".$ctr++."</td><td>".$res['manufacturer']."</td><td>".$res['model']."</td><td>".$res['qty']."</td> <td><button type='button' id='button".$res['id']."'  name='button".$res['id']."' onclick='delete(this.value)' value=".$res['id']." class='btn btn-success btn_remove'>Sold</button></td></tr></tr>";

  }

  $html.="</span>
    </tbody>
  </table>";
  

  echo $html;

   

          
 ?>