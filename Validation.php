<?php
class Validation 
{
    public function check_empty($data, $fields)
    {
        $msg = null;
        foreach ($fields as $value) {
            if (empty($data[$value])) {
                $msg .= "$value field empty <br />";
            }
        } 
        return $msg;
    }
    
    public function is_phonenumber_valid($phonenumber)
    {
            if(preg_match("/^[0-9]{3}-[0-9]{4}-[0-9]{4}$/", $phonenumber)) {    
            return true;
        } 
        return false;
    }
}
    


?>