// import StudentController
const StudenController = require("../controllers/StudentController")
// import express
const express = require("express");
//membuat boject route
const router = express.Router();

router.get("/", (req, res) =>{
    res.send("Hello Express JS");
});

router.get("/students", StudenController.index);

router.post("/students", StudenController.store);

router.put("/students/:id", StudenController.update);

router.delete("/students/:id", StudenController.destroy);

// exposrt router
module.exports = router;