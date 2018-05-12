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
        $conn=mysqli_connect('localhost','root','root');
        mysqli_select_db($conn,'study');
        mysqli_query($conn,'set names utf8');
        $sql = "select * from china where pid=0";
        $result = mysqli_query($conn,$sql);
        ?>
    省: <select name="" id="" onchange="getCity(this.value,'city')">
        <option value="">--请选择--</option>
        <?php 
        while($row = mysqli_fetch_assoc($result)){
         ?> 
         <option value="<?php echo $row['id']; ?>">
          <?php echo $row['name']; ?>
        </option>  
        <?php } ?>
        
    </select>
    市: <select name="" id="city" onchange="getCity(this.value,'area')" >
    <option value="">--请选择--</option>
    <?php 
        while($row = mysqli_fetch_assoc($result)){
         ?> 
         <option value="<?php echo $row['id']; ?>">
          <?php echo $row['name']; ?>
        </option>  
        <?php } ?>
    </select>
    区: <select name="" id="area">
    <option value="">--请选择--</option>
    </select>
    <script>
    function getCity(id,name){
        var xhr = new XMLHttpRequest ();
        xhr.onreadystatechange=function(){
            if(xhr.readyState == 4){
                console.log(xhr.responseText);
                document.getElementById(name).innerHTML=xhr.responseText;
              
            }else{

            }
        }
        xhr.open('get','getCity.php?id='+ id);
        xhr.send(null);
    }
    // function getarea(id){
    //     var xhr = new XMLHttpRequest ();
    //     xhr.onreadystatechange=function(){
    //         if(xhr.readyState == 4){
    //             console.log(xhr.responseText);
                
    //             document.getElementById('area').innerHTML=xhr.responseText;
    //         }else{

    //         }
    //     }
    //     xhr.open('get','getCity.php?id='+ id);
    //     xhr.send(null);
    // }
    </script>
</body>
</html>