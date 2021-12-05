<?php include_once($_SERVER['DOCUMENT_ROOT']."/livechat/application/links/index.php"); ?>
<body>
    <div class="container img-radius">
        <div class="row" id='slider'>
            <div>
                <img src="<?php echo "http://$hostname/livechat/img/fav-icon.png";?>" alt="fav-icon" class='img-fluid rounded'>
            </div>
            <!-- slider page -->
            <div class="col-lg-6">
                <div id="carouselExampleDark" class="carousel  carousel-fade " data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item" data-bs-interval="5000">
                            <img src="<?php echo "http://$hostname/livechat/img/slider/1.png";?>" class="d-block w-100 img-fluid rounded" alt="...">
                        </div>
                        <div class="carousel-item " data-bs-interval="5000">
                            <img src="<?php echo "http://$hostname/livechat/img/slider/5.png";?>" class="d-block w-100 img-fluid rounded" alt="...">
                        </div>
                        <div class="carousel-item active" data-bs-interval="5000">
                            <img src="<?php echo "http://$hostname/livechat/img/slider/3.png";?>" class="d-block w-100 img-fluid rounded" alt="...">
                        </div>        
                    </div>
                </div>
            </div>
            <!-- login page -->
            <div class="col-lg-6">
                <div class="col mt-5">
                    <div class="col-md-9 offset-md-3 border p-4  border-3 rounded-2 text-dark">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

                                <div class="col rounded text-center g-0 p-2 "><hr>
                                    <span class='h4 text-center'>Log in</span><hr>
                                </div>
                                    <div class="mb-3">
                                        <label for="email text-dark" class="form-label">Email address</label>
                                        <input type="email" class="form-control  bg-transparent" id="email" aria-describedby="emailHelp">
                                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control  bg-transparent" id="password">
                                    </div>

                                    <div class="mb-3 form-check">
                                        <input type="checkbox" class="form-check-input bg-transparent" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">Keep me logged in (for up to 365 days)</label>
                                    </div>

                                    <div class="nav m-2" id="nav-tab" role="tablist">

                                       <div class="col text-start">
                                            <a class="link text-start" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Forget Password → </a>
                                       </div>

                                       <div class="col text-end">
                                            <a class="link text-end" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">New Registration</a>
                                       </div>

                                    </div>

                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-secondary  text-center" value='login' onclick='login();'>Log in</button>
                                    </div>
                            </div>

                            <!-- Forget Password -->

                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

                                <div class="col rounded text-center g-0 p-2 "><hr>
                                    <span class='h4 text-center'>Forget Password</span><hr>
                                </div>
                                    <div class="col-md-">
                                        <label for="inputEmail4" class="form-label">Email</label>
                                        <input type="email" class="form-control  bg-transparent" id="inputEmail4">
                                    </div>
                                    <div class="d-grid gap-2 mt-2">
                                        <button type="submit" class="btn btn-secondary" onclick='forget();'>Reset Password</button>
                                    </div>
                            </div>


                            <!-- Sign in -->


                            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                <div class="col rounded text-center g-0 p-2 "><hr>
                                    <span class='h4 text-center'>Sign in</span><hr>
                                </div>
                                    <div class="mb-3">
                                        <label for="emailid" class="form-label">Email address</label>
                                        <input type="email" class="form-control  bg-transparent" id="emailid" aria-describedby="emailHelp">
                                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="username" class="form-label">User Name</label>
                                        <input type="text" class="form-control  bg-transparent" id="username" aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3">
                                        <label for="cpassword" class="form-label">Password</label>
                                        <input type="password" class="form-control  bg-transparent" id="cpassword">
                                    </div>
                                    <div class="mb-3">
                                        <label for="ccpassword" class="form-label">Confim Password</label>
                                        <input type="password" class="form-control  bg-transparent" id="ccpassword">
                                    </div>  
                                    <span id='invalidmsg'></span>
                                    <div class="mb-3 form-check">
                                        <input type="checkbox" class="form-check-input  bg-transparent" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">Agree T&C</label>
                                    </div>
                                    <div class="d-grid gap-2 ">
                                    <button type="submit" class="btn btn-secondary" onclick='reg()'>Sign UP</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <span id='log_msg'></span>
        <span id='registration_msg'></span>
        <span id='forget_msg'></span>
    </div>

    <div aria-live="polite" aria-atomic="true" class="position-relative">
        <div class="position-fixed position-absolute top-0 end-0 p-3">
                <!-- Then Username Or Password is Wrong -->
                <div class="toast" id='liveToast3'>
                    <div class="toast-header">
                        <img src="<?php echo "http://$hostname/livechat/img/fav-icon.png";?>" style='height:20px; width:30px;' class="rounded me-2" alt="tost">
                        <strong class="me-auto">LiveChat</strong>
                        <small>&#128162;</small>
                        <button type='button'  class='btn-close' data-bs-dismiss='toast' aria-label='Close'></button>
                    </div>
                    <div class="toast-body">
                        Username Or Password is Wrong....&#x1F44E;
                    </div>
                </div>
                  <!-- Then Username Already Exits -->
                  <div class='toast' id='liveToast5'>
                    <div class='toast-header'>
                        <img src="<?php echo "http://$hostname/livechat/img/fav-icon.png";?>" style='height:20px; width:30px;' class='rounded me-2' alt='tost'>
                        <strong class='me-auto'>LiveChat</strong>
                        <small></small>
                        <button type='button'  class=
                        'btn-close' data-bs-dismiss='toast' aria-label='Close'></button>
                    </div>
                    <div class='toast-body'>
                        Username Already Exits....&#x1F44E;
                    </div>
                </div>
                <!-- Then Record Inserted Successfully -->
                <div class='toast' id='liveToast4'>
                    <div class='toast-header'>
                        <img src="<?php echo "http://$hostname/livechat/img/fav-icon.png";?>" style='height:20px; width:30px;' class='rounded me-2' alt='tost'>
                        <strong class='me-auto'>LiveChat</strong>
                        <small></small>
                        <button type='button'  class='btn-close' data-bs-dismiss='toast' aria-label='Close'></button>
                    </div>
                    <div class='toast-body'>
                        Record Inserted Successfully....&#128077;
                    </div>
                </div>
                <!-- Password Send to Registed Email Id -->
                <div class='toast' id='liveToast6'>
                    <div class='toast-header'>
                        <img src="<?php echo "http://$hostname/livechat/img/fav-icon.png";?>" style='height:20px; width:30px;' class='rounded me-2' alt='tost'>
                        <strong class='me-auto'>LiveChat</strong>
                        <small></small>
                        <button type='button'  class='btn-close' data-bs-dismiss='toast' aria-label='Close'></button>
                    </div>
                    <div class='toast-body'>
                        Password Send to Registed Email Id....&#128077;
                    </div>
                </div>
                <!-- Instert any one here-->
        </div>
    </div>


        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <img src="<?php echo "http://$hostname/livechat/img/fav-icon.png";?>" style='height:20px; width:30px;'class="rounded me-2" alt="...">
                <strong class="me-auto"></strong>
                <small class='timemsg'>1 seconds ago</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                Welcome to LiveChat..!
            </div>
        </div>
    </div>

    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
        <div id="liveToast1" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
            <img src="<?php echo "http://$hostname/livechat/img/fav-icon.png";?>" style='height:20px; width:30px;'class="rounded me-2" alt="...">
            <strong class="me-auto"></strong>
            <small class='timemsg'>11 seconds ago </small>
            <button type="button"  class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            Any Help Releted LiveChat Plz contact or feedback....!
        </div>
    </div>


</body>

<script>
    $(document).ready(function(){
        function msg(){
            $('#liveToast').toast('show');
        }setTimeout(msg, 2000);

        function msg1(){
            $('#liveToast1').toast('show');
        }setTimeout(msg1, 10000); 
    });
</script>