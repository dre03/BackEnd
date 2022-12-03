// membuat object literatur

const user = {
    name : "Andre Apriyana",
    age : 19,
    major : "Informatics"
};

// memanggil satu persatu
// const name = user.name;
// const age = user.age;
// const major = user.major;

// console.log(name, age, major);


// melakukan destructing object
const {name, age, major} = user;
console.log(name, age, major);