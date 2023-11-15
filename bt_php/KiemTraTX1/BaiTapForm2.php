<?php

if(isset($_POST['submit'])){
    $diem_hk1 = $_POST['hk1'];
    $diem_hk2 =$_POST['hk2'];
    $ketqua = '';
    $xeploai = '';
    $errors = [];

    if(empty(trim($diem_hk1))){
        $errors['hk1']['empty'] = 'Điểm không được để trống!';
    }
    else{
        if(!is_numeric(trim($diem_hk1))){
            $errors['hk1']['required'] = 'Điểm phải là 1 số!';
        }
        else{
            if(intval(trim($diem_hk1))<0){
                $errors['hk1']['min'] = 'Điểm phải là số dương!';
            }
        }
    }

    if(empty(trim($diem_hk2))){
        $errors['hk2']['empty'] = 'Điểm không được để trống!';
    }
    else{
        if(!is_numeric(trim($diem_hk2))){
            $errors['hk2']['required'] = 'Điểm phải là 1 số!';
        }
        else{
            if(intval(trim($diem_hk2))<0){
                $errors['hk2']['min'] = 'Điểm phải là số dương!';
            }
        }
    }

   $diem1 = trim(intval($diem_hk1));
   $diem2 = trim(intval($diem_hk2));
   $diem_tb = ($diem1+$diem2)/2;

   if($diem_tb>=5){
        $ketqua = 'Được lên lớp';
   }
   else{
        $ketqua ='Ở lại lớp';
   }

   if($diem_tb>=8.5){
        $xeploai = 'Giỏi';
   }
   elseif($diem_tb>=7 && $diem_tb<8.5){
        $xeploai = 'Khá';
   }
   elseif($diem_tb>=5 && $diem_tb<7){
        $xeploai = 'Trung bình';
    }
    else{
        $xeploai = 'Kém';
    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    table .tbl_center{
        text-align: center;
    }
    table{
        margin: 0 auto;
    }
</style>
<body>
    <div class="container">
        <div class="kqhoctap">
            <form class="form_hoctap" action="" method="post">
                <table border="1px solid black">
                    <tr class="tbl_center">
                        <td colspan="2">Kết quả học tập</td>
                    </tr>
                    <tr>
                        <td>Điểm HK1:</td>
                        <td>
                            <input type="text" name="hk1" value="<?php echo (!empty($diem_hk1))?$diem_hk1:'';?>"><br>
                            <?php
                             echo(!empty($errors['hk1']['empty']))?'<span style="color:red">'.$errors['hk1']['empty'].'</span>':'';
                             echo(!empty($errors['hk1']['required']))?'<span style="color:red">'.$errors['hk1']['required'].'</span>':'';
                             echo(!empty($errors['hk1']['min']))?'<span style="color:red">'.$errors['hk1']['min'].'</span>':'';
                             ?>
                        </td>
                    </tr>
                    <tr>
                    <td>Điểm HK2:</td>
                        <td>
                            <input type="text" name="hk2" value="<?php echo (!empty($diem_hk2))?$diem_hk2:'';?>"><br>
                            <?php
                             echo(!empty($errors['hk2']['empty']))?'<span style="color:red">'.$errors['hk2']['empty'].'</span>':'';
                             echo(!empty($errors['hk2']['required']))?'<span style="color:red">'.$errors['hk2']['required'].'</span>':'';
                             echo(!empty($errors['hk2']['min']))?'<span style="color:red">'.$errors['hk2']['min'].'</span>':'';
                             ?>
                        </td>

                    </tr>
                    <tr>
                    <td>Điểm TB:</td>
                        <td><input type="text" name="tb" value="<?php echo (!empty($diem_tb))?$diem_tb:'';?>"></td>
                    </tr>
                    <tr>
                        <td>Kết quả:</td>
                        <td><input type="text" name="kq" value="<?php echo (!empty($ketqua))?$ketqua:'';?>"></td>
                    </tr>
                    <tr>
                        <td>Xếp loại:</td>
                        <td><input type="text" name="xl" value="<?php echo (!empty($xeploai))?$xeploai:'';?>"></td>
                    </tr>
                    <tr  class="tbl_center">
                        <td colspan="2"><button type="submit" name="submit">Xem kết quả</button></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</body>
</html>