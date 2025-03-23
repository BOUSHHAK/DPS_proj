const express = require('express');
const router = express.Router();
const mysql = require('mysql')

const db = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    database: 'gymdb',
    port: 3306
})

db.connect((err)=>{
    if (err){
        console.error('Error connecting to MySQL: '+err.stack);
        return;
    }
    console.log('Connected to MySQL database');
})

router.use(express.json());

router.get('/users', (req,res)=>{
    const query='SELECT * FROM users';
    db.query(query, (err, results)=>{
        if (err){
            res.status(500).send(err.message);
            return;
        }
        res.json(results);
    })
})

router.get('/user/:id', (req, res) => {
    const query='SELECT * FROM users WHERE user_id=?';
    db.query(query, [req.params.id], (err, results)=>{
        if (err) {
            res.status(500).send(err.message);
            return;
        }
        res.json(results[0]);
    });
});

router.get('/trainers', (req,res)=>{
    const query='SELECT * FROM trainers';
    db.query(query, (err, results)=>{
        if (err){
            res.status(500).send(err.message);
            return;
        }
    res.json(results);
})
})
router.get('/trainer/:id', (req,res)=>{
    const query='SELECT * FROM trainers WHERE trainer_id=?';
    db.query(query, [req.params.id], (err, results)=>{
        if (err){
            res.status(500).send(err.message);
            return;
        }
        res.json(results[0]);
    });
});

router.get('/services', (req,res)=>{
    const query='SELECT * FROM services';
    db.query(query, (err, results)=>{
        if (err){
            res.status(500).send(err.message);
            return;
        }
    res.json(results);    
})
})
router.get('/service/:id', (req,res)=>{
    const query='SELECT * FROM services WHERE service_id=?';
    db.query(query, [req.params.id], (err, results)=>{
        if (err){
            res.status(500).send(err.message);
            return;
        }
        res.json(results[0]);
    });
});

router.get('/schedules', (req,res)=>{
    const query='SELECT * FROM schedules';
    db.query(query, (err, results)=>{
        if (err){
            res.status(500).send(err.message);
            return;
        }
    res.json(results);
})
})
router.get('/schedule/:id', (req,res)=>{
    const query='SELECT * FROM schedules WHERE schedule_id=?';
    db.query(query, [req.params.id], (err, results)=>{
        if (err){
            res.status(500).send(err.message);
            return;
        }
        res.json(results[0]);
    });
});

router.get('/ann_offers', (req,res)=>{
    const query='SELECT * FROM ann_offers';
    db.query(query, (err, results)=>{
        if (err){
            res.status(500).send(err.message);
            return;
        }
        res.json(results);
    })
})
router.get('/ann_offer/:id', (req,res)=>{
    const query='SELECT * FROM ann_offers WHERE annOffer_id=?';
    db.query(query, [req.params.id], (err, results)=>{
        if (err){
            res.status(500).send(err.message);
            return;
        }
        res.json(results[0]);
    });
});


router.get('/requests', (req,res)=>{
    const query='SELECT * FROM requests';
    db.query(query, (err, results)=>{
        if (err){
            res.status(500).send(err.message);
            return;
        }
    res.json(results);
})
})
router.get('/request/:id', (req,res)=>{
    const query='SELECT * FROM requests WHERE request_id=?';
    db.query(query, [req.params.id], (err, results)=>{
        if (err){
            res.status(500).send(err.message);
            return;
        }
        res.json(results[0]);
    });
});

