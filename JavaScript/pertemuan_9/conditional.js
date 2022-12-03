const nilai = 100;

let grade = "";

if(nilai > 90){
    grade = "A";
}else if(nilai > 80){
    grade = "B";
}else{
    grade = "C";
}

console.log(`Grade anda : ${grade}`);

// ============= //

const age = 22;
// if(age > 21){
//     console.log("Sudah Dewasa");
// }else{
//     console.log("Belum Dewasa");
// }

//menggunakan short condisional (terrnsry operator)
// ? digunakan untuk kondisi if / true
// : digunakan untuk kodisi else / false
age > 21 ? console.log("Sudah Dewasa") : console.log("Belum Dewasa");