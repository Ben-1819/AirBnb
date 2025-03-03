let b = 1;
document.getElementById("bathroomButton").addEventListener("click", function(){
    if(b == 1){
        document.getElementById("bathroom").style.display = "none";
        b = 0;
    }
    else if(b == 0){
        document.getElementById("bathroom").style.display = "block";
        b = 1;
    }

});

let l = 1;
document.getElementById("laundryButton").addEventListener("click", function(){
    if(l == 1){
        document.getElementById("laundry").style.display = "none";
        l = 0;
    }
    else if(l == 0){
        document.getElementById("laundry").style.display = "block";
        l = 1;
    }
});

let h = 1;
document.getElementById("heatingButton").addEventListener("click", function(){
    if(h == 1){
        document.getElementById("heating").style.display = "none";
        h = 0;
    }
    else if(h == 0){
        document.getElementById("heating").style.display = "block";
        h = 1;
    }
});

let s = 1;
document.getElementById("securityButton").addEventListener("click", function(){
    if(s == 1){
        document.getElementById("security").style.display = "none";
        s = 0;
    }
    else if(s == 0){
        document.getElementById("security").style.display = "block";
        s = 1;
    }
});

let k = 1;
document.getElementById("kitchenButton").addEventListener("click", function(){
    if(k == 1){
        document.getElementById("kitchen").style.display = "none";
        k = 0;
    }
    else if(k == 0){
        document.getElementById("kitchen").style.display = "block";
        k = 1;
    }
});

let o = 1;
document.getElementById("outdoorButton").addEventListener("click", function(){
    if(o == 1){
        document.getElementById("outdoor").style.display = "none";
        o = 0;
    }
    else if(o == 0){
        document.getElementById("outdoor").style.display = "block";
        o = 1;
    }
});

let v = 1;
document.getElementById("viewButton").addEventListener("click", function(){
    if(v == 1){
        document.getElementById("view").style.display = "none";
        v = 0;
    }
    else if(v == 0){
        document.getElementById("view").style.display = "block";
        v = 1;
    }
});

let f = 1;
document.getElementById("facilitiesButton").addEventListener("click", function(){
    if(f == 1){
        document.getElementById("facilities").style.display = "none";
        f = 0;
    }
    else if(f == 0){
        document.getElementById("facilities").style.display = "block";
        f = 1;
    }
});

let fa = 1;
document.getElementById("familyButton").addEventListener("click", function(){
    if(fa == 1){
        document.getElementById("family").style.display = "none";
        fa = 0;
    }
    else if(fa == 0){
        document.getElementById("family").style.display = "block";
        fa = 1;

    }
});

let se = 1;
document.getElementById("servicesButton").addEventListener("click", function(){
    if(se == 1){
        document.getElementById("services").style.display = "none";
        se = 0;
    }
    else if(se == 0){
        document.getElementById("services").style.display = "block";
        se = 1;
    }
});

let e = 1;
document.getElementById("entertainmentButton").addEventListener("click", function(){
    if(e == 1){
        document.getElementById("entertainment").style.display = "none";
        e = 0;
    }
    else if(e == 0){
        document.getElementById("entertainment").style.display = "block";
        e = 1;
    }
});

let i = 1;
document.getElementById("internetButton").addEventListener("click", function(){
    if(i == 1){
        document.getElementById("internet").style.display = "none";
        i = 0;
    }
    else if(i == 0){
        document.getElementById("internet").style.display = "block";
        i = 1;
    }
});
