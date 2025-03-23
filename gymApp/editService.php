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
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['service_id'])) {
                $service_id = $_POST['service_id'];

                $url="http://localhost:3000/service/".$service_id;

                $curl=curl_init($url);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                $response=curl_exec($curl);
                $data=json_decode($response, true);
            }
        
            echo "
                <div class='modalContent'>
                    <h3 class='editH3'>EDIT SERVICE<button class='backBtn' type='button' onclick=\"window.location.href='admin.php';\">BACK</button></h3>
                    <div class='editContent'>
                        <form action='admin.php' method='POST'>                                 
                            <div class='col1'>
                                <input type='hidden' id='service_id' name='service_id' value='".$data['service_id']."'>  
                                <label for='name'>Name</label>
                                <input type='text' id='name' name='name' value='".$data['name']."'>
                                <label for='trainer_trainer_id'>Trainer ID</label>
                                <input type='number' id='trainer_trainer_id' name='trainer_trainer_id' min='1' step='1' value='".$data['trainer_trainer_id']."'>
                                <label for='description'>Description</label>
                                <textarea id='description' name='description' style='min-height:150px; max-height:150px; min-width:192px; max-width:192px'>".$data['description']."</textarea>
                            </div>
                            <div class='col2'>
                                <label for='capacity'>Capacity</label>
                                <input type='number' id='capacity' name='capacity' min='1' step='1' value='".$data['capacity']."'>
                                <button type='submit' class='modal3SaveBtn' name='saveEditedService'>Save</button>
                            </div>
                        </form>
                    </div>
                </div>";
        ?>
    </body>
</html>