router.post('/login', (req,res)=>{
    console.log(req.body);
    const {username, password} = req.body;
    const query='SELECT userType FROM users WHERE username=? AND password=?';
    db.query(query, [username, password], (err, results)=>{
        if (err){
            res.status(500).send(err.message);
            return;
        }  
        if(results.length > 0){
            const userType = results[0].userType;
            if (userType === 'User'){
                res.json({success:true, redirect:"user.php"});
            }else if (userType === 'Admin'){
                res.json({success:true, redirect:"admin.php"});
            }
        }else {
            const requestQuery='SELECT status FROM requests WHERE username=? AND password=?';
            db.query(requestQuery, [username, password], (err, requestResults)=>{
                if (err){
                    res.status(500).send(err.message);
                    return;
                }
                if(requestResults.length > 0){
                    const status = requestResults[0].status;
                    if (status === 'pending'){
                        res.json({success: false, message:"Your request is still on pending"});
                    }else if (status === 'rejected'){
                        res.json({success: false, message:"You have been rejected"});
                    }
                }else {
                    res.json({success: false, message:"Wrong password or username" });
                }
            });
        }
    });
});

router.post('/addUser', (req,res)=>{
    console.log(req.body);
    const {name, last_name, email, username, password, address, city, country, userType} = req.body;
    const query='INSERT INTO users (name, last_name, email, username, password, address, city, country, userType) VALUES(?,?,?,?,?,?,?,?,?)';
    db.query(query, [name, last_name, email, username, password, address, city, country, userType], (err, results)=>{
        if (err){
            res.status(500).send(err.message);
            return;
        }  
        res.json({message: 'User added successfully'});
    });
});

router.post('/addTrainer', (req,res)=>{
    console.log(req.body);
    const {name, last_name, email, specialty} = req.body;
    const query='INSERT INTO trainers (name, last_name, email, specialty) VALUES(?,?,?,?)';
    db.query(query, [name, last_name, email, specialty], (err, results)=>{
        if (err){
            res.status(500).send(err.message);
            return;
        }  
        res.json({message: 'Trainer added successfully'});
    });
});

router.post('/addService', (req,res)=>{
    console.log(req.body);
    const {name, description, capacity, trainer_trainer_id} = req.body;
    const query='INSERT INTO services (name, description, capacity, trainer_trainer_id) VALUES(?,?,?,?)';
    db.query(query, [name, description, capacity, trainer_trainer_id], (err, results)=>{
        if (err){
            res.status(500).send(err.message);
            return;
        }  
        res.json({message: 'Service added successfully'});
    });
});

router.post('/addSchedule', (req,res)=>{
    console.log(req.body);
    const {date, time, service_service_id} = req.body;
    const query='INSERT INTO schedules (date, time, service_service_id) VALUES(?,?,?)';
    db.query(query, [date, time, service_service_id], (err, results)=>{
        if (err){
            res.status(500).send(err.message);
            return;
        }  
        res.json({message: 'Schedule added successfully'});
    });
});

router.post('/addRequest', (req,res)=>{
    console.log(req.body);
    const {name, last_name, email, username, password, address, city, country, status} = req.body;
    const query='INSERT INTO requests (name, last_name, email, username, password, address, city, country, status) VALUES(?,?,?,?,?,?,?,?,?)';
    db.query(query, [name, last_name, email, username, password, address, city, country, status], (err, results)=>{
        if (err){
            res.status(500).send(err.message);
            return;
        }  
        res.json({message: 'Request added successfully'});
    });
});

router.post('/addAnn_Offer', (req,res)=>{
    console.log(req.body);
    const {content} = req.body;
    const query='INSERT INTO ann_offers (content) VALUES(?)';
    db.query(query, [content], (err, results)=>{
        if (err){
            res.status(500).send(err.message);
            return;
        }  
        res.json({message: 'Announcement added successfully'});
    });
});

router.put('/updateUsers/:id', (req,res)=>{
    const {name, last_name, email, username, password, address, city, country, userType} = req.body;
    const query='UPDATE users SET name=?, last_name=?, email=?, username=?, password=?, address=?, city=?, country=?, userType=? WHERE user_id=?';
    db.query(query, [name, last_name, email, username, password, address, city, country, userType, req.params.id], (err, results)=>{
        if (err){
            res.status(500).send(err.message);
            return;
        }
        res.json({message: 'User updated successfully'});    
    })
})

