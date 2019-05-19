<?php

include_once("Crud.php");
 
$crud = new Crud();

if (empty($_POST)){

    $query = "SELECT * FROM users ORDER BY id DESC";
    $result = $crud->getData($query);
     }
    
    if(!empty($_POST)) {
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $phonenumber = $_POST["phonenumber"];
        
         $query = "SELECT * FROM users WHERE firstname LIKE '%$firstname%' OR lastname LIKE '%$lastname%' OR phonenumber LIKE '%$phonenumber%'";
         $result = $crud->getData($query);
    }
    echo "<form method='POST' action='contacts.php'>";
    echo "<input type='text' name='firstname' placeholder='Enter name of contact'  />";
    echo "<input type='text' name='lastname' placeholder='Enter lastname of contact' />";
    echo "<input type='text' name='phonenumber' placeholder='Enter phone of contact' />";
    echo "<input type='submit' value='Submit' />";
    echo "</form>";
?>
 
<html>  
<head>    
    <title>Homepage</title>
</head>
 
<body>
<a href="index.html">Add New Data</a><br/><br/>
 
    <table width='80%' border=0>
 
    <tr bgcolor='#CCCCCC'>
        <td>First name</td>
        <td>Last name</td>
        <td>Phone number</td>
        <td>Update</td>
    </tr>
    <?php 
    foreach ($result as $key => $res) {    
        echo "<tr>";
        echo "<td>".$res['firstname']."</td>";
        echo "<td>".$res['lastname']."</td>";
        echo "<td>".$res['phonenumber']."</td>";    
        echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";        
    }
    ?>
    </table>
</body>
</html>