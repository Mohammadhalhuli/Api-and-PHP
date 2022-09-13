<?php
require('conn.php');
    if($_SERVER['REQUEST_METHOD']=='PUT'){
       try {
        $url=$_SERVER['REQUEST_URI'];
        $urlArray=explode('/',$url);
        $id=(int)end($urlArray);
        //echo $id;
        $sql="SELECT * FROM `city` where id=$id";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0){
            $alldata=file_get_contents("php://input");
            $data=json_decode($alldata);
            $name=$data->c_name;
            $query="UPDATE `city` SET `c_name`='$name' WHERE id=$id;";
            $result=mysqli_query($conn,$query);
            if($result)`{
                msg(json_encode("message") ,204);
            }else
            msg("Data is not  found ",405);
        }
        else{
            msg("not found,404");
        }
       } catch (Exception $th) {
        
        echo  $th;
       }
    }else{
        msg("metod is not allowed",405);
    }
?>