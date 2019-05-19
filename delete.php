<?php

include_once("Crud.php");
 
$crud = new Crud();
 
$id = $crud->escape_string($_GET['id']);

$result = $crud->delete($id, 'users');
 
if ($result) {
    header("Location:contacts.php");
}
?>