<?php
require('./config/dbcon.php');
if (isset($_GET['id'])) {
$deletedapp=$_GET['id'];
$query="delete from appointement where appId=".$deletedapp;
mysqli_query($con,$query);
}else
{
    echo "id is not seted";
}
?>