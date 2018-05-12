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
$conn = mysqli_connect('localhost','root','root');
mysqli_select_db($conn,'study');
mysqli_query($conn,'set names utf8');
$sql = 'select * from student';
$result = mysqli_query($conn,$sql);

?> 
<a href="new.php">添加学生信息</a>
<table align="center" border="1" width="800">
  <caption><h1>学生信息列表</h1></caption>
  <thead>
      <tr>
          <td>学号</td>
          <td>姓名</td>
          <td>年龄</td>
          <td>性别</td>
          <td>邮箱</td>
          <td>电话</td>
          <td>操作</td>
      </tr>
  </thead>
  <tbody>
    <?php while($row = mysqli_fetch_assoc($result)) {?>
      <tr>
          <td><?php echo $row['sno']; ?></td>
          <td><?php echo $row['sname']; ?></td>
          <td><?php echo $row['sage']; ?></td>
          <td><?php echo $row['sgender']; ?></td>
          <td><?php echo $row['semail']; ?></td>
          <td><?php echo $row['stel']; ?></td>
          <td><a href="del.php?no=<?php echo $row['sno'];  ?>"onclick="return del()">删除
          <td><a href="edit.php?no=<?php echo $row['sno'];  ?>">修改
          </td>
      </tr>
      
    <?php } ?>
  </tbody>
</table>
 <script>
    function del(){
        return confirm('是否确定？');
    }
 
 </script>
</body>
</html>
