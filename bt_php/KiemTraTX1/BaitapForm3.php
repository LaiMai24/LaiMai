<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
       
    </style>
</head>
<body>
    <?php
         $mang3 = array();
         $mangL = array();
         $mangC = array();
        $sumL=0;
        $sumC=0;

         if(isset($_POST['th'])){
            if(!empty($_POST['nm'])){
                $nm = $_POST['nm'];
                echo "Mảng vừa nhâp: ".$nm;
                $mang = explode(",",$nm);
               for($i=0;$i<count($mang);$i++){
                   if($mang[$i]%3===0){
                       $mang3[] = $mang[$i];
                   }
               }
                // mang le
                sort($mang);
                for($i=0;$i<count($mang);$i++){
                    if($mang[$i]%2!==0){
                        $mangL[] = $mang[$i];
                        $sumL+= $mang[$i];
                    }
                }
                   $countL = count($mangL);
                   $avgL = $sumL/$countL; 
                // mang chan
                rsort($mang);
                for($i=0;$i<count($mang);$i++){
                    if($mang[$i]%2===0){
                        $mangC[] = $mang[$i];
                        $sumC+= $mang[$i];
                    }
                }
                $countC = count($mangC);
                   $avgC = $sumC/ $countC; 
            }
         else{
            echo " <p style='color:red'>BẠN CHƯA NHẬP MẢNG NÀO</p>";
         }  
         }

    ?>
    <form method="POST">
        <table border="1px solid black">

            <tr style=" text-align: center">
                <td colspan="2">NHẬP MẢNG VÀ HIỂN THỊ</td>
            </tr>
            <tr>
                <td>Nhập Mảng</td>
                <td><input type="text" name="nm"  value="<?php echo (isset($nm)) ? $nm :''  ?>"></td>
            </tr>
            <tr style=" text-align: center">
                <td colspan="2"><input type="submit" name="th" value="thực hiện"></td>
            </tr>
            <tr>
                <td>Phần tử mảng chia hết cho 3</td>
                <td><input type="text" value="<?php echo (isset($mang3)) ? implode(",",$mang3) :''  ?>"></td>
            </tr>
            <tr>
                <td>Phần tử mảng lẻ tăng  dần</td>
                <td><input type="text" value="<?php echo (isset($mangL)) ? implode(",",$mangL) :''  ?>"></td>
            </tr>
            <tr>
                <td>Phần tử mảng chẵn xếp giảm dần</td>
                <td><input type="text" value="<?php echo (isset($mangC)) ? implode(",",$mangC) :''  ?>"></td>
            </tr>
            <tr>
                <td>Tính trung bình cộng phần tử lẻ</td>
                <td><input type="text" value="<?php echo (isset($avgL)) ? $avgL :''  ?>"></td>
            </tr>
<tr>
                <td>Tính trung bình cộng phần tử chẵn</td>
                <td><input type="text"  value="<?php echo (isset($avgL)) ? $avgL :''  ?>"></td>
            </tr>
        </table>
        
    </form>
</body>
</html>