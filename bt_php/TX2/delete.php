<?php

require "condb.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
}
$sql = "DELETE FROM nhanvien WHERE manv = $id";
$qr = mysqli_query($conn,$sql);
header("location:index.php");

?>