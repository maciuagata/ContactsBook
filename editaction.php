<?php

include_once("Crud.php");
include_once("Validation.php");
 
$crud = new Crud();
$validation = new Validation();
 
if(isset($_POST['update']))
{    
    $id = $crud->escape_string($_POST['id']);
    
    $firstname = $crud->escape_string($_POST['firstname']);
    $lastname = $crud->escape_string($_POST['lastname']);
    $phonenumber = $crud->escape_string($_POST['phonenumber']);
    
    $msg = $validation->check_empty($_POST, array('firstname', 'lastname', 'phonenumber'));
    $check_phonenumber = $validation->is_phonenumber_valid($_POST['phonenumber']);

    if($msg) {
        echo $msg;        

        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } elseif (!$check_phonenumber) {
        echo 'Please provide proper phonenumber.';
    } else {    

        $result = $crud->execute("UPDATE users SET firstname='$firstname',lastname='$lastname',phonenumber='$phonenumber' WHERE id=$id");
        
        header("Location: contacts.php");
    }
}
?>