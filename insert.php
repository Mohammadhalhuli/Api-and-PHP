<?php
    require('conn.php');
    if($_SERVER['REQUEST_METHOD']=='POST'){
       try {
         //$id=$_POST['id'];
       // $name=$_POST['c_name'];
        //$c=$_POST['country'];
        $alldata=file_get_contents("php://input");
        $data=json_decode($alldata);
        $id=$data->id;
        $name=$data->c_name;
        $c=$data->country;
        $sql="INSERT INTO `city`(`id`, `c_name`, `country`) VALUES ('$id','$name','$c')";
        $result=mysqli_query($conn,$sql);
        if($result){
            msg("is data",205);
        }else{
            msg("sorry is not found",405);
        }
        /***1-طرق الاضافة من خلال البرنامج من خلال برنامج بوستمان  الطريقة رقم واحد التجربية من خلال اذا كان على 
         * nono
         * تضع الرابط  و
         * POST
         * وترسل 
         * 2-ثاني طريقة من خلال 
         * form data
         * وكتابة التداتا ووضع في 
         * ال var
         * $_post[''] in php
         * اما في البستمان يكون 
         * key & value 
         * الكي يكون هو الذي داخل ال
         * post
         * 3- الطريقة الثانية من خلال 
         * Body --->row 
         * و الكتابة على الشكل الاتي 
         * /***
         *  {
                "id":1,
                "c_name":"nnn",
                "country":"n
            }
            next in php 
            $alldata=file_get_contents("php//input");
            $data=json_decode($alldata);
            $id=$data->id;
            $name=$data->c_name;
            $c=$data->country;
         *  *
         */
        //echo "ok";
       } catch (Exception $th) {
        //throw $th;
        echo  $th;
       }
    }else{
        msg("metod is not allowed",405);
    }
?>