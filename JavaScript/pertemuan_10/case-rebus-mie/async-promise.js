const persiapan = () =>{
    return new Promise((resolve) =>{
        setTimeout(() =>{
            resolve("Persiapan...");
        }, 3000);
    });
};

const rebusAir = () => {
    return new Promise((resolve) =>{
        setTimeout(() =>{
            resolve("Rebus Air...");
        }, 7000);
    });
};

const masak = () =>{
    return new Promise((resolve) =>{
        setTimeout(() =>{
            resolve("Masak mie...");
        }, 5000);
    });
}

const main = () =>{
    persiapan().then((res)=>{
        console.log(res);
        return rebusAir();
    }).then((res) => {
        console.log(res);
        return masak();
    }).then((res) =>{
        console.log(res);
    })
}

main();