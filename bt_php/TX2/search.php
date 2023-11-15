<?php

require "condb.php";

if(isset($_POST['search'])){
    $name = $_POST['txtsearch'];

    $err = [];

    if($name ==""){
       echo "Nhap thong tin vao thanh tim kiem!<br>";
       echo "<a href='index.php'>Home</a>";
    }
    else{

        $sql = "SELECT * FROM nhanvien WHERE hoten LIKE '%$name%'";
        $qr = mysqli_query($conn,$sql);
        $count = mysqli_num_rows($qr);

        if($count <=0){
          echo "Khong tim thay ket qua nao voi tu khoa :".$name."<br>";
          echo "<a href='index.php'>Home</a>";
        }
        else{?>
            
        <div class="content">
            <h1>Nhan Vien Can Tim Kiem</h1>
        <table border="1px solid black" >
        <tr>
            <th>Ma NV</th>
            <th>Ho va Ten</th>
            <th>Hinh Anh</th>
            <th>Xep Loai</th>
            <th>Luong Ngay</th>
            <th>Ngay Cong</th>
            <th>Tong Luong</th>
            <th colspan="2">Chuc nang</th>
           
        </tr>
        <?php
           
            while($rows = mysqli_fetch_assoc($qr)){

                if(strtolower($rows['xeploai'] )== 'a'){
                    $thuong = 500000;
                } 
                elseif (strtolower($rows['xeploai'] )== 'b') {
                    $thuong = 300000;
                }   
                elseif (strtolower($rows['xeploai'] )== 'c') {
                    $thuong = 100000;
                } 
                else{
                    $thuong = 0;
                }             

                $tongluong = $rows['luongngay'] *$rows['ngaycong'] +$thuong;
                ?>
            <tr>
                <td><?php echo $rows['manv']?></td>
                <td><?php echo $rows['hoten']?></td>
                <td>
                    <img width="100px" src="uploads/<?php echo $rows['hinhanh']?>" alt="">
                </td>
                <td><?php echo $rows['xeploai']?></td>
                <td><?php echo $rows['luongngay']?></td>
                <td><?php echo $rows['ngaycong']?></td>
                <td><?php echo $tongluong?></td>
                <td><a href="update.php?id=<?php echo $rows['manv']?>">Update</a></td>
                <td><a href="delete.php?id=<?php echo $rows['manv']?>">Delete</a></td>
            </tr>
            <?php }
        ?>
    </table>
</div>
<a href="index.php">Home</a>

        <?php
        }

    }
}

?>