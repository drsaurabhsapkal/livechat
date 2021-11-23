<?php
include($_SERVER['DOCUMENT_ROOT']."/livechat/application/connection/index.php"); 
$hostname = getenv('HTTP_HOST');
$i =1;
$sql = "SELECT * FROM `users` ORDER BY `id` asc limit 15;";
$result = mysqli_query($conn,$sql) or die("SQL Query error....!");
$profile ='
<table class="table table-bordered border-primary mt-2 table-hover" id="list-table">
    <tr class="table-secondary border-primary text-center">
        <th>ID</th>
        <th>User Name</th>
        <th>Email</th>
        <th>Status</th>
        <th>Photo</th>
        <th>ON/OFF</th>
    </tr>
';
if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_assoc($result)){
        $profile .= "
        <tr  class='text-center'>
            <td>$i</td>
            <td>{$row['username']}</td>
            <td>{$row['email']}</td>
            <td>{$row['status']}</td>
            <td>
                <img src='http://$hostname/livechat/img/profile_img/".$row['photo']."' alt='User_img' class='img-fluid rounded' style='height: 40px; width: 40px;'>
            </td>
            <td>
                <div class='form-check form-check-inline'>
                    <input class='form-check-input' type='checkbox' id='Active{$row['id']}' checked>
                </div>
            </td>
        </tr>
        ";
        $i++;

    }
    echo "
            </table>
        ";
}

$sql1 = "SELECT * FROM `msg` ORDER BY `mid` asc limit 10;";
$result1 = mysqli_query($conn,$sql1) or die("SQL Query error....!");
$messages ='
<table class="table table-bordered border-primary mt-2 table-hover" id="list-table">
    <tr class="table-secondary border-primary text-center">
        <th>MID</th>
        <th>Sender Email</th>
        <th>Reciver Email</th>
        <th>Message</th>
        <th>Type</th>
    </tr>
';
if(mysqli_num_rows($result1)>0){
    while($row1=mysqli_fetch_assoc($result1)){
        $messages .= "
        <tr>
            <td>$i</td>
            <td>{$row1['uid']}</td>
            <td>{$row1['to_id']}</td>
            <td>{$row1['msg']}</td>
            <td>{$row1['type']}</td>
        </tr>
        ";
        $i++;
    }
    echo "
            </table>
        ";
}


$sql2 = "SELECT * FROM `group` ORDER BY `id` asc limit 10;";
$result2 = mysqli_query($conn,$sql2) or die("SQL Query error....!");
$group ='
<table class="table table-bordered border-primary mt-2 table-hover" id="list-table">
    <tr class="table-secondary border-primary text-center">
        <th>ID</th>
        <th>Name</th>
        <th>Type</th>
        <th>Creater Name</th>
        <th>Members</th>
    </tr>
';
if(mysqli_num_rows($result2)>0){
    while($row2=mysqli_fetch_assoc($result2)){
        $group .= "
        <tr>
            <td>$i</td>
            <td>{$row2['g_name']}</td>
            <td>{$row2['g_type']}</td>
            <td>{$row2['gc_name']}</td>
            <td>{$row2['group_members']}</td>
        </tr>
        ";
        $i++;

    }
    echo "
            </table>
        ";
}

$sql3 = "SELECT * FROM `follow` ORDER BY `f_id` asc limit 10;";
$result3 = mysqli_query($conn,$sql3) or die("SQL Query error....!");
$followers ='
<table class="table table-bordered border-primary mt-2 table-hover" id="list-table">
    <tr class="table-secondary border-primary text-center">
        <th>ID</th>
        <th>User_email</th>
        <th>Follower_email</th>
    </tr>
';
if(mysqli_num_rows($result3)>0){
    while($row3=mysqli_fetch_assoc($result3)){
        $followers .= "
        <tr>
            <td>$i</td>
            <td>{$row3['u_email']}</td>
            <td>{$row3['f_email']}</td>
        </tr>
        ";
        $i++;
    }
    echo "
            </table>
        ";
}


?>
<div class="col" style="background-color: #e3f2fd;">
    <span class="navbar navbar-light text-center p-3">
        <a class="navbar-brand text-center display-6"><span class='mission'>invalid</span> Report</a> 
        <a class='navbar-brand text-center display-6'>Date : <span class="date"></span> Time : <span class="time"></span></a> 
    </span>
