<?php


require_once(dirname(dirname(__FILE__)).'\Carinventory\config.php');







 
class Crud extends DbConfig
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function getData($query)
    {        
        $result = $this->connection->query($query);
        
        if ($result == false) {
            return false;
        } 
        
        $rows = array();
        
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        
        return $rows;
    }




        
    public function execute($query) 
    {
        $result = $this->connection->query($query);



        
        if ($result == false) {
            echo 'Error: cannot execute the command';
            return false;
        } else {
            return true;
        } 
    }       
    
    
    public function delete($id, $table) 
    { 
        $query = "DELETE FROM $table WHERE id = $id";
        
        $result = $this->connection->query($query);
    
        if ($result == false) {
            echo 'Error: cannot delete id ' . $id . ' from table ' . $table;
            return false;
        } else {
            return true;
        }
    }
 
    public function escape_string($value)
    {
        return $this->connection->real_escape_string($value);
    }

      public function Check_existing_data($set_table_name,$column,$values){

    $row = array();

$condition="";

if(is_array($values)){
    foreach ($values as $key => $val) {
        # code...

        $condition.=" ".$key."='".$val."' and  ";
    }
}
else
{
    return 'invalid parameters';
}


   $condition= substr(trim($condition), 0, -3);
   $result = $this->connection->query("SELECT ".$column." FROM ".$set_table_name." where del=0 and ". $condition);
       //$qur="SELECT ".$column." FROM ".$set_table_name." where ". $condition; 
       //return $qur;
        if ($result == false) {
            return die("query failed");

        } 
        
        $rows = array();
        
        while ($row = $result->fetch_assoc()) {

            $rows[] = $row;
        }

 return $rows;
    
}

  

}

$crud=new Crud;












?>
