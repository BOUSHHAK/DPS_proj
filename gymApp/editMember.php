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
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['user_id'])) {
                $user_id = $_POST['user_id'];

                $url="http://localhost:3000/user/".$user_id;

                $curl=curl_init($url);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                $response=curl_exec($curl);
                $data=json_decode($response, true);
            }
        
            echo "
                <div class='modalContent'>
                    <h3 class='editH3'>EDIT MEMBER<button class='backBtn' type='button' onclick=\"window.location.href='admin.php';\">BACK</button></h3>
                    <div class='editContent'>       
                        <form action='admin.php' method='POST'>                              
                            <div class='col1'>
                                <input type='hidden' id='user_id' name='user_id' value='".$data['user_id']."'>                        
                                <label for='name'>Name</label>
                                <input type='text' id='name' name='name' value='".$data['name']."'>
                                <label for='username'>Username</label>
                                <input type='text' id='username' name='username' value='".$data['username']."'>
                                <label for='email'>E-mail</label>
                                <input type='email' id='email' name='email' value='".$data['email']."'>
                                <label for='country'>Country</label>
                                <input type='text' id='country' name='country' value='".$data['country']."'>
                                <label for='usertype'>User Type</label>
                                <select id='usertype' name='userType'>
                                    <option value='".$data['userType']."' selected>".$data['userType']."</option>
                                    <option value='user'>User</option>
                                    <option value='admin'>Admin</option>
                                </select>
                            </div>                      
                            <div class='col2'>
                                <label for='lastname'>Last Name</label>
                                <input type='text' id='lastname' name='last_name' value='".$data['last_name']."'>
                                <label for='password'>Password</label>
                                <input type='password' id='password' name='password' value='".$data['password']."'>
                                <label for='address'>Adress</label>
                                <input type='text' id='address' name='address' value='".$data['address']."'>
                                <label for='city'>City</label>
                                <input type='text' id='city' name='city' value='".$data['city']."'>

                                <button type='submit' name='saveEditedUser'>Save</button>
                            </div>
                        </form>
                    </div>
                </div>";
        ?>
    </body>
</html>