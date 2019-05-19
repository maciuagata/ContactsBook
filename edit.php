<?php

include_once("Crud.php");
 
$crud = new Crud();

$id = $crud->escape_string($_GET['id']);
 
$result = $crud->getData("SELECT * FROM users WHERE id=$id");
 
foreach ($result as $res) {
    $firstname = $res['firstname'];
    $lastname = $res['lastname'];
    $phonenumber = $res['phonenumber'];
}
?>
<html>
<head>    
    <title>Edit Data</title>
</head>
 
<body>
    <a href="contacts.php">Home</a>
    <br/><br/>
    
    <form name="form1" method="post" action="editaction.php">
        <table border="0">
            <tr> 
                <td>Firstname</td>
                <td><input type="text" name="firstname" value="<?php echo $firstname;?>"></td>
            </tr>
            <tr> 
                <td>Lastname</td>
                <td><input type="text" name="lastname" value="<?php echo $lastname;?>"></td>
            </tr>
            <tr> 
                <td>Phone number</td>
                <td><input type="text" name="phonenumber" value="<?php echo $phonenumber;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>