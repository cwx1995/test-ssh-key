<meta charset="UTF-8">
<?php 
//1. 接收用户名和密码
$email = $_POST['email'];
$pwd   = md5($_POST['pwd']);

//2. 验证用户名
// 核心SQL:  select * from ali_admin where admin_email='$email'

//① 链接MySQL服务器
$conn = mysqli_connect('localhost', 'root', 'root');
//② 选择数据库
mysqli_select_db($conn, 'study');
//③ 设置字符集
mysqli_query($conn, 'set names utf8');
//④ 执行SQL语句
$sql = "select * from ali_admin where admin_email='$email'";
$result = mysqli_query($conn, $sql);
//⑤ 从结果对象中取出数组
$admin_info = mysqli_fetch_assoc($result);

// 如果数组为空，则说明用户名不正确
if(empty($admin_info)){
    echo "用户名不正确";
    header('refresh:2;url=login.html');
    die();
} else {
    //3. 验证密码
    if($pwd == $admin_info['admin_pwd']){
        //密码也正确，正常登录
        echo "登录成功";
        //登录成功之后，将用户的主要信息写入session
        session_start();
        $_SESSION['id']       = $admin_info['admin_id'];
        $_SESSION['email']    = $admin_info['admin_email'];
        $_SESSION['nickname'] = $admin_info['admin_nickname'];

        //header('refresh:2;url=list.php');
        die;
    } else {
        echo "密码错误";
        //header('refresh:2;url=login.html');
        die();
    }
}

?>