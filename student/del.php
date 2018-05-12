<meta charset="UTF-8">

<?php 
//验证账号密码
session_start();
if(empty($_SESSION['id'])){
    echo '请登陆后访问';
    header('refresh:2;url=login.html');
    die();
}
$sno = $_GET ['no'];
$conn = mysqli_connect('localhost','root','root');

mysqli_select_db($conn,'study');
mysqli_query($conn,'set names utf8');
$sql = "delete from student where sno=$sno";
$result = mysqli_query($conn,$sql);
if($result){
    echo '成功';
}else{
    echo '失败';
}
mysqli_close($conn);
header('refresh:2;url=list.php');
?>