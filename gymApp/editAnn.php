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
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['annOffer_id'])) {
                $annOffer_id = $_POST['annOffer_id'];

                $url="http://localhost:3000/ann_offer/".$annOffer_id;

                $curl=curl_init($url);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                $response=curl_exec($curl);
                $data=json_decode($response, true);
            }
        
            echo "
                <div class='modalContent'>
                    <h3 class='editH3'>EDIT ANNOUNCEMENT/OFFER<button class='backBtn' type='button' onclick=\"window.location.href='admin.php';\">BACK</button></h3>
                    <div class='editContent'>
                        <form action='admin.php' method='POST'>                                
                            <div class='col1'>
                                <input type='hidden' id='annOffer_id' name='annOffer_id' value='".$data['annOffer_id']."'>
                                <textarea id='content' name='content' style='min-height:200px; max-height:200px; min-width:454px; max-width:454px'>".$data['content']."</textarea>
                                <button type='submit' class='modal5SaveBtn' name='saveEditedAnn_Offer'>Save</button>
                            </div>
                        </form>
                    </div>
                </div>";
        ?>
    </body>
</html>