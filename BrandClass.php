<?php
/**
 * 
 */


class Manufacturer {

    private $manufacturer;
    



  

    public function set_Manufacturer($manufacturer)
  {
    $this ->manufacturer = $manufacturer;
  }
   
  public function get_Manufacturer()
  {
    return $this ->manufacturer;
  }

}

/**
 * 
 */
class Model extends Manufacturer
{

    private $model;
    private $qty;
    public $data;

    public $ctr;


    public $html;
    
     public function build_manufacturer_dropdown($data)  //$data is the array containing all manufacturers
  {

     $html="<option ></option>";

    
foreach ($data as $key => $res) {
  
     $html.="<option value=".$res['id'].">".$res['manufacturer']."</option>";
  }
    return  $html;
  }






  public function getlist($data)
  {
    $ctr++;
$html="<table class='table'>
    
      <tr>
        <th>Number</th>
        <th>Manufacturer Name</th>
        <th>Model Name</th>
        <th>Count</th>
        <th>Sold Button</th>
      </tr> <tbody>";

foreach ($data as $key => $res) {


  $html.=" 
   
    <tr><td>".$ctr++."</td><td>".$res['manufacturer']."</td><td>".$res['model']."</td><td>".$res['qty']."</td> <td><button type='button' id='button".$res['id']."'  name='button".$res['id']."' onclick='delete(this.value)' value=".$res['id']." class='btn btn-success btn_remove'>Sold</button></td></tr></tr>";

  }

  $html.="</span>
    </tbody>
  </table>";

  return $html;
  

  }
}




/*public function load_list()
{

}*/


$car= new Model();


/*$model  = new Model('Herbivore', 'Grass');

echo $model->get_manufacturer();*/


?>