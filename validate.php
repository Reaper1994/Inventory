<?php

class Validate 
{
    public function check_empty($data, $fields)
    {
        $msg = "";
        foreach ($fields as $value) {
            if (empty($data[$value])) {

            	/*print_r($data);*/
                $msg .= "<div class='alert alert-warning'>Field Empty</div>";
            }
        } 
        return $msg;
    }


}



?>
