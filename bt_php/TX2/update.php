<?php

require "condb.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
}

$sql = "SELECT * FROM nhanvien where manv = $id";
$qr = mysqli_query($conn,$sql);
$rows = mysqli_fetch_assoc($qr);

if(isset($_POST['update'])){
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

        if(!empty($hinhanh_path)){
            move_uploaded_file($hinhanh_tmp,"uploads/".$hinhanh_path);
        }
        else{
            $hinhanh_path = $rows['hinhanh'];
        }
        
        $sql_up = "UPDATE nhanvien SET hoten = '$hoten',hinhanh = '$hinhanh_path',xeploai = '$xeploai'
        ,luongngay ='$luongngay',ngaycong ='$ngaycong' WHERE manv = $id";
        $qr_up = mysqli_query($conn,$sql_up);
        header("location:index.php");

    }
}

?>

<div class="content">
    <form action="" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <th colspan="">Update Employee</th>
        </tr>
        <tr>
            <td>Ho va Ten</td>
            <td><input type="text" name="txtname" value="<?php echo $rows['hoten']?>"></td>
        </tr>
        <tr>
            <td>Hinh Anh</td>
            <td><input type="file" name="hinhanh" value="<?php echo $rows['hinhanh']?>"></td>
        </tr>
        <tr>
            <td>Xep Loai</td>
            <td><input type="text" name="txtxl" value="<?php echo $rows['xeploai']?>"></td>
        </tr>
        <tr>
            <td>Luong Ngay</td>
            <td><input type="text" name="txtluong" value="<?php echo $rows['luongngay']?>"></td>
        </tr>
        <tr>
            <td>Ngay Cong</td>
            <td><input type="text" name="txtngaycong" value="<?php echo $rows['ngaycong']?>"></td>
        </tr>
        <tr>
            
            <td colspan="2"><input type="submit" name="update" value="Update"></td>
        </tr>
    </table>
    </form>
</div>