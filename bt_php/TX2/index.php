<?php

require "condb.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .container{
        background-color: #F7C5CC;
        height: 1000px;
    }
    a{
        text-decoration: none;
    }
    h1{
        text-align: center;
        text-transform: uppercase;
        color: peru;
    }
    .header{
        width: 960px;
        text-align: center;
        display: flex;
       margin: 20px auto;
       justify-content: space-between;
    }
    .header_add{
        margin-left: 100px;
    }
    .content{
        width: 960px;
        margin: 0 auto;
    }
    .content table{
       width: 100%;
       text-align: center;
    }
    .content table th{
        color:#96351E ;
    }
    .content table td,a{
        color: #CC313D;
    }
    
</style>
<body>
    <div class="container">
    <h1>Danh sach san pham</h1>
        <div class="header">
            <div class="header_search">
                <form action="search.php" method="post">
                    <input type="text" name="txtsearch" size="50" style="padding: 10px;">
                    <input type="submit" name="search" value="Search" size="50" style="padding: 10px;">
                </form>
            </div>
            <div class="header_add">
                <button size="50" style="padding: 10px;"><a href="add.php">Add new</a></button>
            </div>
           
        </div>
        <?php require "content.php" ;?>
    </div>
    
</body>
</html>