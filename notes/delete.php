<?php
include("connection.php");
$delete_id=$_GET['delete_id'];
$sql ="delete from notes where sl_no=$delete_id";
$res=mysqli_query($con,$sql);
if($res){
    header("location: index.php");
}
?>