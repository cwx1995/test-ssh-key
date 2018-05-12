<meta charset="UTF-8">
<?php
//验证账号密码
session_start();
if(empty($_SESSION['id'])){
    echo '请登陆后访问';
    header('refresh:2;url=login.html');
   
    die();
}
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
   $conn = mysqli_connect('localhost','root','root');
    mysqli_select_db($conn,'study');
    mysqli_query($conn,'set names utf8');
    $sql = "insert into student values(null,'$name',$age,'$gender','$email','$tel')";
   
    $result = mysqli_query($conn,$sql);
    if($result){
        echo '添加信息成功';
        // header('refresh:2;url=list.php');
        
    }else{
        echo '添加信息失败';
       
    }
    mysqli_close($conn);
    header('refresh:2;url=student.html');

?>