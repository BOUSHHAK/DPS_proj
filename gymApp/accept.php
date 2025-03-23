<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>MY GYM/ADMIN</title>
        <link rel="stylesheet" href="admin.css" type="text/css"/>
    </head>
    <body>
        <div class="top-container">
            <h1>MY GYM</h1>
        </div>
        <div class="header">
            
            <a href="gym.html"><button class="logout">Log out</button></a>
        </div>
        <?php    
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['request_id'])) {
                $request_id = $_POST['request_id'];

                $url="http://localhost:3000/request/".$request_id;

                $curl=curl_init($url);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                $response=curl_exec($curl);
                $data=json_decode($response, true);
            }
                echo "
                    <div class='modalContent'>
                        <h3 class='editH3'>ACCEPT AS<button class='backBtn' type='button' onclick=\"window.location.href='admin.php';\">BACK</button></h3>
                        <div class='editContent'>";
                    
                        if ($data['status'] == 'rejected'){
                            echo "Request can't be accepted because it has already been rejected !";
                            exit();
                        }else{
                            echo "
                                <form action='admin.php' method='POST'>                                
                                    <div class='col1'>
                                        <input type='hidden' id='request_id' name='request_id' value='".$data['request_id']."'>
                                        <input type='hidden' id='name' name='name' value='".$data['name']."'>
                                        <input type='hidden' id='last_name' name='last_name' value='".$data['last_name']."'>
                                        <input type='hidden' id='email' name='email' value='".$data['email']."'>
                                        <input type='hidden' id='username' name='username' value='".$data['username']."'>
                                        <input type='hidden' id='password' name='password' value='".$data['password']."'>
                                        <input type='hidden' id='address' name='address' value='".$data['address']."'>
                                        <input type='hidden' id='city' name='city' value='".$data['city']."'>
                                        <input type='hidden' id='country' name='country' value='".$data['country']."'> 
                                        <label for='userType'>User Type</label>
                                        <select id='userType' name='userType' class='userTypeSelect'>
                                            <option value='user'>User</option>
                                            <option value='admin'>Admin</option>
                                        </select>
                                        <button type='submit' class='modal6SaveBtn' name='ACCEPT'>Accept</button>
                                    </div>
                                </form>
                            </div>
                        </div>";
                        }
        ?>
    </body>
</html>