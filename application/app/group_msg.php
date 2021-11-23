<?php
session_start();
include($_SERVER['DOCUMENT_ROOT']."/livechat/application/connection/index.php"); 
 $sql6 = "SELECT * FROM `msg`  WHERE  to_id = '{$_POST['gp_msg']}' ORDER BY mid";
 $result4 = mysqli_query($conn,$sql6) or die("SQL Query error....!");
 $output = "";
 if(mysqli_num_rows($result4)>0){
     while($row4=mysqli_fetch_assoc($result4)){
         if($row4['uid'] === $_SESSION['username']){
             $output .= "  
                 <div class='bg-transparent offset-7 text-start col-5 badge text-secondary text-wrap msg-send-friend shadow-sm'>
                     <span class='p-2 rounded'>
                         {$row4['msg']}
                     </span>
                     <div class='text-end'> 
                         <small>{$row4['c_time']}</small>
                     </div>
                 </div><br>
             ";
         }else{
             $output .= "  
                 <div class='bg-transparent text-start col-5 border badge text-primary text-wrap msg-send-user shadow-sm'>
                 <div class='text-end'> 
                         <small>~ {$row4['uid']}</small>
                     </div>
                     <span class='p-2 rounded'>
                         {$row4['msg']}
                     </span>

                     <div class='text-end'> 
                         <small>{$row4['c_time']}</small>
                     </div>
                 </div><br>
             ";
         }
     }
 }
 echo "$output";
?>