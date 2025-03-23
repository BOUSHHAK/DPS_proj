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
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['trainer_id'])) {
                $trainer_id = $_POST['trainer_id'];

                $url="http://localhost:3000/trainer/".$trainer_id;

                $curl=curl_init($url);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                $response=curl_exec($curl);
                $data=json_decode($response, true);
            }
        
            echo "
                <div class='modalContent'>
                    <h3 class='editH3'>EDIT TRAINER<button class='backBtn' type='button' onclick=\"window.location.href='admin.php';\">BACK</button></h3>
                    <div class='editContent'>
                        <form action='admin.php' method='POST'>                                
                            <div class='col1'>
                                <input type='hidden' id='trainer_id' name='trainer_id' value='".$data['trainer_id']."'>  
                                <label for='name'>Name</label>
                                <input type='text' id='name' name='name' value='".$data['name']."'>
                                <label for='last_name'>Last Name</label>
                                <input type='text' id='last_name' name='last_name' value='".$data['last_name']."'>
                                <label for='email'>E-mail</label>
                                <input type='email' id='email' name='email' value='".$data['email']."'>
                                <label for='specialty'>Specialty</label>
                                <input type='text' id='specialty' name='specialty' value='".$data['specialty']."'>
                            </div>
                            <button type='submit' class='modal2SaveBtn' name='saveEditedTrainer'>Save</button>
                        </form>
                    </div>
                </div>";
        ?>
    </body>
</html>