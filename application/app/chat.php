<?php
session_start();
$a =2;
include($_SERVER['DOCUMENT_ROOT']."/livechat/application/connection/index.php"); 
$hostname = getenv('HTTP_HOST');
 $sql6 = "SELECT * FROM msg LEFT JOIN users ON users.email = msg.to_id 
 WHERE (to_id = '{$_POST['user_msg']}' AND uid = '{$_SESSION['username']}')
 OR (to_id = '{$_SESSION['username']}' AND uid = '{$_POST['user_msg']}') ORDER BY mid";
 $result4 = mysqli_query($conn,$sql6) or die("SQL Query error....!");

 $up = "UPDATE `msg` SET `m_status`='seen' WHERE `uid` ='{$_POST['user_msg']}' AND `m_status`='notseen'";
    mysqli_query($conn,$up);
    
 if(mysqli_num_rows($result4)>0){
     while($row4=mysqli_fetch_assoc($result4)){
         if($row4['to_id'] === $_SESSION['username']){
            echo "  
                 <div class='bg-transparent offset-7 text-start col-5 badge text-secondary text-wrap msg-send-friend shadow-sm'>
                     <span class='p-2 rounded'>
                         {$row4['msg']} <br>
                     </span>
                     <div class='text-end'> 
                         <small>{$row4['c_time']}</small>
                     </div>
                 </div><br>
             ";
         }else{
            echo "  
                 <div class='bg-transparent text-start col-5 border badge text-primary text-wrap msg-send-user shadow-sm'>
                     <span class='p-2 rounded'>
                         {$row4['msg']} <br>
                     </span>
                     <div class='text-end'>
                         <small>{$row4['c_time']}</small>";
                         if($row4['m_status']==='notseen'){
                            echo" <img src='http://$hostname/livechat/img/svg/check2.svg' class='dropdown-toggle dropdown-toggle-split' data-bs-toggle='dropdown' aria-expanded='false'>";
                         }else{
                            echo" <img src='http://$hostname/livechat/img/svg/check2-all.svg' class='dropdown-toggle dropdown-toggle-split' data-bs-toggle='dropdown' aria-expanded='false'>";
                         }
                         echo"
                    </div>
                 </div><br>
             ";
         }
     }
 }
?>