router.put('/updateTrainers/:id', (req,res)=>{
    const {name, last_name, email, specialty} = req.body;
    const query='UPDATE trainers SET name=?, last_name=?, email=?, specialty=? WHERE trainer_id=?';
    db.query(query, [name, last_name, email, specialty, req.params.id], (err, results)=>{
        if (err){
            res.status(500).send(err.message);
            return;
        }
        res.json({message: 'Trainer updated successfully'});    
    })
})

router.put('/updateServices/:id', (req,res)=>{
    const {name, description, capacity, trainer_trainer_id} = req.body;
    const query='UPDATE services SET name=?, description=?, capacity=?, trainer_trainer_id=? WHERE service_id=?';
    db.query(query, [name, description, capacity, trainer_trainer_id, req.params.id], (err, results)=>{
        if (err){
            res.status(500).send(err.message);
            return;
        }
        res.json({message: 'Service updated successfully'});    
    })
})

router.put('/updateSchedules/:id', (req,res)=>{
    const {date, time, service_service_id} = req.body;
    const query='UPDATE schedules SET date=?, time=?, service_service_id=? WHERE schedule_id=?';
    db.query(query, [date, time, service_service_id, req.params.id], (err, results)=>{
        if (err){
            res.status(500).send(err.message);
            return;
        }
        res.json({message: 'Schedule updated successfully'});    
    })
})

router.put('/updateAnn_Offers/:id', (req,res)=>{
    const {content} = req.body;
    const query='UPDATE ann_offers SET content=? WHERE annOffer_id=?';
    db.query(query, [content, req.params.id], (err, results)=>{
        if (err){
            res.status(500).send(err.message);
            return;
        }
        res.json({message: 'Announcement updated successfully'});    
    })
})

router.put('/rejectRequests/:id', (req,res)=>{
    const {status} = req.body;
    const query='UPDATE requests SET status=? WHERE request_id=?';
    db.query(query, [status, req.params.id], (err, results)=>{
        if (err){
            res.status(500).send(err.message);
            return;
        }
        res.json({message: 'Request rejected successfully'});    
    })
})

router.delete('/deleteUsers/:id', (req,res)=>{
    const query='DELETE FROM users WHERE user_id=?';
    db.query(query, [req.params.id], (err, results)=>{
        if (err){
            res.status(500).send(err.message);
            return;
        }
        res.json({message: 'User deleted successfully'});  
    })
})

router.delete('/deleteTrainers/:id', (req,res)=>{
    const query='DELETE FROM trainers WHERE trainer_id=?';
    db.query(query, [req.params.id], (err, results)=>{
        if (err){
            res.status(500).send(err.message);
            return;
        }
        res.json({message: 'Trainer deleted successfully'});  
    })
})

router.delete('/deleteServices/:id', (req,res)=>{
    const query='DELETE FROM services WHERE service_id=?';
    db.query(query, [req.params.id], (err, results)=>{
        if (err){
            res.status(500).send(err.message);
            return;
        }
        res.json({message: 'Service deleted successfully'});  
    })
})

router.delete('/deleteSchedules/:id', (req,res)=>{
    const query='DELETE FROM schedules WHERE schedule_id=?';
    db.query(query, [req.params.id], (err, results)=>{
        if (err){
            res.status(500).send(err.message);
            return;
        }
        res.json({message: 'Schedule deleted successfully'});  
    })
})

router.delete('/deleteAnn_offers/:id', (req,res)=>{
    const query='DELETE FROM ann_offers WHERE annOffer_id=?';
    db.query(query, [req.params.id], (err, results)=>{
        if (err){
            res.status(500).send(err.message);
            return;
        }
        res.json({message: 'Announcement deleted successfully'});  
    })
})

router.delete('/deleteRequests/:id', (req,res)=>{
    const query='DELETE FROM requests WHERE request_id=?';
    db.query(query, [req.params.id], (err, results)=>{
        if (err){
            res.status(500).send(err.message);
            return;
        }
        res.json({message: 'Request deleted successfully'});  
    })
})

module.exports = router;