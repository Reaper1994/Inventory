<?php

class Validate 
{



 public $iteration=0;

    public function check_empty($data, $fields)
    {
        $msg = "";
        $this->iteration++;
        foreach ($fields as $value) {
            if (empty($data[$value])) {

            	/*print_r($data);*/
                $msg .= "<div class='alert alert-warning'>Field  $this->iteration Empty</div>";
            }
            $this->iteration++;   
        } 
        return $msg;
    }


}



?>
