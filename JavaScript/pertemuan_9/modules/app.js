// import FruitController
// melakukan destructing Object

const {index,store} = require("./FruitController.js");


const main = () =>{
    index();
    store("Mangga");
};

main();