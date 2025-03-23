<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>MY GYM</title>
        <link rel="stylesheet" href="gym.css" type="text/css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
    </head>
    <body>
        <?php
            if ($_SERVER["REQUEST_METHOD"]=="POST"){
                if (isset($_POST['addRequest'])){
                    
                    $name=$_POST['name'];
                    $last_name=$_POST['last_name'];
                    $email=$_POST['email'];
                    $username=$_POST['username'];
                    $password=$_POST['password'];
                    $address=$_POST['address'];
                    $city=$_POST['city'];
                    $country=$_POST['country'];
                    $status=$_POST['status'];

                    $data=[
                        'name'=> $name,
                        'last_name'=> $last_name,
                        'email'=> $email,
                        'username'=> $username,
                        'password'=> $password,
                        'address'=> $address,
                        'city'=> $city,
                        'country'=> $country,
                        'status'=> $status
                    ];

                    $jsonData = json_encode($data);

                    $url="http://localhost:3000/addRequest";

                    $ch=curl_init($url);
                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_HTTPHEADER, [
                        'Content-Type: application/json',
                        'Content-Length: '. strlen($jsonData)
                    ]);

                    $response= curl_exec($ch);
                    $httpCode= curl_getinfo($ch, CURLINFO_HTTP_CODE);

                    curl_close($ch);
                        
                    if ($httpCode == 200) {
                        echo "<script>alert('Registered successfully. Wait until accepted!'); window.location.href='gym.php';</script>";
                    } else {
                        echo "<script>alert('Failed to register!'); window.location.href='gym.php';</script>";
                    }
                }else if (isset($_POST['LOGIN'])){
                    $username=$_POST['username'];
                    $password=$_POST['password'];

                    $data=[
                        'username'=> $username,
                        'password'=> $password
                    ];

                    $jsonData = json_encode($data);

                    $url="http://localhost:3000/login";

                    $ch=curl_init($url);
                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_HTTPHEADER, [
                        'Content-Type: application/json',
                        'Content-Length: '. strlen($jsonData)
                    ]);

                    $response= curl_exec($ch);
                    $httpCode= curl_getinfo($ch, CURLINFO_HTTP_CODE);

                    curl_close($ch);
                        
                    if ($httpCode == 200) {
                        $result = json_decode($response, true);
                        
                        if($result['success']){
                            header("Location:".$result['redirect']);
                            exit();
                        }else {
                            echo "<script>alert('".$result['message']."'); window.location.href='gym.php';</script>";
                        }
                    } else {
                        echo "<script>alert('Failed to login. Try again.!'); window.location.href='gym.php';</script>";
                    }
                }
            }
        ?>
        <div class="login">
            <h1>Login</h1>
            <form action="gym.php" method="post">
                <input type="text" id="username" name="username" placeholder="Username" required/>
                <input type="password" id="password" name="password" placeholder="Password" required/>
                <button type="submit" class="loginBtn" name="LOGIN">Login</button>
            </form>
            <div class="registerButton">
                    or <button id="regBtn">Register !</button>
            </div>
            <div id="registerModal" class="regModal">
                <span class="close">&times;</span>
                <form class="modal-content" action="gym.php" method="POST">
                    <h2 class="regH2">Register</h2> 
                    <div class="regContainer">                                                              
                        <div class="col1">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" placeholder="Name" required>
                            <label for="username">Username</label>
                            <input type="text" id="username" name="username" placeholder="Username" required>
                            <label for="email">E-mail</label>
                            <input type="email" id="email" name="email" placeholder="@gmail.com" required>
                            <label for="country">Country</label>
                            <input type="text" id="country" name="country" placeholder="Country" required>
                        </div>
                                        
                        <div class="col2">
                            <label for="last_name">Last Name</label>
                            <input type="text" id="last_name" name="last_name" placeholder="Last Name" required>
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" placeholder="Password" required>
                            <label for="address">Address</label>
                            <input type="text" id="address" name="address" placeholder="Address" required>
                            <label for="city">City</label>
                            <input type="text" id="city" name="city" placeholder="City" required>
                        </div>
                        <input type="hidden" id="status" name="status" value="pending">
                    </div>
                    <div class="addRequest">
                        <button type="submit" class="addRequestBtn" name="addRequest">Register</button>
                    </div>
                </form>
            </div>
        </div>
          
          
        <div class="main">
            <h1>MY GYM</h1>
            <div class="nav" id="nav">
                <a href="#home" class="active">Home</a>
                <a href="#about">About</a>
                <a href="#services">Services</a>
                <a href="#contact">Contact</a>
              </div>
            <div class="mainBody">
                <div class="home" id="home">
                    <div class="wtmg">
                        <h2 >Welcome to MY GYM !</h2>
                    </div>
                    <div class="homeContent">
                        <h2>MY GYM</h2>
                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti 
                            quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia 
                            deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam 
                            libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus,
                            omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus
                            saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus,
                            ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat</p>
                    </div>
                </div>
                <h2 class="au">ABOUT US</h2>
                <div class="aboutUs" id="about">
                    <div class="aboutUsContent">
                        <p>Nullam pharetra congue leo ut aliquam. Donec nec bibendum dui. Pellentesque sem augue, placerat posuere diam quis, fringilla 
                            auctor erat. Duis gravida tristique sem,omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus
                            saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandaeomn is voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus
                            saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae at posuere nibh vulputate a. In consectetur quam a neque elementum condimentum. 
                            Suspendisse tellus lacus, molestie et varius ut, dapibus a nibh. Nulla lacinia aliquet quam at rutrum. Phasellus nec elementum 
                            tellus. Sed quis sapien velit. Ut sit amet lectus sit amet justo sagittis feugiat.</p>
                    </div>
                </div>
                <div id="services" class="servicesContainer">
                    <div class="tabcontent">
                        <div class="services">
                            <?php
                                $url="http://localhost:3000/services";

                                $curl=curl_init($url);
                                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                                $response=curl_exec($curl);
                                $data=json_decode($response, true);
                                foreach ($data as $services){
                                    echo "<button id='defaultOpen2' class='tablinks2' onclick='SERVICES(event, \"".$services['name']."\")'>".$services['name']."</button>" ;
                                }
                            ?>   
                        </div>
                        <div class="servicesContent">  
                            <?php
                                foreach ($data as $services){
                                    echo "
                                        <div id='".$services['name']."' class='tabcontent2'>
                                            <h3 class='servicesContentH3'>".$services['name']."</h3>
                                            <p class='servicesContentP'>".$services['description']."</p>
                                        </div>";
                                }
                            ?>
                        </div>
                    </div> 
                </div>
                
                </div>
                <footer id="contact">
                    <div class="container">
                        <div class="info">
                            <h3>Contact Details</h3>
                            <div class="conDetails">
                            <a href="" class="fa fa-facebook"></a>
                            <a href="" class="fa fa-twitter"></a>
                            <a href="" class="fa fa-google"></a>
                            <a href="" class="fa fa-instagram"></a>
                            </div>
                            <p>Tel: <a href="tel:+302106278267">+30 2106278267</a></p>
                            <p>E-mail: <a href="mailto:mygym@gmail.com">mygym@gmail.com</a></p>
                        </div>
                        <div class="map">
                            <h3>Find us on the map</h3>
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3146.5217707233332!2d23.650404376606325!3d37.94160127194381!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14a1bbe5bb8515a1%3A0x3e0dce8e58812705!2zzqDOsc69zrXPgM65z4PPhM6uzrzOuc6_IM6gzrXOuc-BzrHOuc-Oz4I!5e0!3m2!1sel!2sgr!4v1718879580081!5m2!1sel!2sgr" loading="lazy"></iframe>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script>
            var registerModal = document.getElementById("registerModal");

            var regBtn = document.getElementById("regBtn");

            var regSpan = document.getElementsByClassName("close")[0];

            regBtn.onclick = function() {
                registerModal.style.display = "block";
            }

            regSpan.onclick = function() {
                registerModal.style.display = "none";
            }

            window.onclick = function(event) {
                if (event.target == registerModal) {
                    registerModal.style.display = "none";
                }
            }
        </script>
         <script>
            function SERVICES(evt, serviceName) {
                var i, tabcontent2, tablinks2;
                tabcontent2 = document.getElementsByClassName("tabcontent2");
                for (i = 0; i < tabcontent2.length; i++) {
                    tabcontent2[i].style.display = "none";
                }
                tablinks2 = document.getElementsByClassName("tablinks2");
                for (i = 0; i < tablinks2.length; i++) {
                    tablinks2[i].className = tablinks2[i].className.replace(" active", "");
                }
                document.getElementById(serviceName).style.display = "block";
                evt.currentTarget.className += " active";
            }
            document.getElementById("defaultOpen2").click();
        </script>
    </body>
</html>