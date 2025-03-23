-- SQLINES DEMO *** le SQL Developer Data Modeler 24.3.1.351.0831
-- SQLINES DEMO *** -02-14 03:47:11 EET
-- SQLINES DEMO *** le Database 12c
-- SQLINES DEMO *** le Database 12c

DROP TABLE IF EXISTS `ann_offers`;

DROP TABLE IF EXISTS `services`;

DROP TABLE IF EXISTS `requests`;

DROP TABLE IF EXISTS `reservations`;

DROP TABLE IF EXISTS `schedules`;

DROP TABLE IF EXISTS `trainers`;

DROP TABLE IF EXISTS `users`;

-- SQLINES DEMO *** no DDL - MDSYS.SDO_GEOMETRY

-- SQLINES DEMO *** no DDL - XMLTYPE

-- SQLINES FOR EVALUATION USE ONLY (14 DAYS)
CREATE TABLE `ann_offers`
    ( 
        `annOffer_id`  INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY, 
        `content`       TEXT NOT NULL
    ) 
;

INSERT INTO `ann_offers` (`content`) VALUES
('<strong>OFFER!</strong> Indicates a dangeroussndicates a dangerous orhdthtdhtdhththdhtdh potentially negative action.'),
('<strong>ANNOUNCEMENT!</strong> Indicates a dangeroussndicates a dangerous orhdthtdhtdhththdhtdh potentially negative action.'),
('<strong>ANNOUNCEMENT!</strong> Indicates a dangeroussndicates a dangerous orhdthtdhtdhththdhtdh potentially negative action.'),
('<strong>OFFER!</strong> Indicates a dangeroussndicates a dangerous orhdthtdhtdhththdhtdh potentially negative action.'),
('<strong>OFFER!</strong> Indicates a dangeroussndicates a dangerous orhdthtdhtdhththdhtdh potentially negative action.'),
('<strong>ANNOUNCEMENT!</strong> Indicates a dangeroussndicates a dangerous orhdthtdhtdhththdhtdh potentially negative action.'),
('<strong>ANNOUNCEMENT!</strong> Indicates a dangeroussndicates a dangerous orhdthtdhtdhththdhtdh potentially negative action.'),
('<strong>ANNOUNCEMENT!</strong> Indicates a dangeroussndicates a dangerous orhdthtdhtdhththdhtdh potentially negative action.');

CREATE TABLE `services` 
    ( 
        `service_id`         INTEGER  NOT NULL AUTO_INCREMENT PRIMARY KEY, 
        `name`               VARCHAR (300)  NOT NULL , 
        `description`        TEXT NOT NULL , 
        `capacity`           INTEGER NOT NULL ,
        `trainer_trainer_id` INTEGER  NOT NULL
    ) 
;

ALTER TABLE `services` 
    ADD KEY `service_trainer_fk` (`trainer_trainer_id`);

