const cars = [{
    brand: "Volvo",
    model: "262 GLE"
    },
    {
    brand: "Saab",
    model: "900 Turbo"
    },
    {
    brand: "Volvo",
    model: "244 GLT"
    },
    {
    brand: "Alfa Romeo",
    model: "Spider"
    },
    {
    brand: "Porsche",
    model: "911"
    },
    {
    brand: "BMW",
    model: "2002 ti"
    }
    ];
    function loadMyCars(){
        let result = "";
        for(let i = 0; i < cars.length; i++){
            result += "<li>" + cars[i].brand + "  " + cars[i].model + "</li>"
        }
        //result += "<li>...Totally " + i + " cars</li>"
        result += "<div>...Totally " + cars.length + " cars</div>"

        document.getElementById("myCars").innerHTML = result;
    }