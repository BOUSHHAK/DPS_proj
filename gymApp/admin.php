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
            <a href="gym.php"><button class="logout">Log out</button></a>
        </div>
        <?php
            if ($_SERVER["REQUEST_METHOD"]=="POST"){
                if (isset($_POST['addUser'])){
                    
                    $name=$_POST['name'];
                    $last_name=$_POST['last_name'];
                    $email=$_POST['email'];
                    $username=$_POST['username'];
                    $password=$_POST['password'];
                    $address=$_POST['address'];
                    $city=$_POST['city'];
                    $country=$_POST['country'];
                    $userType=$_POST['userType'];

                    $data=[
                        'name'=> $name,
                        'last_name'=> $last_name,
                        'email'=> $email,
                        'username'=> $username,
                        'password'=> $password,
                        'address'=> $address,
                        'city'=> $city,
                        'country'=> $country,
                        'userType'=> $userType
                    ];

                    $jsonData = json_encode($data);

                    $url="http://localhost:3000/addUser";

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
                        echo "<script>alert('User added successfully !'); window.location.href='admin.php';</script>";
                    } else {
                        echo "<script>alert('Failed to add user!'); window.location.href='admin.php';</script>";
                    }
                }else if (isset($_POST['dltUser'])){
                
                    $user_id=$_POST['user_id'];

                    $data=[
                        'user_id'=> $user_id                    
                    ];

                    $jsonData = json_encode($data);

                    $url="http://localhost:3000/deleteUsers/".$user_id;

                    $ch=curl_init($url);
                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
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
                        echo "<script>alert('User deleted successfully !'); window.location.href='admin.php';</script>";
                    } else {
                        echo "<script>alert('Failed to delete user!'); window.location.href='admin.php';</script>";
                    }
                }else if (isset($_POST['saveEditedUser'])){
                    
                    $user_id=$_POST['user_id'];
                    $name=$_POST['name'];
                    $last_name=$_POST['last_name'];
                    $email=$_POST['email'];
                    $username=$_POST['username'];
                    $password=$_POST['password'];
                    $address=$_POST['address'];
                    $city=$_POST['city'];
                    $country=$_POST['country'];
                    $userType=$_POST['userType'];

                    $data=[
                        'user_id'=> $user_id,
                        'name'=> $name,
                        'last_name'=> $last_name,
                        'email'=> $email,
                        'username'=> $username,
                        'password'=> $password,
                        'address'=> $address,
                        'city'=> $city,
                        'country'=> $country,
                        'userType'=> $userType
                    ];

                    $jsonData = json_encode($data);

                    $url="http://localhost:3000/updateUsers/".$user_id;

                    $ch=curl_init($url);
                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
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
                        echo "<script>alert('User updated successfully !'); window.location.href='admin.php';</script>";
                    } else {
                        echo "<script>alert('Failed to update user!'); window.location.href='admin.php';</script>";
                    }
                }else if (isset($_POST['addTrainer'])){
                   
                    $name=$_POST['name'];
                    $last_name=$_POST['last_name'];
                    $email=$_POST['email'];
                    $specialty=$_POST['specialty'];
                    
                    $data=[
                        'name'=> $name,
                        'last_name'=> $last_name,
                        'email'=> $email,
                        'specialty'=> $specialty
                    ];

                    $jsonData = json_encode($data);

                    $url="http://localhost:3000/addTrainer";

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
                        echo "<script>alert('Trainer added successfully !'); window.location.href='admin.php';</script>";
                    } else {
                        echo "<script>alert('Failed to add trainer !'); window.location.href='admin.php';</script>";
                    }
                }else if (isset($_POST['dltTrainer'])){
                
                    $trainer_id=$_POST['trainer_id'];

                    $data=[
                        'trainer_id'=> $trainer_id                    
                    ];

                    $jsonData = json_encode($data);

                    $url="http://localhost:3000/deleteTrainers/".$trainer_id;

                    $ch=curl_init($url);
                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
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
                        echo "<script>alert('Trainer deleted successfully !'); window.location.href='admin.php';</script>";
                    } else {
                        echo "<script>alert('Failed to delete trainer!'); window.location.href='admin.php';</script>";
                    }
                }else if (isset($_POST['saveEditedTrainer'])){
                    
                    $trainer_id=$_POST['trainer_id'];
                    $name=$_POST['name'];
                    $last_name=$_POST['last_name'];
                    $email=$_POST['email'];
                    $specialty=$_POST['specialty'];

                    $data=[
                        'trainer_id'=> $trainer_id,
                        'name'=> $name,
                        'last_name'=> $last_name,
                        'email'=> $email,
                        'specialty'=> $specialty,
                    ];

                    $jsonData = json_encode($data);

                    $url="http://localhost:3000/updateTrainers/".$trainer_id;

                    $ch=curl_init($url);
                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
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
                        echo "<script>alert('Trainer updated successfully !'); window.location.href='admin.php';</script>";
                    } else {
                        echo "<script>alert('Failed to update trainer!'); window.location.href='admin.php';</script>";
                    }
                }else if (isset($_POST['addService'])){
                   
                    $name=$_POST['name'];
                    $description=$_POST['description'];
                    $capacity=$_POST['capacity'];
                    $trainer_trainer_id=$_POST['trainer_trainer_id'];
                    
                    $data=[
                        'name'=> $name,
                        'description'=> $description,
                        'capacity'=> $capacity,
                        'trainer_trainer_id'=> $trainer_trainer_id
                    ];

                    $jsonData = json_encode($data);

                    $url="http://localhost:3000/addService";

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
                        echo "<script>alert('Service added successfully !'); window.location.href='admin.php';</script>";
                    } else {
                        echo "<script>alert('Failed to add service !'); window.location.href='admin.php';</script>";
                    }
                }else if (isset($_POST['dltService'])){
                
                    $service_id=$_POST['service_id'];

                    $data=[
                        'service_id'=> $service_id                    
                    ];

                    $jsonData = json_encode($data);

                    $url="http://localhost:3000/deleteServices/".$service_id;

                    $ch=curl_init($url);
                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
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
                        echo "<script>alert('Service deleted successfully !'); window.location.href='admin.php';</script>";
                    } else {
                        echo "<script>alert('Failed to delete service !'); window.location.href='admin.php';</script>";
                    }
                }else if (isset($_POST['saveEditedService'])){
                    
                    $service_id=$_POST['service_id'];
                    $name=$_POST['name'];
                    $description=$_POST['description'];
                    $capacity=$_POST['capacity'];
                    $trainer_trainer_id=$_POST['trainer_trainer_id'];

                    $data=[
                        'trainer_id'=> $trainer_id,
                        'name'=> $name,
                        'description'=> $description,
                        'capacity'=> $capacity,
                        'trainer_trainer_id'=>$trainer_trainer_id
                    ];

                    $jsonData = json_encode($data);

                    $url="http://localhost:3000/updateServices/".$service_id;

                    $ch=curl_init($url);
                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
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
                        echo "<script>alert('Service updated successfully !'); window.location.href='admin.php';</script>";
                    } else {
                        echo "<script>alert('Failed to update service!'); window.location.href='admin.php';</script>";
                    }
                }else if (isset($_POST['addSchedule'])){
                    
                    $date=$_POST['date'];
                    $time=$_POST['time'];
                    $service_service_id=$_POST['service_service_id'];

                    $data=[
                        'date'=> $date,
                        'time'=> $time,
                        'service_service_id'=> $service_service_id
                    ];

                    $jsonData = json_encode($data);

                    $url="http://localhost:3000/addSchedule";

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
                        echo "<script>alert('Schedule added successfully !'); window.location.href='admin.php';</script>";
                    } else {
                        echo "<script>alert('Failed to add schedule !'); window.location.href='admin.php';</script>";
                    }
                }else if (isset($_POST['dltSchedule'])){
                
                    $schedule_id=$_POST['schedule_id'];

                    $data=[
                        'schedule_id'=> $schedule_id                    
                    ];

                    $jsonData = json_encode($data);

                    $url="http://localhost:3000/deleteSchedules/".$schedule_id;

                    $ch=curl_init($url);
                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
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
                        echo "<script>alert('Schedule deleted successfully !'); window.location.href='admin.php';</script>";
                    } else {
                        echo "<script>alert('Failed to delete Schedule !'); window.location.href='admin.php';</script>";
                    }
                }else if (isset($_POST['saveEditedSchedule'])){
                    
                    $schedule_id=$_POST['schedule_id'];
                    $date=$_POST['date'];
                    $time=$_POST['time'];
                    $service_service_id=$_POST['service_service_id'];

                    $data=[
                        'schedule_id'=> $schedule_id,
                        'date'=> $date,
                        'time'=> $time,
                        'service_service_id'=> $service_service_id
                    ];

                    $jsonData = json_encode($data);

                    $url="http://localhost:3000/updateSchedules/".$schedule_id;

                    $ch=curl_init($url);
                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
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
                        echo "<script>alert('Schedule updated successfully !'); window.location.href='admin.php';</script>";
                    } else {
                        echo "<script>alert('Failed to update schedule!'); window.location.href='admin.php';</script>";
                    }
                }else if (isset($_POST['addAnn_Offer'])){
                    
                    $content=$_POST['content'];

                    $data=[
                        'content'=> $content
                    ];

                    $jsonData = json_encode($data);

                    $url="http://localhost:3000/addAnn_Offer";

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
                        echo "<script>alert('Announcement added successfully !'); window.location.href='admin.php';</script>";
                    } else {
                        echo "<script>alert('Failed to add announcement !'); window.location.href='admin.php';</script>";
                    }
                }else if (isset($_POST['dltAnn_Offer'])){
                
                    $annOffer_id=$_POST['annOffer_id'];

                    $data=[
                        'annOffer_id'=> $annOffer_id                    
                    ];

                    $jsonData = json_encode($data);

                    $url="http://localhost:3000/deleteAnn_offers/".$annOffer_id;

                    $ch=curl_init($url);
                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
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
                        echo "<script>alert('Announcement deleted successfully !'); window.location.href='admin.php';</script>";
                    } else {
                        echo "<script>alert('Failed to delete announcement!'); window.location.href='admin.php';</script>";
                    }
                }else if (isset($_POST['saveEditedAnn_Offer'])){
                    
                    $annOffer_id=$_POST['annOffer_id'];
                    $content=$_POST['content'];

                    $data=[
                        'annOffer_id'=> $annOffer_id,
                        'content'=> $content
                    ];

                    $jsonData = json_encode($data);

                    $url="http://localhost:3000/updateAnn_Offers/".$annOffer_id;

                    $ch=curl_init($url);
                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
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
                        echo "<script>alert('Announcement updated successfully !'); window.location.href='admin.php';</script>";
                    } else {
                        echo "<script>alert('Failed to update announcement !'); window.location.href='admin.php';</script>";
                    }
                }else if (isset($_POST['rejectRequest'])){
                
                    $request_id=$_POST['request_id'];
                    $status=$_POST['status'];

                    $data=[
                        'request_id'=> $request_id,
                        'status'=> $status                 
                    ];

                    $jsonData = json_encode($data);

                    $url="http://localhost:3000/rejectRequests/".$request_id;

                    $ch=curl_init($url);
                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
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
                        echo "<script>alert('Request rejected successfully !'); window.location.href='admin.php';</script>";
                    } else {
                        echo "<script>alert('Failed to reject request!'); window.location.href='admin.php';</script>";
                    }
                }else if (isset($_POST['ACCEPT'])){

                    $request_id=$_POST['request_id'];
                    $name=$_POST['name'];
                    $last_name=$_POST['last_name'];
                    $email=$_POST['email'];
                    $username=$_POST['username'];
                    $password=$_POST['password'];
                    $address=$_POST['address'];
                    $city=$_POST['city'];
                    $country=$_POST['country'];
                    $userType=$_POST['userType'];

                    $requestdata=[
                        'request_id'=> $request_id
                    ];

                    $userData=[
                        'name'=> $name,
                        'last_name'=> $last_name,
                        'email'=> $email,
                        'username'=> $username,
                        'password'=> $password,
                        'address'=> $address,
                        'city'=> $city,
                        'country'=> $country,
                        'userType'=> $userType
                    ];

                    $requestJsonData = json_encode($requestdata);
                    $userJsonData = json_encode($userData);


                    $dltRequestUrl="http://localhost:3000/deleteRequests/".$request_id;
                    $addUserUrl="http://localhost:3000/addUser";

                    $ch1=curl_init($dltRequestUrl);
                    $ch2=curl_init($addUserUrl);
                    curl_setopt($ch1, CURLOPT_CUSTOMREQUEST, "DELETE");
                    curl_setopt($ch1, CURLOPT_POSTFIELDS, $requestJsonData);
                    curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch1, CURLOPT_HTTPHEADER, [
                        'Content-Type: application/json',
                        'Content-Length: '. strlen($requestJsonData)
                    ]);
                    
                    $ch2=curl_init($addUserUrl);
                    curl_setopt($ch2, CURLOPT_CUSTOMREQUEST, "POST");
                    curl_setopt($ch2, CURLOPT_POSTFIELDS, $userJsonData);
                    curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch2, CURLOPT_HTTPHEADER, [
                        'Content-Type: application/json',
                        'Content-Length: '. strlen($userJsonData)
                    ]);

                    $response1= curl_exec($ch1);
                    $response2= curl_exec($ch2);
                    $httpCode1= curl_getinfo($ch1, CURLINFO_HTTP_CODE);
                    $httpCode2= curl_getinfo($ch2, CURLINFO_HTTP_CODE);


                    curl_close($ch1);
                    curl_close($ch2);
                        
                    if ($httpCode1 == 200 && $httpCode2 == 200) {
                        echo "<script>alert('User accepted successfully !'); window.location.href='admin.php';</script>";
                    } else {
                        echo "<script>alert('Failed to accept user!'); window.location.href='admin.php';</script>";
                    }
                }
            }
        ?>
        <div class="adminTools">
            <div class="tab">
                <button id="defaultOpen" class="tablinks" onclick="tool(event, 'Members')">MEMBERS</button>
                <button class="tablinks" onclick="tool(event, 'Trainers')">TRAINERS</button>
                <button class="tablinks" onclick="tool(event, 'Services')">SERVICES</button>
                <button class="tablinks" onclick="tool(event, 'Schedule')">SCHEDULE</button>
                <button class="tablinks" onclick="tool(event, 'Announcements_Offers')">ANNOUNCEMENTS / OFFERS</button>
                <button class="tablinks" onclick="tool(event, 'Requests')">REQUESTS</button>
            </div>
            <div class="content">   
                <div class="tools">      
                    <div id="Members" class="tabcontent">
                        <h3>MEMBERS<button class="addBtn1">Add</button></h3>
                        <table>
                            <tr class="ths">
                                <th>ID</th>
                                <th>Name</th>
                                <th>LastName</th>
                                <th>Email</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Address</th>
                                <th>City</th>
                                <th>Country</th>
                                <th>User Type</th>
                                <th ></th>
                            </tr>
                            <?php
                                $url="http://localhost:3000/users";

                                $curl=curl_init($url);
                                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                                $response=curl_exec($curl);
                                $data=json_decode($response, true);
                                foreach ($data as $user){
                                    echo "
                                        <tr>
                                            <td>".$user['user_id']."</td>
                                            <td>".$user['name']."</td>
                                            <td>".$user['last_name']."</td>
                                            <td>".$user['email']."</td>
                                            <td>".$user['username']."</td>
                                            <td>".$user['password']."</td>
                                            <td>".$user['address']."</td>
                                            <td>".$user['city']."</td>
                                            <td>".$user['country']."</td>
                                            <td>".$user['userType']."</td>
                                            <td class='editButton'>
                                                <form action='editMember.php' method='POST'>
                                                    <input type='hidden' name='user_id' value='".$user['user_id']."'>
                                                    <button type='submit' class='editBtn1' name='editUser'>Edit</button>
                                                </form>
                                                <form action='admin.php' method='POST'>
                                                    <input type='hidden' name='user_id' value='".$user['user_id']."'>
                                                    <button type='submit' class='dltBtn' name='dltUser'><i class='fa fa-trash'></i></button>
                                                </form>    
                                            </td>
                                        </tr> ";
                                }
                            ?>
                        </table>
                    </div>
                    <div id="Trainers" class="tabcontent">
                        <h3>TRAINERS<button class="addBtn2">Add</button></h3>
                        <table>
                            <tr class="ths">
                                <th>ID</th>
                                <th>Name</th>
                                <th>LastName</th>
                                <th>Email</th>
                                <th>Specialty</th>
                                <th ></th>
                            </tr>
                            <?php
                                $url="http://localhost:3000/trainers";

                                $curl=curl_init($url);
                                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                                $response=curl_exec($curl);
                                $data=json_decode($response, true);
                                foreach ($data as $trainer){
                                    echo "
                                        <tr>
                                            <td>".$trainer['trainer_id']."</td>
                                            <td>".$trainer['name']."</td>
                                            <td>".$trainer['last_name']."</td>
                                            <td>".$trainer['email']."</td>
                                            <td>".$trainer['specialty']."</td>
                                            <td class='editButton'>
                                                <form action='editTrainer.php' method='POST'>
                                                    <input type='hidden' name='trainer_id' value='".$trainer['trainer_id']."'>
                                                    <button type='submit' class='editBtn2' name='editTrainer'>Edit</button>
                                                </form>
                                                <form action='admin.php' method='POST'>
                                                    <input type='hidden' name='trainer_id' value='".$trainer['trainer_id']."'>
                                                    <button type='submit' class='dltBtn' name='dltTrainer'><i class='fa fa-trash'></i></button>
                                                </form> 
                                            </td>
                                        </tr> ";
                                }
                            ?>
                        </table>
                    </div>
                    <div id="Services" class="tabcontent">
                        <h3>SERVICES<button class="addBtn3">Add</button></h3>
                        <table>
                            <tr class="ths">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Capacity</th>
                                <th>Trainer ID</th>
                                <th ></th>
                            </tr>
                            <?php
                                $url="http://localhost:3000/services";

                                $curl=curl_init($url);
                                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                                $response=curl_exec($curl);
                                $data=json_decode($response, true);
                                foreach ($data as $service){
                                    echo "
                                        <tr>
                                            <td>".$service['service_id']."</td>
                                            <td>".$service['name']."</td>
                                            <td>".$service['description']."</td>
                                            <td>".$service['capacity']."</td>
                                            <td>".$service['trainer_trainer_id']."</td>
                                            <td class='editButton'>
                                                <form action='editService.php' method='POST'>
                                                    <input type='hidden' name='service_id' value='".$service['service_id']."'>
                                                    <button type='submit' class='editBtn3' name='editService'>Edit</button>
                                                </form>
                                                <form action='admin.php' method='POST'>
                                                    <input type='hidden' name='service_id' value='".$service['service_id']."'>
                                                    <button type='submit' class='dltBtn' name='dltService'><i class='fa fa-trash'></i></button>
                                                </form>
                                            </td>
                                        </tr> ";
                                }
                            ?>
                        </table>
                    </div>
                    <div id="Schedule" class="tabcontent">
                        <h3>SCHEDULE<button class="addBtn4">Add</button></h3>
                        <table>
                            <tr class="ths">
                                <th>ID</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Service ID</th>
                                <th ></th>
                            </tr>
                            <?php
                                $url="http://localhost:3000/schedules";

                                $curl=curl_init($url);
                                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                                $response=curl_exec($curl);
                                $data=json_decode($response, true);
                                foreach ($data as $schedule){
                                    $date = date('m-d-Y', strtotime($schedule['date']));
                                    echo "
                                        <tr>
                                            <td>".$schedule['schedule_id']."</td>
                                            <td>".$date."</td>
                                            <td>".$schedule['time']."</td>
                                            <td>".$schedule['service_service_id']."</td>
                                            <td class='editButton'>
                                                <form action='editSchedule.php' method='POST'>
                                                    <input type='hidden' name='schedule_id' value='".$schedule['schedule_id']."'>
                                                    <button type='submit' class='editBtn4' name='editSchedule'>Edit</button>
                                                </form>
                                                <form action='admin.php' method='POST'>
                                                    <input type='hidden' name='schedule_id' value='".$schedule['schedule_id']."'>
                                                    <button type='submit' class='dltBtn' name='dltSchedule'><i class='fa fa-trash'></i></button>
                                                </form>
                                            </td>
                                        </tr> ";
                                }
                            ?> 
                        </table>
                    </div>
                    <div id="Announcements_Offers" class="tabcontent">
                        <h3>ANNOUNCEMENTS / OFFERS<button class="addBtn5">Add</button></h3>
                        <table>
                            <tr class="ths">
                                <th>#</th>
                                <th>ANNOUNCEMENT / OFFER</th>
                                <th></th>
                            </tr>
                            <?php
                                $url="http://localhost:3000/ann_offers";

                                $curl=curl_init($url);
                                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                                $response=curl_exec($curl);
                                $data=json_decode($response, true);
                                foreach ($data as $ann_offer){
                                    echo "
                                        <tr>
                                            <td>".$ann_offer['annOffer_id']."</td>
                                            <td>".$ann_offer['content']."</td>
                                            <td class='editButton'>
                                                <form action='editAnn.php' method='POST'>
                                                    <input type='hidden' name='annOffer_id' value='".$ann_offer['annOffer_id']."'>
                                                    <button type='submit' class='editBtn5' name='editAnn_Offer'>Edit</button>
                                                </form>
                                                <form action='admin.php' method='POST'>
                                                    <input type='hidden' name='annOffer_id' value='".$ann_offer['annOffer_id']."'>
                                                    <button type='submit' class='dltBtn' name='dltAnn_Offer'><i class='fa fa-trash'></i></button>
                                                </form>
                                            </td>
                                        </tr> ";
                                }
                            ?>  
                        </table>
                    </div>
                    <div id="Requests" class="tabcontent">
                        <h3>REQUESTS</h3>
                        <table>
                            <tr class="ths">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Address</th>
                                <th>City</th>
                                <th>Country</th>
                                <th>Status</th>
                                <th ></th>
                            </tr>
                            <?php
                                $url="http://localhost:3000/requests";

                                $curl=curl_init($url);
                                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                                $response=curl_exec($curl);
                                $data=json_decode($response, true);
                                foreach ($data as $request){
                                    echo "
                                        <tr>
                                            <td>".$request['request_id']."</td>
                                            <td>".$request['name']."</td>
                                            <td>".$request['last_name']."</td>
                                            <td>".$request['email']."</td>
                                            <td>".$request['username']."</td>
                                            <td>".$request['password']."</td>
                                            <td>".$request['address']."</td>
                                            <td>".$request['city']."</td>
                                            <td>".$request['country']."</td>
                                            <td>".$request['status']."</td>
                                            <td class='editButton'>
                                                <form action='accept.php' method='POST'>
                                                    <input type='hidden' name='request_id' value='".$request['request_id']."'>
                                                    <button type='submit' class='acceptBtn' name='acceptRequest'>Accept</button>
                                                </form>
                                                <form action='admin.php' method='POST'>
                                                    <input type='hidden' name='request_id' value='".$request['request_id']."'>
                                                    <input type='hidden' name='status' value='rejected'>
                                                    <button type='submit' class='dltBtn' name='rejectRequest'><i class='fa fa-trash'></i></button>
                                                </form>
                                            </td>
                                        </tr> ";
                                }
                            ?>
                        </table>
                    </div>
                </div>
            </div>  
        </div> 
        <div id="addModal1" class="modal">
            <div class="modalContent">
                <span class="closeAdd1">&times;</span>
                <h3>ADD MEMBER</h3>
                <div class="editContent">                                
                    <form action="admin.php" method="POST">                                
                        <div class="col1">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" placeholder="Name" required>
                            <label for="username">Username</label>
                            <input type="text" id="username" name="username" placeholder="Username" required>
                            <label for="email">E-mail</label>
                            <input type="email" id="email" name="email" placeholder="@gmail.com" required>
                            <label for="country">Country</label>
                            <input type="text" id="country" name="country" placeholder="Country" required>
                            <label for="userType">User Type</label>
                            <select id="userType" name="userType">
                                <option value="user">User</option>
                                <option value="admin">Admin</option>
                            </select>
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

                            <button type="submit" name="addUser">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div id="addModal2" class="modal">
            <div class="modalContent">
                <span class="closeAdd2">&times;</span>
                <h3>ADD TRAINER</h3>
                <div class="editContent">
                    <form action="admin.php" method="POST">                                
                        <div class="col1">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" placeholder="Name">
                            <label for="last_name">Last Name</label>
                            <input type="text" id="last_name" name="last_name" placeholder="Last Name">
                            <label for="email">E-mail</label>
                            <input type="email" id="email" name="email" placeholder="@gmail.com">
                            <label for="specialty">Specialty</label>
                            <input type="text" id="specialty" name="specialty" placeholder="Specialty">
                        </div>
                        <button type="submit" class="modal2AddBtn" name="addTrainer">Add</button>
                    </form>
                </div>
            </div>
        </div>
        <div id="addModal3" class="modal">
            <div class="modalContent">
                <span class="closeAdd3">&times;</span>
                <h3>ADD SERVICE</h3>
                <div class="editContent">
                    <form action="admin.php" method="POST">                                
                        <div class="col1">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" placeholder="Name">
                            <label for="trainer_trainer_id">Trainer ID</label>
                            <input type="number" id="trainer_trainer_id" name="trainer_trainer_id" min="1" step="1" placeholder="Trainer ID">
                            <label for="description">Description</label>
                            <textarea id="description" name="description" placeholder="Write description.." style="min-height:150px; max-height:150px; min-width:192px; max-width:192px"></textarea>
                        </div>
                        <div class="col2">
                            <label for="capacity">Capacity</label>
                            <input type="number" id="capacity" name="capacity" min="1" step="1" placeholder="Capacity">
                            <button type="submit" class="modal3AddBtn" name="addService">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div id="addModal4" class="modal">
            <div class="modalContent">
                <span class="closeAdd4">&times;</span>
                <h3>ADD SCHEDULE</h3>
                <div class="editContent">
                    <form action="admin.php" method="POST">                                
                    <div class="col1">
                            <label for="date">Date</label>
                            <input type="date" id="date" name="date">
                            <label for="service_service_id">Program ID</label>
                            <input type="number" id="service_service_id" name="service_service_id" min="1" step="1" placeholder="Service ID">
                        </div>
                        <div class="col2">
                            <label for="time">Time</label>
                            <input type="time" id="time" name="time">
                            <button type="submit" class="modal4AddBtn" name="addSchedule">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div id="addModal5" class="modal">
            <div class="modalContent">
                <span class="closeAdd5">&times;</span>
                <h3>ADD ANNOUNCEMENT/OFFER</h3>
                <div class="editContent">
                    <form action="admin.php" method="POST">                                
                        <div class="col1">
                            <textarea id="content" name="content" placeholder="Write something..." style="min-height:200px; max-height:200px; min-width:454px; max-width:454px"></textarea>
                            <button type="submit" class="modal5AddBtn" name="addAnn_Offer">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script>
            function tool(evt, toolName) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                  tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                  tablinks[i].className = tablinks[i].className.replace(" active", "");
                }
                document.getElementById(toolName).style.display = "block";
                evt.currentTarget.className += " active";
            }
            document.getElementById("defaultOpen").click();
        </script>
        <script>
            document.addEventListener("DOMContentLoaded", function (){
                var addmodal1 = document.getElementById("addModal1");
                var addmodal2 = document.getElementById("addModal2");
                var addmodal3 = document.getElementById("addModal3");
                var addmodal4 = document.getElementById("addModal4");
                var addmodal5 = document.getElementById("addModal5");

                var addButtons1 = document.querySelectorAll(".addBtn1");
                var addButtons2 = document.querySelectorAll(".addBtn2");
                var addButtons3 = document.querySelectorAll(".addBtn3");
                var addButtons4 = document.querySelectorAll(".addBtn4");
                var addButtons5 = document.querySelectorAll(".addBtn5");

                var addspan1 = document.getElementsByClassName("closeAdd1")[0];
                var addspan2 = document.getElementsByClassName("closeAdd2")[0];
                var addspan3 = document.getElementsByClassName("closeAdd3")[0];
                var addspan4 = document.getElementsByClassName("closeAdd4")[0];
                var addspan5 = document.getElementsByClassName("closeAdd5")[0];

                addButtons1.forEach(function(button) {
                    button.addEventListener("click", function() {
                        addModal1.style.display = "block";
                    });
                });

                addButtons2.forEach(function(button) {
                    button.addEventListener("click", function() {
                        addModal2.style.display = "block";
                    });
                });

                addButtons3.forEach(function(button) {
                    button.addEventListener("click", function() {
                        addModal3.style.display = "block";
                    });
                });

                addButtons4.forEach(function(button) {
                    button.addEventListener("click", function() {
                        addModal4.style.display = "block";
                    });
                });

                addButtons5.forEach(function(button) {
                    button.addEventListener("click", function() {
                        addModal5.style.display = "block";
                    });
                });
               
                addspan1.onclick = function() {
                    addmodal1.style.display = "none";
                };

                addspan2.onclick = function() {
                    addmodal2.style.display = "none";
                };

                addspan3.onclick = function() {
                    addmodal3.style.display = "none";
                };

                addspan4.onclick = function() {
                    addmodal4.style.display = "none";
                };

                addspan5.onclick = function() {
                    addmodal5.style.display = "none";
                };

                window.onclick = function(event) {
                    if (event.target == addmodal1) {
                        addmodal1.style.display = "none";
                    }
                    else if (event.target == addmodal2) {
                        addmodal2.style.display = "none";
                    }
                    else if (event.target == addmodal3) {
                        addmodal3.style.display = "none";
                    }
                    else if (event.target == addmodal4) {
                        addmodal4.style.display = "none";
                    }
                    else if (event.target == addmodal5) {
                        addmodal5.style.display = "none";
                    }
                };
            });
        </script>
    </body>
</html>