<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>MY GYM/USER</title>
        <link rel="stylesheet" href="user.css" type="text/css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
    </head>
    <body>
        <div class="top-container">
            <h1>MY GYM</h1>
        </div>
        <div class="header">
            <div class="nav">
                <button id="defaultOpen" class="tablinks" onclick="NAV(event, 'Services')">Services</button>
                <button class="tablinks" onclick="NAV(event, 'Book')">Book</button>
                <button class="tablinks" onclick="NAV(event, 'History')">History</button>
                <button class="tablinks" onclick="NAV(event, 'News')">News</button>
                <button class="tablinks" onclick="NAV(event, 'Contact')">Contact</button>
            </div>
            <a href="gym.html"><button class="logout"><span class="glyphicon glyphicon-log-out"></span> Log out</button></a>
        </div>
        <div class="content">       
            <div id="Services" class="tabcontent">
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
                                    <h3>".$services['name']."</h3>
                                    <p>".$services['description']."</p>
                                </div>";
                        }
                    ?>
                </div>
            </div> 
            <div class="book">
                <div id="Book" class="tabcontent">
                    <button id="bookBtn">BOOK NOW</button>
                    <div class="bookedServices">
                        
                        <div class="bookedService1">
                            <div class="details">
                                <h3>Service 1</h3>
                                <h4>10/03 | 11:30</h4>
                            </div>
                            <button class="cancelBtn1">CANCEL</button>
                        </div>
                        <div class="bookedService1">
                            <div class="details">
                                <h3>Service 1</h3>
                                <h4>10/03 | 11:30</h4>
                            </div>
                            <button class="cancelBtn1">CANCEL</button>
                        </div>
                        <div class="bookedService1">
                            <div class="details">
                                <h3>Service 1</h3>
                                <h4>10/03 | 11:30</h4>
                            </div>
                            <button class="cancelBtn1">CANCEL</button>
                        </div>
                        <div class="bookedService1">
                            <div class="details">
                                <h3>Service 1</h3>
                                <h4>10/03 | 11:30</h4>
                            </div>
                            <button class="cancelBtn1">CANCEL</button>
                        </div>
                        <div class="bookedService1">
                            <div class="details">
                                <h3>Service 1</h3>
                                <h4>10/03 | 11:30</h4>
                            </div>
                            <button class="cancelBtn1">CANCEL</button>
                        </div>
                        <div class="bookedService1">
                            <div class="details">
                                <h3>Service 1</h3>
                                <h4>10/03 | 11:30</h4>
                            </div>
                            <button class="cancelBtn1">CANCEL</button>
                        </div>
                        <div class="bookedService1">
                            <div class="details">
                                <h3>Service 1</h3>
                                <h4>10/03 | 11:30</h4>
                            </div>
                            <button class="cancelBtn1">CANCEL</button>
                        </div>
                        <div class="bookedService1">
                            <div class="details">
                                <h3>Service 1</h3>
                                <h4>10/03 | 11:30</h4>
                            </div>
                            <button class="cancelBtn1">CANCEL</button>
                        </div>
                        <div class="bookedService1">
                            <div class="details">
                                <h3>Service 1</h3>
                                <h4>10/03 | 11:30</h4>
                            </div>
                            <button class="cancelBtn1">CANCEL</button>
                        </div>
                        <div class="bookedService1">
                            <div class="details">
                                <h3>Service 1</h3>
                                <h4>10/03 | 11:30</h4>
                            </div>
                            <button class="cancelBtn1">CANCEL</button>
                        </div>
                        <div class="bookedService1">
                            <div class="details">
                                <h3>Service 1</h3>
                                <h4>10/03 | 11:30</h4>
                            </div>
                            <button class="cancelBtn1">CANCEL</button>
                        </div>

                    </div>
                </div>
                <div id="Modal" class="modal">
                    <div class="modalContent">
                        <span class="close1">&times;</span>
                        <h3 class="bookNow">BOOK NOW</h3>
                        <div class="bookContent">
                            <form action="/action_page.php">                                
                                <div class="col">
                                    <label for="service">Service</label>
                                    <select id="service" name="service">
                                        <?php
                                            foreach ($data as $services){
                                                echo "<option value=".$services['service_id'].">".$services['name']."</option>";
                                            }
                                        ?>
                                    </select>
                                    <label for="date">Date</label>
                                    <input type="date" id="date" name="date">
                                    <div class="openServices">
                                        <div class="openService">
                                            <div class="details">
                                                <h3>Service 1</h3>
                                                <h4>10/03 | 11:30</h4>
                                            </div>
                                            <button class="finalBookBtn">BOOK</button>
                                        </div>
                                        <div class="openService">
                                            <div class="details">
                                                <h3>Service 1</h3>
                                                <h4>10/03 | 11:30</h4>
                                            </div>
                                            <button class="finalBookBtn">BOOK</button>
                                        </div>
                                        <div class="openService">
                                            <div class="details">
                                                <h3>Service 1</h3>
                                                <h4>10/03 | 11:30</h4>
                                            </div>
                                            <button class="finalBookBtn">BOOK</button>
                                        </div>
                                        <div class="openService">
                                            <div class="details">
                                                <h3>Service 1</h3>
                                                <h4>10/03 | 11:30</h4>
                                            </div>
                                            <button class="finalBookBtn">BOOK</button>
                                        </div>
                                        <div class="openService">
                                            <div class="details">
                                                <h3>Service 1</h3>
                                                <h4>10/03 | 11:30</h4>
                                            </div>
                                            <button class="finalBookBtn">BOOK</button>
                                        </div>
                                        <div class="openService">
                                            <div class="details">
                                                <h3>Service 1</h3>
                                                <h4>10/03 | 11:30</h4>
                                            </div>
                                            <button class="finalBookBtn">BOOK</button>
                                        </div>
                                        <div class="openService">
                                            <div class="details">
                                                <h3>Service 1</h3>
                                                <h4>10/03 | 11:30</h4>
                                            </div>
                                            <button class="finalBookBtn">BOOK</button>
                                        </div>
                                        <div class="openService">
                                            <div class="details">
                                                <h3>Service 1</h3>
                                                <h4>10/03 | 11:30</h4>
                                            </div>
                                            <button class="finalBookBtn">BOOK</button>
                                        </div>
                                        <div class="openService">
                                            <div class="details">
                                                <h3>Service 1</h3>
                                                <h4>10/03 | 11:30</h4>
                                            </div>
                                            <button class="finalBookBtn">BOOK</button>
                                        </div>
                                        <div class="openService">
                                            <div class="details">
                                                <h3>Service 1</h3>
                                                <h4>10/03 | 11:30</h4>
                                            </div>
                                            <button class="finalBookBtn">BOOK</button>
                                        </div>
                                        <div class="openService">
                                            <div class="details">
                                                <h3>Service 1</h3>
                                                <h4>10/03 | 11:30</h4>
                                            </div>
                                            <button class="finalBookBtn">BOOK</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <script>
                    var modal = document.getElementById("Modal");
        
                    var bookButton = document.getElementById("bookBtn"); 
        
                    var span = document.getElementsByClassName("close1")[0];
        
                    bookButton.onclick = function() {
                        modal.style.display = "block";
                      }
        
                    span.onclick = function() {
                        modal.style.display = "none";
                    }
        
                    window.onclick = function(event) {
                        if (event.target == modal) {
                            modal.style.display = "none";
                        }
                    }
                </script>
                <script>
                    var todaysDate = new Date().toISOString().split("T")[0];
        
                    document.getElementById("date").setAttribute("min", todaysDate);
                </script>
            </div>
            <div class="history">
                <div id="History" class="tabcontent">
                    <div class="historyContent">
                        <h3 class="bookingHistoryh3">BOOKING HISTORY</h3>
                        <div class="BookingHistory">
                            <div class="burntCalories">
                                <div class="historyDetails">
                                    <h3>Service 1</h3>
                                    <h4>10/03 | 11:30</h4>
                                </div>
                            </div>
                            <div class="burntCalories">
                                <div class="historyDetails">
                                    <h3>Service 1</h3>
                                    <h4>10/03 | 11:30</h4>
                                </div>
                            </div>
                            <div class="burntCalories">
                                <div class="historyDetails">
                                    <h3>Service 1</h3>
                                    <h4>10/03 | 11:30</h4>
                                </div>
                            </div>
                            <div class="burntCalories">
                                <div class="historyDetails">
                                    <h3>Service 1</h3>
                                    <h4>10/03 | 11:30</h4>
                                </div>
                            </div>
                            <div class="burntCalories">
                                <div class="historyDetails">
                                    <h3>Service 1</h3>
                                    <h4>10/03 | 11:30</h4>
                                </div>
                            </div>
                            <div class="burntCalories">
                                <div class="historyDetails">
                                    <h3>Service 1</h3>
                                    <h4>10/03 | 11:30</h4>
                                </div>
                            </div>
                            <div class="burntCalories">
                                <div class="historyDetails">
                                    <h3>Service 1</h3>
                                    <h4>10/03 | 11:30</h4>
                                </div>
                            </div>
                            <div class="burntCalories">
                                <div class="historyDetails">
                                    <h3>Service 1</h3>
                                    <h4>10/03 | 11:30</h4>
                                </div>
                            </div>
                            <div class="burntCalories">
                                <div class="historyDetails">
                                    <h3>Service 1</h3>
                                    <h4>10/03 | 11:30</h4>
                                </div>
                            </div>
                            <div class="burntCalories">
                                <div class="historyDetails">
                                    <h3>Service 1</h3>
                                    <h4>10/03 | 11:30</h4>
                                </div>
                            </div>
                            <div class="burntCalories">
                                <div class="historyDetails">
                                    <h3>Service 1</h3>
                                    <h4>10/03 | 11:30</h4>
                                </div>
                            </div>
                            <div class="burntCalories">
                                <div class="historyDetails">
                                    <h3>Service 1</h3>
                                    <h4>10/03 | 11:30</h4>
                                </div>
                            </div>
                            <div class="burntCalories">
                                <div class="historyDetails">
                                    <h3>Service 1</h3>
                                    <h4>10/03 | 11:30</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="news">
                <div id="News" class="tabcontent">
                    <h3 class="newsH3">NEWS</h3>
                    <div class="newsContent">
                        <?php
                            $url="http://localhost:3000/ann_offers";

                            $curl=curl_init($url);
                            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                            $response=curl_exec($curl);
                            $data=json_decode($response, true);
                            foreach ($data as $ann_offer){
                                echo "
                                    <div class='announcement'>    
                                        <p class='ann'>".$ann_offer['content']."</p>
                                    </div>";
                            }
                        ?> 
                    </div>
                </div>
            </div>
            <div id="Contact" class="tabcontent">
                <div class="container">
                    <div class="info">
                            <h3>Contact Details</h3>
                            <div class="conDetails">
                                <div class="a">
                                    <a href="" class="fa fa-facebook"></a>
                                    <a href="" class="fa fa-twitter"></a>
                                    <a href="" class="fa fa-google"></a>
                                    <a href="" class="fa fa-instagram"></a>
                                </div>
                                <div class="p">
                                    <p>Tel: <a href="tel:+302106278267">+30 2106278267</a></p>
                                    <p>E-mail: <a href="mailto:mygym@gmail.com">mygym@gmail.com</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="map">
                            <h3>Find us on the map</h3>
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3146.5217707233332!2d23.650404376606325!3d37.94160127194381!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14a1bbe5bb8515a1%3A0x3e0dce8e58812705!2zzqDOsc69zrXPgM65z4PPhM6uzrzOuc6_IM6gzrXOuc-BzrHOuc-Oz4I!5e0!3m2!1sel!2sgr!4v1718879580081!5m2!1sel!2sgr" loading="lazy"></iframe>
                        </div>
                    </div>
            </div>
        </div>
        <script>
            function NAV(evt, Name) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }
                document.getElementById(Name).style.display = "block";
                evt.currentTarget.className += " active";
            }
            document.getElementById("defaultOpen").click();
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