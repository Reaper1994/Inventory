<?php
/*echo "<pre>"; 
print_r($_REQUEST);*/


require_once(dirname(dirname(__FILE__)).'\Carinventory\configuration.php');
require_once(dirname(dirname(__FILE__)).'\Carinventory\validate.php');



$validation=new Validate();




if(isset($_REQUEST['type']))
{

	if($_REQUEST['type']=="manufacturerform")
	{
		
		$msg =$validation->check_empty($_POST, array('manufacturer'));
       $manufacturer=$crud->escape_string($_REQUEST['manufacturer']);
           $query = "SELECT manufacturer FROM car_master where del='0' and manufacturer ='$manufacturer'";

             $data_check = $crud->getData($query);


             
	  


		if(empty($msg)&&count($data_check)==0 )
		{

        
			$query = "insert into car_master (manufacturer)  values('$manufacturer') ";

		$result = $crud->execute($query);
if ($result==1)
{

	echo '<div class="alert alert-success"> Record succesfully added  ! </div>';
}


		
          
     
          $msg='';
		}
		elseif (count($data_check)>0) {
			# code...
			echo '<div class="alert alert-warning">Manufacturer already exists </div>';
		}

       
	}
	else if ($_REQUEST['type']=="modelfrom")
	{
		$msg =$validation->check_empty($_POST, array('mf_id','model'));
         
      $mf_id=$crud->escape_string($_REQUEST['mf_id']);
       $model=$crud->escape_string($_REQUEST['model']);

		if(empty($msg))
		{
			  $query = "SELECT mf_id,model,qty FROM car_stock where del='0' and mf_id='$mf_id' and model='$model'";
             $data = $crud->getData($query);


             foreach ($data as $key=>$res) {
               $qty = $res['qty'];

                }


                  
                  if(count($data)==0)
                  {
                $query = "insert into car_stock (mf_id,model,qty)  values('$mf_id','$model',1) ";
                    $result = $crud->execute($query);
                    echo '<div class="alert alert-success">Record Sucesfully added </div>';
                  }
                  else {
                  	# code...
                  	$qty=$qty+1;
                  	 $query = "update car_stock set  qty='$qty'  where mf_id='$mf_id' and model='$model'  ";
                    $result = $crud->execute($query);

                    echo '<div class="alert alert-success">Record Upated </div>';
                  }
		 


		}
		else
		{
			echo $msg;
		}
	}

}



?>