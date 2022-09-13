<?php
    require('conn.php');
    if($_SERVER['REQUEST_METHOD']=='GET'){

        /*
        $getUsers=mysqli_query($conn,"SELECT * FROM `city` ORDER BY `id` ASC");
        $user=mysqli_fetch_all($getUsers,MYSQLI_ASSOC);
        if(mysqli_num_rows($getUsers)>0){
            echo json_encode($user);
            echo"<pre>";
            //print_r($user);
            echo"</pre>";
            http_response_code(200);
        }
        else{
           
            msg("not found",204);
        }
        foreach($user as $use){
          //  echo $use['id'];
        }*/
        $url=$_SERVER['REQUEST_URI'];
        $urlArray=explode('/',$url);
        $id=(int)end($urlArray);
        //echo gettype($id);
        $sql="SELECT * FROM `city` where id=$id";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)==1){
            $user=mysqli_fetch_assoc($result);
            echo json_encode($user);
            http_response_code(200);
        }
        else{
            msg("not found,404");
        }

    }
    else{
        msg("not found",450);
    }
?>