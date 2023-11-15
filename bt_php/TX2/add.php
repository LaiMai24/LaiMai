<?php

require "condb.php";

if(isset($_POST['addnew'])){
    $hoten = $_POST['txtname'];
    $hinhanh_path = $_FILES['hinhanh']['name'];
    $xeploai = $_POST['txtxl'];
    $luongngay = $_POST['txtluong'];
    $ngaycong = $_POST['txtngaycong'];
    $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
    

    if($hoten ==""|| $xeploai==""||$luongngay==""||$ngaycong==""){
        echo "Nhap day du thong tin!";
    }
    else{
        
        $sql = "INSERT INTO nhanvien(hoten,hinhanh,xeploai,luongngay,ngaycong) VALUES('$hoten','$hinhanh_path'
        ,'$xeploai','$luongngay','$ngaycong')";
        move_uploaded_file($hinhanh_tmp,"uploads/".$hinhanh_path);
        $qr = mysqli_query($conn,$sql);
        header("location:index.php");

    }
}

?>
<div class="content">
    <form action="" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <th colspan="">Add Employee</th>
        </tr>
        <tr>
            <td>Ho va Ten</td>
            <td><input type="text" name="txtname" value=""></td>
        </tr>
        <tr>
            <td>Hinh Anh</td>
            <td><input type="file" name="hinhanh" value=""></td>
        </tr>
        <tr>
            <td>Xep Loai</td>
            <td><input type="text" name="txtxl" value=""></td>
        </tr>
        <tr>
            <td>Luong Ngay</td>
            <td><input type="text" name="txtluong" value=""></td>
        </tr>
        <tr>
            <td>Ngay Cong</td>
            <td><input type="text" name="txtngaycong" value=""></td>
        </tr>
        <tr>
            
            <td colspan="2"><input type="submit" name="addnew" value="Add New"></td>
        </tr>
    </table>
    </form>
</div>