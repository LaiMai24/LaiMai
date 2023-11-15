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
   
        if(isset($_POST['smtt']))
        {
            if(empty($_POST['mh'])||empty($_POST['th'])||empty($_POST['lh'] )||empty($_POST['sl']) ||empty($_POST['tn'])){
                echo "<p style='color:red'>HÃY NHẬP ĐẦY ĐỦ THÔNG TIN CẦN THIẾT</p>";
            }
            else{
                $mh = $_POST['mh'];
                $th = $_POST['th'];
                $lh = $_POST['lh'];
                $sl = $_POST['sl'];
                $tn = $_POST['tn'];
                if(($lh)=="K" || ($lh)=="G"||($lh)=="T" ||($lh)=="S" ||($lh)=="X" )  {
                      if(!is_numeric($sl)){
                        echo "<p style='color:red'>HÃY NHẬP LẠI SỐ LƯỢNG</p>";
                      }
                      else{
                        //   tinh don gia
                          if($lh=="K"){
                              $dg = 10000;
                          }
                          else if($lh=="G"){
                              $dg = 75000;
                          }
                          else if($lh=="T"){
                            $dg = 12000;
                        }
                        else if($lh=="S"){
                            $dg = 30000;
                        }
                         else{
                             $dg = 35000;
                         }
                       
                          $tt = intval($sl) *$dg;
                           //  tinh ti le
                          if($tn <=3){
                              $tl = 1.2/100;
                          }
                          else if($tn <=9){
                            $tl = 1.5/100;
                          }
                          else{
                              $tl = 1.75/100;
                          }
                          $t = $tt * $tl;
                          // tinh tien tra truoc
                          if($tt >=5000000){
                              $ttr = $tt *75/100;
                          }
                          else{
                            $ttr = $tt *50/100;
                          }
                          $cl = $tt-$ttr;
                      }
                }
                else{
                    echo "<p style='color:red'>HÃY NHẬP CHÍNH XÁC LOẠI HÀNG (K/G/T/S/X__ viết hoa)</p>";

                }
            }
        }
        if(isset($_POST['x'])){
            $mh = "";
            $th = "";
            $lh = "";
            $sl = "";
            $tn = "";
        }
    ?>

    <form method="POST">
          <table border="1px solid black">
               <tr style="text-align:center">
                 <td colspan="2">BẢNG THỐNG KÊ NHẬP XUẤT HÀNG NĂM 2020</td>
                </tr>
               <tr style="text-align:center">
                 <td>Mã hàng: </td>
                 <td><input class="input_enter"  type="text" name="mh" value="<?php echo (isset($mh))?$mh:''?>"></td>
               </tr>
               <tr style="text-align:center">
                 <td>Tên hàng: </td>
                 <td><input type="text" name="th" value="<?php echo (isset($th))?$th:''?>"></td>
               </tr>
               <tr style="text-align:center">
                 <td>Loại hàng: </td>
                 <td><input type="text" name="lh" placeholder="K/G/T/S/X" value="<?php echo (isset($lh))?$lh:''?>" ></td>
               </tr>
               <tr style="text-align:center">
                 <td>Số lượng: </td>
                 <td><input type="text" name="sl" value="<?php echo (isset($sl))?$sl:''?>"></td>
               </tr>
               <tr style="text-align:center">
                 <td>Tháng nhập: </td>
                 <td><input type="text" name="tn" value="<?php echo (isset($tn))?$tn:''?>"></td>
               </tr>
               <tr style="text-align:center">
                 <td>Thành tiền: </td>
                 <td><input type="text" name="tt" value="<?php echo (isset($tt))?$tt:''?>"></td>
               </tr>
               <tr style="text-align:center">
                 <td>Thuế: </td>
                 <td><input type="text" name="t" value="<?php echo (isset($t))?$t:''?>"></td>
               </tr>
               <tr style="text-align:center">
                 <td>Trả trước: </td>
                 <td><input type="text" name="ttr" value="<?php echo (isset($ttr))?$ttr:''?>"></td>
               </tr>
               <tr style="text-align:center">
                 <td>Còn lại: </td>
                 <td><input type="text" name="cl" value="<?php echo (isset($cl))?$cl:''?>"></td>
               </tr>
               <tr style="text-align:center">
                 <td colspan="2">
                   
                   <input type="submit" name="x" value="xóa">
                   <input type="submit" name="smtt" value="Tính tiền">
                 </td>
               </tr>
          </table>
    </form>
</body>
</html>