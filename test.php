<?php

if(isset($_POST['send'])){
    $ids=$_POST['ids'];

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    


<form method="POST">
    <input type="checkbox" value="1" name='ids'><label>Mango</label><br>
    <input type="checkbox" value="2" name='ids'><label>Rattle</label><br>
    <input type="checkbox" value="3" name='ids'><label>Beans</label><br>
    <input type="checkbox" value="4" name='ids'><label>Dog</label><br>
    <button name="send">Send</button>
</form>

</body>
</html>