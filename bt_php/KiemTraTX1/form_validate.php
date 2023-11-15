<!-- 
    1 validate form?
    + xác thực dữ liệu
    + validate client:html, css
    + validate server: PHP

    2 quy trình:
    + bước 1: xác định rule (field ==> điều kiện)
    + bước 2: xác định message (tương ứng với rule)
    + bước 3 chạy validate 
 -->
 <?php

/**
 * Rules:
 * - fullname : phải nhập, lớn hơn 5 kí tự
 * -email: phải nhập , định dạng email
 * - age : phải nhập ,là số, là số dương
 */

 if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];

    $errors = [];
    // check name
    if(empty(trim($name))){
        $errors['name']['required'] = 'Họ tên không được để trống';
    }
    else{
        if(strlen(trim($name))<5){
            $errors['name']['min']= 'Họ tên phải lớn hơn 5 kí tự';
        }
    }
    //check email
    if(empty(trim($email))){
        $errors['email']['required'] = 'Email không được để trống';
    }
    else{
        if(!filter_var(trim($email), FILTER_VALIDATE_EMAIL)){
            $errors['email']['invalid'] = 'Email không hợp lệ';
        }
    }
    //check age

    if(empty(trim($age))){
        $errors['age']['required'] = 'Age không được để trống';
    }
    else{
        if(!filter_var(trim($age), FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]] )){
            $errors['age']['invalid'] = 'Age không hợp lệ';
        }
    }

    if(empty($errors)){
        echo 'Validate thành công!';
    }
    else {
        echo 'Validate không thành công!';
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
 <body>
    <div class="form_control">
        <form action="" method="post" class="form-check">

            <p>
                Họ Và Tên: <br>
                <input type="text" name="name" placeholder="your name" value=""><br>
                <?php
                echo (!empty($errors['name']['required']))?'<span style="color:red">'
                .$errors['name']['required'].'</span>':'';
                echo (!empty($errors['name']['min']))?'<span style="color:red">'
                .$errors['name']['min'].'</span>':'';
                ?>
            </p>
            <p>
                Email: <br>
                <input type="text" name="email" placeholder="email" value=""><br>
                <?php
                echo (!empty($errors['email']['required']))?'<span style="color:red">'
                .$errors['email']['required'].'</span>':'';
                echo (!empty($errors['email']['invalid']))?'<span style="color:red">'
                .$errors['email']['invalid'].'</span>':'';
                ?>
            </p>
            <p>
                Tuổi : <br>
                <input type="text" name="age" placeholder="age"  value=""><br>
                <?php
                echo (!empty($errors['age']['required']))?'<span style="color:red">'
                .$errors['age']['required'].'</span>':'';
                echo (!empty($errors['age']['invalid']))?'<span style="color:red">'
                .$errors['age']['invalid'].'</span>':'';
                ?>
            </p>
            <p>
                <button name="submit">submit</button>
            </p>

        </form>
    </div>
 </body>
 </html>