<?php 
 //接受省id
 $id = $_GET['id'];
 //根据id  查询china表  取出市
 $conn = mysqli_connect('localhost', 'root', 'root');
 //② 选择数据库
 mysqli_select_db($conn, 'study');
 //③ 设置字符集
 mysqli_query($conn, 'set names utf8');
 $sql = "select * from china where pid=$id";
 $result = mysqli_query($conn,$sql);

 //将取出的市拼接为option字符串  返回前端
 $str = '<option>--请选择--</option>';
 while($row = mysqli_fetch_assoc($result)){
    $str .=  "<option value='{$row['id']}'>{$row['name']}</option>";
 }
 echo $str;
 mysqli_close($conn);
?>