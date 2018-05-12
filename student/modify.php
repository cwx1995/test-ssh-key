<meta charset="utf-8">
    <?php 
    //验证账号密码
    session_start();
    if(empty($_SESSION['id'])){
        echo '请登陆后访问';
        header('refresh:2;url=login.html');
        die();
    }
    //接受表单
    $sno = $_POST['no'];
    $sname = $_POST['name'];
    $sage = $_POST['age'];
    $sgender = $_POST['gender'];
    $semail = $_POST['email'];
    $stel= $_POST['tel'];
    //连接数据库
    $conn=mysqli_connect('localhost','root','root');
    mysqli_select_db($conn,'study');
    mysqli_query($conn,'set names utf8');
    $sql = "update student set sname='$sname',sage='$sage',sgender='$sgender',semail='$semail',stel='$stel' where sno=$sno";

    //update stdent sname='',sgae=''...
    $result=mysqli_query($conn,$sql);
    if($result){
        echo '成功';
        header('refresh:2; url=list.php');
    }else{
        echo '失败';
        header('refresh:2; url=edit.php?no='.$sno);
    }
    
    ?>