INSERT INTO `services` (`name`, `description`, `capacity`, `trainer_trainer_id`) VALUES
('PERSONAL','Phasellus in tristique est, vitae varius metus. Pellentesque iaculis vel metus vel scelerisque. 
                            Nulla interdum metus a nulla congue, non vehicula est varius. Nullam metus nulla, dignissim 
                            ac pharetra vitae, consectetur sit amet risus.  egestas nisi eu erat dignissim
                            Phasellus i tristique est, vitae varius metus. Pellentesque iaculis vel metus vel scelerisque. 
                            Nulla interdum metus a nulla congue, non vehicula est varius. Nullam metus nulla, dignissim 
                            ac pharetra vitae, consectetur sit amet risus.  egestas nisi eu erat dignissim
                            Phasellus i tristique est, vitae varius metus. Pellentesque iaculis vel metus vel scelerisque. 
                            Nulla interdum metus a nulla congue, non vehicula est varius. Nullam metus nulla, dignissim 
                            ac pharetra vitae, consectetur sit amet risus. I egestas nisi eu erat dignissim
                            Phasellus i tristique est, vitae varius metus. Pellentesque iaculis vel metus vel scelerisque. 
                            Nulla interdum metus a nulla congue, non vehicula est varius. Nullam metus nulla, dignissim 
                            ac pharetra vitae, consectetur sit amet risus. Intege egestas nisi eu erat dignissim
                            Phasellus i tristique est, vitae varius metus. Pellentesque iaculis vel metus vel scelerisque. 
                            Nulla interdum metus a nulla congue, non vehicula est varius. Nullam metus nulla, dignissim 
                            ac pharetra vitae, consectetur sit amet risus. Intege egestas nisi eu erat dignissim ',1 ,1),
('GROUP LESSONS','Donec semper posuere mollis. Fusce et nulla efficitur, lobortis urna sit amet, sodales ante. 
                            Nulla et ex eget leo iaculis congue ac eu orci. Nulla quis ipsum odio. Etiam et nunc tortor.
                             Duis mattis erat lorem, id egestas sapien varius dictum. Quisque vel dui sit amet nibh gravida
                             Donec semper posuere mollis. Fusce et nulla efficitur, lobortis urna sit amet, sodales ante. 
                             Nulla et ex eget leo iaculis congue ac eu orci. Nulla quis ipsum odio. Etiam et nunc tortor.
                              Duis mattis erat lorem, id egestas sapien varius dictum. Quisque vel dui sit amet nibh gravida
                              Donec semper posuere mollis. Fusce et nulla efficitur, lobortis urna sit amet, sodales ante. 
                              Nulla et ex eget leo iaculis congue ac eu orci. Nulla quis ipsum odio. Etiam et nunc tortor.
                               Duis mattis erat lorem, id egestas sapien varius dictum. Quisque vel dui sit amet nibh gravida
                               Donec semper posuere mollis. Fusce et nulla efficitur, lobortis urna sit amet, sodales ante. 
                               Nulla et ex eget leo iaculis congue ac eu orci. Nulla quis ipsum odio. Etiam et nunc tortor.
                                Duis mattis erat lorem, id egestas sapien varius dictum. Quisque vel dui sit amet nibh gravida
                                Donec semper posuere mollis. Fusce et nulla efficitur, lobortis urna sit amet, sodales ante. 
                                Nulla et ex eget leo iaculis congue ac eu orci. Nulla quis ipsum odio. Etiam et nunc tortor.
                                 Duis mattis erat lorem, id egestas sapien varius dictum. Quisque vel dui sit amet nibh gravida
                                 Donec semper posuere mollis. Fusce et nulla efficitur, lobortis urna sit amet, sodales ante. 
                                 Nulla et ex eget leo iaculis congue ac eu orci. Nulla quis ipsum odio. Etiam et nunc tortor.
                                  Duis mattis erat lorem, id egestas sapien varius dictum. Quisque vel dui sit amet nibh gravida' ,15 ,2),
('YOGA','Vivamus arcu ante, dapibus semper porta in, posuere id ante. Maecenas sed dapibus enim. Nunc 
                            commodo leo nec quam rutrum consequat. Ut elementum maximus elementum. Nunc neque leo, venenatis
                             et sapien ac, pretium vehicula turpis. Nam fermentum sit
                             Vivamus arcu ante, dapibus semper porta in, posuere id ante. Maecenas sed dapibus enim. Nunc 
                                commodo leo nec quam rutrum consequat. Ut elementum maximus elementum. Nunc neque leo, venenatis
                                 et sapien ac, pretium vehicula turpis. Nam fermentum sit
                                 Vivamus arcu ante, dapibus semper porta in, posuere id ante. Maecenas sed dapibus enim. Nunc 
                                commodo leo nec quam rutrum consequat. Ut elementum maximus elementum. Nunc neque leo, venenatis
                                 et sapien ac, pretium vehicula turpis. Nam fermentum sit
                                 Vivamus arcu ante, dapibus semper porta in, posuere id ante. Maecenas sed dapibus enim. Nunc 
                                commodo leo nec quam rutrum consequat. Ut elementum maximus elementum. Nunc neque leo, venenatis
                                 et sapien ac, pretium vehicula turpis. Nam fermentum sit
                                 Vivamus arcu ante, dapibus semper porta in, posuere id ante. Maecenas sed dapibus enim. Nunc 
                                commodo leo nec quam rutrum consequat. Ut elementum maximus elementum. Nunc neque leo, venenatis
                                 et sapien ac, pretium vehicula turpis. Nam fermentum sit
                                 Vivamus arcu ante, dapibus semper porta in, posuere id ante. Maecenas sed dapibus enim. Nunc 
                                commodo leo nec quam rutrum consequat. Ut elementum maximus elementum. Nunc neque leo, venenatis
                                 et sapien ac, pretium vehicula turpis. Nam fermentum sit
                                 Vivamus arcu ante, dapibus semper porta in, posuere id ante. Maecenas sed dapibus enim. Nunc 
                                commodo leo nec quam rutrum consequat. Ut elementum maximus elementum. Nunc neque leo, venenatis
                                 et sapien ac, pretium vehicula turpis. Nam fermentum sit' ,10 ,2),
('PILATES','amet lectus a cursus. Donec malesuada imperdiet ornare. Vivamus efficitur luctus nisi, nec venenatis 
                                nulla volutpat eu. Quisque elementum lacus magna, vitae interdum dolor ultrices ac. Pellentesque eu
                                 mattis urna. Pellentesque cursus egestas ligula eget posuere.
                                 amet lectus a cursus. Donec malesuada imperdiet ornare. Vivamus efficitur luctus nisi, nec venenatis 
                                nulla volutpat eu. Quisque elementum lacus magna, vitae interdum dolor ultrices ac. Pellentesque eu
                                 mattis urna. Pellentesque cursus egestas ligula eget posuere.
                                 amet lectus a cursus. Donec malesuada imperdiet ornare. Vivamus efficitur luctus nisi, nec venenatis 
                                nulla volutpat eu. Quisque elementum lacus magna, vitae interdum dolor ultrices ac. Pellentesque eu
                                 mattis urna. Pellentesque cursus egestas ligula eget posuere.
                                 amet lectus a cursus. Donec malesuada imperdiet ornare. Vivamus efficitur luctus nisi, nec venenatis 
                                nulla volutpat eu. Quisque elementum lacus magna, vitae interdum dolor ultrices ac. Pellentesque eu
                                 mattis urna. Pellentesque cursus egestas ligula eget posuere.
                                 amet lectus a cursus. Donec malesuada imperdiet ornare. Vivamus efficitur luctus nisi, nec venenatis 
                                nulla volutpat eu. Quisque elementum lacus magna, vitae interdum dolor ultrices ac. Pellentesque eu
                                 mattis urna. Pellentesque cursus egestas ligula eget posuere.
                                 amet lectus a cursus. Donec malesuada imperdiet ornare. Vivamus efficitur luctus nisi, nec venenatis 
                                nulla volutpat eu. Quisque elementum lacus magna, vitae interdum dolor ultrices ac. Pellentesque eu
                                 mattis urna. Pellentesque cursus egestas ligula eget posuere.
                                 amet lectus a cursus. Donec malesuada imperdiet ornare. Vivamus efficitur luctus nisi, nec venenatis 
                                nulla volutpat eu. Quisque elementum lacus magna, vitae interdum dolor ultrices ac. Pellentesque eu
                                 mattis urna. Pellentesque cursus egestas ligula eget posuere.' ,7 ,3),
('BODYBUILDING','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed molestie ligula ac urna ullamcorper, 
                                vel ultrices lectus euismod. Vivamus non sollicitudin libero, sit amet posuere neque. Mauris magna
                                 orci, scelerisque pretium efficitur non, gravida ac velit. Donec sit amet leo eget
                                 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed molestie ligula ac urna ullamcorper, 
                                vel ultrices lectus euismod. Vivamus non sollicitudin libero, sit amet posuere neque. Mauris magna
                                 orci, scelerisque pretium efficitur non, gravida ac velit. Donec sit amet leo eget
                                 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed molestie ligula ac urna ullamcorper, 
                                vel ultrices lectus euismod. Vivamus non sollicitudin libero, sit amet posuere neque. Mauris magna
                                 orci, scelerisque pretium efficitur non, gravida ac velit. Donec sit amet leo eget
                                 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed molestie ligula ac urna ullamcorper, 
                                vel ultrices lectus euismod. Vivamus non sollicitudin libero, sit amet posuere neque. Mauris magna
                                 orci, scelerisque pretium efficitur non, gravida ac velit. Donec sit amet leo eget
                                 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed molestie ligula ac urna ullamcorper, 
                                vel ultrices lectus euismod. Vivamus non sollicitudin libero, sit amet posuere neque. Mauris magna
                                 orci, scelerisque pretium efficitur non, gravida ac velit. Donec sit amet leo eget
                                 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed molestie ligula ac urna ullamcorper, 
                                vel ultrices lectus euismod. Vivamus non sollicitudin libero, sit amet posuere neque. Mauris magna
                                 orci, scelerisque pretium efficitur non, gravida ac velit. Donec sit amet leo eget' ,5 ,4),
('MASSAGE' ,'est rhoncus consequat. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per 
                                inceptos himenaeos. Etiam sed luctus magna. Vivamus dui diam, posuere vel lobortis lobortis, 
                                lacinia id metus. Proin id metus nec quam iaculis commodo.
                                est rhoncus consequat. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per 
                                inceptos himenaeos. Etiam sed luctus magna. Vivamus dui diam, posuere vel lobortis lobortis, 
                                lacinia id metus. Proin id metus nec quam iaculis commodo.
                                est rhoncus consequat. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per 
                                inceptos himenaeos. Etiam sed luctus magna. Vivamus dui diam, posuere vel lobortis lobortis, 
                                lacinia id metus. Proin id metus nec quam iaculis commodo.
                                est rhoncus consequat. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per 
                                inceptos himenaeos. Etiam sed luctus magna. Vivamus dui diam, posuere vel lobortis lobortis, 
                                lacinia id metus. Proin id metus nec quam iaculis commodo.
                                est rhoncus consequat. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per 
                                inceptos himenaeos. Etiam sed luctus magna. Vivamus dui diam, posuere vel lobortis lobortis, 
                                lacinia id metus. Proin id metus nec quam iaculis commodo.
                                est rhoncus consequat. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per 
                                inceptos himenaeos. Etiam sed luctus magna. Vivamus dui diam, posuere vel lobortis lobortis, 
                                lacinia id metus. Proin id metus nec quam iaculis commodo.' ,3 ,5 ),
('SPECIAL PROGRAMS','erat. Duis gravida tristique sem, at posuere nibh vulputate a. In consectetur quam a neque elementum 
                                condimentum. Suspendisse tellus lacus, molestie et varius ut, dapibus a nibh. Nulla lacinia aliquet
                                 quam at rutrum. Phasellus nec elementum tellus. Sed quis sapien velit. Ut
                                 erat. Duis gravida tristique sem, at posuere nibh vulputate a. In consectetur quam a neque elementum 
                                condimentum. Suspendisse tellus lacus, molestie et varius ut, dapibus a nibh. Nulla lacinia aliquet
                                 quam at rutrum. Phasellus nec elementum tellus. Sed quis sapien velit. Ut
                                 erat. Duis gravida tristique sem, at posuere nibh vulputate a. In consectetur quam a neque elementum 
                                condimentum. Suspendisse tellus lacus, molestie et varius ut, dapibus a nibh. Nulla lacinia aliquet
                                 quam at rutrum. Phasellus nec elementum tellus. Sed quis sapien velit. Ut
                                 erat. Duis gravida tristique sem, at posuere nibh vulputate a. In consectetur quam a neque elementum 
                                condimentum. Suspendisse tellus lacus, molestie et varius ut, dapibus a nibh. Nulla lacinia aliquet
                                 quam at rutrum. Phasellus nec elementum tellus. Sed quis sapien velit. Ut
                                 erat. Duis gravida tristique sem, at posuere nibh vulputate a. In consectetur quam a neque elementum 
                                condimentum. Suspendisse tellus lacus, molestie et varius ut, dapibus a nibh. Nulla lacinia aliquet
                                 quam at rutrum. Phasellus nec elementum tellus. Sed quis sapien velit. Ut
                                 erat. Duis gravida tristique sem, at posuere nibh vulputate a. In consectetur quam a neque elementum 
                                condimentum. Suspendisse tellus lacus, molestie et varius ut, dapibus a nibh. Nulla lacinia aliquet
                                 quam at rutrum. Phasellus nec elementum tellus. Sed quis sapien velit. Ut' ,6 ,1 ),
('ONLINE PROGRAM' ,'vehicula est varius. Nullam metus nulla, dignissim ac pharetra vitae, consectetur sit amet risus. 
                                Integer egestas nisi eu erat dignissim vehicula. Donec aliquet elit id pulvinar ornare. Morbi 
                                lorem orci, blandit eu convallis a, consectetur ut nibh. Quisque semper, tellus ac
                                vehicula est varius. Nullam metus nulla, dignissim ac pharetra vitae, consectetur sit amet risus. 
                                Integer egestas nisi eu erat dignissim vehicula. Donec aliquet elit id pulvinar ornare. Morbi 
                                lorem orci, blandit eu convallis a, consectetur ut nibh. Quisque semper, tellus ac
                                vehicula est varius. Nullam metus nulla, dignissim ac pharetra vitae, consectetur sit amet risus. 
                                Integer egestas nisi eu erat dignissim vehicula. Donec aliquet elit id pulvinar ornare. Morbi 
                                lorem orci, blandit eu convallis a, consectetur ut nibh. Quisque semper, tellus ac
                                vehicula est varius. Nullam metus nulla, dignissim ac pharetra vitae, consectetur sit amet risus. 
                                Integer egestas nisi eu erat dignissim vehicula. Donec aliquet elit id pulvinar ornare. Morbi 
                                lorem orci, blandit eu convallis a, consectetur ut nibh. Quisque semper, tellus ac
                                vehicula est varius. Nullam metus nulla, dignissim ac pharetra vitae, consectetur sit amet risus. 
                                Integer egestas nisi eu erat dignissim vehicula. Donec aliquet elit id pulvinar ornare. Morbi 
                                lorem orci, blandit eu convallis a, consectetur ut nibh. Quisque semper, tellus ac' ,50 ,6 );


CREATE TABLE `requests`
    ( 
        `request_id`  INTEGER  NOT NULL AUTO_INCREMENT PRIMARY KEY, 
        `name`        VARCHAR (300) NOT NULL , 
        `last_name`   VARCHAR (300) NOT NULL , 
        `email`       VARCHAR (300) NOT NULL , 
        `username`    VARCHAR (300) NOT NULL , 
        `password`    VARCHAR (300) NOT NULL , 
        `address`     VARCHAR (300) NOT NULL , 
        `city`        VARCHAR (300) NOT NULL , 
        `country`     VARCHAR (300) NOT NULL , 
        `status`      VARCHAR (300) NOT NULL
    ) 
;

INSERT INTO `requests` (`name`, `last_name`, `email`, `username`, `password`, `address`, `city`, `country`, `status`) VALUES
('newName1', 'newLastName1', 'newEmail1@gmail.com', 'newUsername1', 'newPassword1', 'newAddress1', 'newCity1', 'newCountry1', 'pending'),
('newName2', 'newLastName2', 'newEmail2@gmail.com', 'newUsername2', 'newPassword2', 'newAddress2', 'newCity2', 'newCountry2', 'pending'),
('newName3', 'newLastName3', 'newEmail3@gmail.com', 'newUsername3', 'newPassword3', 'newAddress3', 'newCity3', 'newCountry3', 'pending'),
('newName4', 'newLastName4', 'newEmail4@gmail.com', 'newUsername4', 'newPassword4', 'newAddress4', 'newCity4', 'newCountry4', 'pending'),
('newName5', 'newLastName5', 'newEmail5@gmail.com', 'newUsername5', 'newPassword5', 'newAddress5', 'newCity5', 'newCountry5', 'pending'),
('newName6', 'newLastName6', 'newEmail6@gmail.com', 'newUsername6', 'newPassword6', 'newAddress6', 'newCity6', 'newCountry6', 'pending'),
('newName7', 'newLastName7', 'newEmail7@gmail.com', 'newUsername7', 'newPassword7', 'newAddress7', 'newCity7', 'newCountry7', 'pending'),
('newName8', 'newLastName8', 'newEmail8@gmail.com', 'newUsername8', 'newPassword8', 'newAddress8', 'newCity8', 'newCountry8', 'pending'),
('newName9', 'newLastName9', 'newEmail9@gmail.com', 'newUsername9', 'newPassword9', 'newAddress9', 'newCity9', 'newCountry9', 'pending');

CREATE TABLE `reservations`
    ( 
        `reservation_id`       INTEGER  NOT NULL AUTO_INCREMENT PRIMARY KEY,
        `status`               VARCHAR (300) NOT NULL , 
        `cancellation`         DATETIME NOT NULL , 
        `user_user_id`         INTEGER  NOT NULL ,
        `service_service_id`   INTEGER  NOT NULL ,
        `schedule_schedule_id` INTEGER  NOT NULL
    ) 
;

ALTER TABLE `reservations` 
    ADD KEY `reservation_user_fk` (`user_user_id`),
    ADD KEY `reservation_service_fk` (`service_service_id`),
    ADD KEY `reservation_schedule_fk` (`schedule_schedule_id`);

CREATE TABLE `schedules` 
    ( 
        `schedule_id`        INTEGER  NOT NULL AUTO_INCREMENT PRIMARY KEY, 
        `date`               date NOT NULL ,
        `time`               time NOT NULL ,
        `service_service_id` INTEGER  NOT NULL
    ) 
;

ALTER TABLE `schedules` 
    ADD KEY `schedule_service_fk` (`service_service_id`);

INSERT INTO `schedules` (`date` ,`time` ,`service_service_id`) VALUES
('2025-02-27','09:30:00' ,1),
('2025-02-28','10:30:00' ,2),
('2025-02-29','11:30:00' ,3),
('2025-04-20','12:30:00' ,4),
('2025-04-21','13:30:00' ,5),
('2025-04-22','14:30:00' ,6),
('2025-06-23','15:30:00' ,2),
('2025-06-24','16:30:00' ,1),
('2025-06-25','17:30:00' ,4),
('2025-06-26','18:30:00' ,3),
('2025-06-27','19:30:00' ,5);



CREATE TABLE `trainers` 
    ( 
        `trainer_id`         INTEGER  NOT NULL AUTO_INCREMENT PRIMARY KEY, 
        `name`               VARCHAR (300) NOT NULL , 
        `last_name`          VARCHAR (300) NOT NULL , 
        `email`              VARCHAR (300) NOT NULL , 
        `specialty`          VARCHAR (300) NOT NULL
    ) 
;

INSERT INTO `trainers` (`name`, `last_name`, `email`, `specialty`) VALUES
('trainer1' ,'lastName1' ,'trainer1@gmail.com' ,'specialty' ),
('trainer2' ,'lastName2' ,'trainer2@gmail.com' ,'specialty' ),
('trainer3' ,'lastName3' ,'trainer3@gmail.com' ,'specialty' ),
('trainer4' ,'lastName4' ,'trainer4@gmail.com' ,'specialty' ),
('trainer5' ,'lastName5' ,'trainer5@gmail.com' ,'specialty' ),
('trainer6' ,'lastName6' ,'trainer6@gmail.com' ,'specialty' ),
('trainer7' ,'lastName7' ,'trainer7@gmail.com' ,'specialty' ),
('trainer8' ,'lastName8' ,'trainer8@gmail.com' ,'specialty' ),
('trainer9' ,'lastName9' ,'trainer9@gmail.com' ,'specialty' );

CREATE TABLE `users` 
    ( 
        `user_id`   INTEGER AUTO_INCREMENT PRIMARY KEY, 
        `name`      VARCHAR (300) NOT NULL , 
        `last_name` VARCHAR (300) NOT NULL , 
        `email`     VARCHAR (300) NOT NULL UNIQUE, 
        `username`  VARCHAR (300) NOT NULL UNIQUE, 
        `password`  VARCHAR (300) NOT NULL , 
        `address`   VARCHAR (300) NOT NULL , 
        `city`      VARCHAR (300) NOT NULL , 
        `country`   VARCHAR (300) NOT NULL , 
        `userType`  ENUM('User', 'Admin') DEFAULT 'User'
    ) 
;

INSERT INTO `users` (`name`, `last_name`, `email`, `username`, `password`, `address`, `city`, `country`, `userType`) VALUES
('admin' ,'admin' ,'admin@gmail.com' ,'admin' ,'admin' ,'admin' ,'admin' ,'admin' ,'admin' ),
('test' ,'test' ,'test@gmail.com' ,'test' ,'test' ,'test' ,'test' ,'test' ,'User' ),
('user1' ,'lastName1' ,'user1@gmail.com' ,'username1' ,'password1' ,'address1' ,'city1' ,'country1' ,'User' ),
('user2' ,'lastName2' ,'user2@gmail.com' ,'username2' ,'password2' ,'address2' ,'city2' ,'country2' ,'User' ),
('user3' ,'lastName3' ,'user3@gmail.com' ,'username3' ,'password3' ,'address3' ,'city3' ,'country3' ,'User' ),
('user4' ,'lastName4' ,'user4@gmail.com' ,'username4' ,'password4' ,'address4' ,'city4' ,'country4' ,'User' ),
('user5' ,'lastName5' ,'user5@gmail.com' ,'username5' ,'password5' ,'address5' ,'city5' ,'country5' ,'User' ),
('user6' ,'lastName6' ,'user6@gmail.com' ,'username6' ,'password6' ,'address6' ,'city6' ,'country6' ,'User' ),
('user7' ,'lastName7' ,'user7@gmail.com' ,'username7' ,'password7' ,'address7' ,'city7' ,'country7' ,'User' ),
('user8' ,'lastName8' ,'user8@gmail.com' ,'username8' ,'password8' ,'address8' ,'city8' ,'country8' ,'User' ),
('user9' ,'lastName9' ,'user9@gmail.com' ,'username9' ,'password9' ,'address9' ,'city9' ,'country9' ,'User' ),
('user10' ,'lastName10' ,'user10@gmail.com' ,'username10' ,'password10' ,'address10' ,'city10' ,'country10' ,'User' ),
('user11' ,'lastName11' ,'user11@gmail.com' ,'username11' ,'password11' ,'address11' ,'city11' ,'country11' ,'User' );


ALTER TABLE `services` 
    ADD CONSTRAINT `service_trainer_fk` FOREIGN KEY ( `trainer_trainer_id` ) REFERENCES `trainers` ( `trainer_id` );

ALTER TABLE `reservations` 
    ADD CONSTRAINT `reservation_service_fk` FOREIGN KEY ( `service_service_id` ) REFERENCES `services` ( `service_id` ),  
    ADD CONSTRAINT `reservation_schedule_fk` FOREIGN KEY ( `schedule_schedule_id` ) REFERENCES `schedules` ( `schedule_id` ),
    ADD CONSTRAINT `reservation_user_fk` FOREIGN KEY ( `user_user_id`) REFERENCES `users` ( `user_id` );

ALTER TABLE `schedules` ADD CONSTRAINT `schedule_service_fk` FOREIGN KEY ( `service_service_id` ) REFERENCES `services` ( `service_id`);

-- SQLINES DEMO *** per Data Modeler Summary Report: 
-- 
-- SQLINES DEMO ***                         7
-- SQLINES DEMO ***                         0
-- SQLINES DEMO ***                        16
-- SQLINES DEMO ***                         0
-- SQLINES DEMO ***                         0
-- SQLINES DEMO ***                         0
-- SQLINES DEMO *** DY                      0
-- SQLINES DEMO ***                         0
-- SQLINES DEMO ***                         0
-- SQLINES DEMO ***                         0
-- SQLINES DEMO ***                         0
-- SQLINES DEMO ***  TYPE                   0
-- SQLINES DEMO ***  TYPE                   0
-- SQLINES DEMO ***  TYPE BODY              0
-- SQLINES DEMO ***                         0
-- SQLINES DEMO ***                         0
-- SQLINES DEMO ***                         0
-- SQLINES DEMO ***                         0
-- SQLINES DEMO ***                         0
-- SQLINES DEMO ***                         0
-- SQLINES DEMO ***                         0
-- SQLINES DEMO *** EGMENT                  0
-- SQLINES DEMO ***                         0
-- SQLINES DEMO *** ED VIEW                 0
-- SQLINES DEMO *** ED VIEW LOG             0
-- SQLINES DEMO ***                         0
-- SQLINES DEMO ***                         0
-- SQLINES DEMO ***                         0
-- 
-- SQLINES DEMO ***                         0
-- SQLINES DEMO ***                         0
-- 
-- SQLINES DEMO ***                         0
-- SQLINES DEMO ***                         0
-- 
-- SQLINES DEMO ***                         0
-- SQLINES DEMO *** A                       0
-- SQLINES DEMO *** T                       0
-- 
-- SQLINES DEMO ***                         1
-- SQLINES DEMO ***                         0