</div>
<?php
// profile
if(isset($_POST['list_profile'])){
    if($_POST['list_profile']=='profile'){
        echo" 
            <script>
                $('.mission').text('Profile');
            </script>
            <nav>
                <div class='nav nav-tabs justify-content-end mt-2' id='nav-tab' role='tablist'>
                    <button class='nav-link active' id='nav-home-tab' data-bs-toggle='tab' data-bs-target='#nav-home' type='button' role='tab' aria-controls='nav-home' aria-selected='true'>Chart</button>
                    <button class='nav-link' id='nav-profile-tab' data-bs-toggle='tab' data-bs-target='#nav-profile' type='button' role='tab' aria-controls='nav-profile' aria-selected='false'>Data</button>
                    <button class='nav-link disabled' id='nav-contact-tab' data-bs-toggle='tab' data-bs-target='#nav-contact' type='button' role='tab' aria-controls='nav-contact' aria-selected='false'>Upcoming</button>
                </div>
            </nav>
            <div class='tab-content' id='nav-tabContent'>
                <div class='tab-pane fade show active' id='nav-home' role='tabpanel' aria-labelledby='nav-home-tab'>
                    <canvas id='chart_profile' aria-label='chart' role='img' width='1300' Height='700'></canvas>
                </div>
                <div class='tab-pane fade' id='nav-profile' role='tabpanel' aria-labelledby='nav-profile-tab'>
                    $profile
                    <table>
                        <tr>
                            <ul class='pagination justify-content-center'>
                                <li class='page-item disabled'><span class='page-link'>Previous</span></li>
                                <li class='page-item active'><a class='page-link' href='#'>1</a></li>
                                <li class='page-item'><a class='page-link' href='#'>2</a></li>
                                <li class='page-item'><a class='page-link' href='#'>3</a></li>
                                <li class='page-item'><a class='page-link' href='#'>Next</a></li>
                            </ul>
                        </tr>
                    </table>
                </div>
            </div>
        ";
    }
}
// messages
if(isset($_POST['list_messages'])){
    if($_POST['list_messages']=='messages'){
        echo" 
            <script>
                $('.mission').text('Messages');
            </script>
            $messages
            <table>
                <tr>
                    <ul class='pagination justify-content-center'>
                        <li class='page-item disabled'><span class='page-link'>Previous</span></li>
                        <li class='page-item active'><a class='page-link' href='#'>1</a></li>
                        <li class='page-item'><a class='page-link' href='#'>2</a></li>
                        <li class='page-item'><a class='page-link' href='#'>3</a></li>
                        <li class='page-item'><a class='page-link' href='#'>Next</a></li>
                    </ul>
                </tr>
            </table>
        ";
    }
}
// group
if(isset($_POST['list_group'])){
    if($_POST['list_group']=='group'){
        echo" 
            <script>
                $('.mission').text('Group');
            </script>
            $group
            <table>
                <tr>
                    <ul class='pagination justify-content-center'>
                        <li class='page-item disabled'><span class='page-link'>Previous</span></li>
                        <li class='page-item active'><a class='page-link' href='#'>1</a></li>
                        <li class='page-item'><a class='page-link' href='#'>2</a></li>
                        <li class='page-item'><a class='page-link' href='#'>3</a></li>
                        <li class='page-item'><a class='page-link' href='#'>Next</a></li>
                    </ul>
                </tr>
            </table>
        ";
    }
}
// followers
if(isset($_POST['list_followers'])){
    if($_POST['list_followers']=='followers'){
        echo" 
            <script>
                $('.mission').text('Followers');
            </script>
            $followers
            <table>
                <tr>
                    <ul class='pagination justify-content-center'>
                        <li class='page-item disabled'><span class='page-link'>Previous</span></li>
                        <li class='page-item active'><a class='page-link' href='#'>1</a></li>
                        <li class='page-item'><a class='page-link' href='#'>2</a></li>
                        <li class='page-item'><a class='page-link' href='#'>3</a></li>
                        <li class='page-item'><a class='page-link' href='#'>Next</a></li>
                    </ul>
                </tr>
            </table>
        ";
    }
}
// query
if(isset($_POST['list_query'])){
    if($_POST['list_query']=='query'){
        echo" 
            <script>
                $('.mission').text('Query');
            </script>
        ";
    }
}
// feedback
if(isset($_POST['list_feedback'])){
    if($_POST['list_feedback']=='feedback'){
        echo" 
            <script>
                $('.mission').text('Feedback');
            </script>
        ";
    }
}

?>

<script>
    var  today = new Date().toLocaleDateString();
    $('.date').text(today);
</script>




<script>
    var ctx = document.getElementById("chart_profile").getContext("2d");
    var myChart = new Chart(ctx,{
    type:"doughnut",
    data:{
        labels: [
            'Online',
            'Offline',
        ],
        datasets:[
            {
                data: [100,50],
                fill: false,
                label: "Online",
                backgroundColor:[
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(201, 203, 207, 0.2)'
                ],
            },
            {
                data: [100,20],
                fill: false,
                label: "Offline",
                backgroundColor:[
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(201, 203, 207, 0.2)'
                ],
            },
        ],
    },
    options:{
        responsive:false,
        layout:{
            padding:{
                left:50,
                top:50,
                right:50,
                maxWidth: 0,
                maxHeight: 0,
            }
        },
        legend:{
            display:true,
            position:"bottom",
        },
        animation:{
            duration:3000,
            easing:"easeInOutBounce",
        },
        scales: {
            y: {
                min: 0,
            }
        },
        elements: {
            line: {
                borderWidth: 3
            }
        },
    },
})
</script>