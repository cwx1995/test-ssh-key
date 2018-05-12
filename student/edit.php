<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php 
    //验证账号密码
    session_start();
    if(empty($_SESSION['id'])){
        echo '请登陆后访问';
        header('refresh:2;url=login.html');
        die();
    }
    $sno = $_GET['no'];
    $conn = mysqli_connect('localhost','root','root');
    mysqli_select_db($conn,'study');
    mysqli_query($conn,'set names utf8');
    $sql = "select * from student where sno=$sno";
    $result = mysqli_query($conn,$sql);
    $student_info = mysqli_fetch_assoc($result);

    
    ?>
    <form action="modify.php" method="post">
    
    
    学号: <input type="text" name='no' readonly value="<?php echo $student_info['sno']; ?>"><br>
        姓名: <input type="text" name='name' value="<?php echo $student_info['sname'] ;?>"><br>
        年龄: <input type="text" name='age' value="<?php echo $student_info['sage'] ;?>"><br>
        性别: <input type="radio" name='gender' value="<?php echo $student_info['sgender'] ;?>">男
        <input type="radio" name='gender' value="<?php echo $student_info['sgender'] ;?>">女<br>
        邮箱: <input type="text" name='email' value="<?php echo $student_info['semail'] ;?>"><br>
        电话: <input type="text" name='tel' value="<?php echo $student_info['stel'] ;?>"><br>
        <input type="submit" value="修改">

    </form>
</body>
</html>