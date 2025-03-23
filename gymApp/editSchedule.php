<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>MY GYM/ADMIN</title>
        <link rel="stylesheet" href="admin.css" type="text/css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <div class="top-container">
            <h1>MY GYM</h1>
        </div>
        <div class="header">
            
            <a href="gym.html"><button class="logout">Log out</button></a>
        </div>
        <?php    
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['schedule_id'])) {
                $schedule_id = $_POST['schedule_id'];

                $url="http://localhost:3000/schedule/".$schedule_id;

                $curl=curl_init($url);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                $response=curl_exec($curl);
                $data=json_decode($response, true);
            }
        
            echo "
                <div class='modalContent'>
                    <h3 class='editH3'>EDIT SCHEDULE<button class='backBtn' type='button' onclick=\"window.location.href='admin.php';\">BACK</button></h3>
                    <div class='editContent'>
                        <form action='admin.php' method='POST'>                                
                            <div class='col1'>
                                <input type='hidden' id='schedule_id' name='schedule_id' value='".$data['schedule_id']."'>
                                <label for='date'>Date</label>
                                <input type='date' id='date' name='date' value='".substr($data['date'], 0, 10)."' min='".date('Y-m-d')."'>
                                <label for='service_service_id'>Service ID</label>
                                <input type='number' id='service_service_id' name='service_service_id' min='1' step='1' value='".$data['service_service_id']."'>
                            </div>
                            <div class='col2'>
                                <label for='time'>Time</label>
                                <input type='time' id='time' name='time' value='".substr($data['time'], 0, 5)."'>
                                <button type='submit' class='modal4SaveBtn' name='saveEditedSchedule'>Save</button>
                            </div>
                        </form>
                    </div>
                </div>";
        ?>
    </body>
</html>