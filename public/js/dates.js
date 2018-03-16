/***get Today's date**/

changeDate("today");

function changeDate(id){
    var today = new Date();
    var weekday = new Array(7);
    weekday[0] = "Sunday";
    weekday[1] = "Monday";
    weekday[2] = "Tuesday";
    weekday[3] = "Wednesday";
    weekday[4] = "Thursday";
    weekday[5] = "Friday";
    weekday[6] = "Saturday";

    var n = weekday[today.getDay()];
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!
    var yyyy = today.getFullYear();
    //format date
     

    var lastday = function(y,m){
        return  new Date(y, m, 0).getDate();
    }
    if(id == "today")
    {
        n = weekday[today.getDay()];
        dd = today.getDate();
        //console.log(n);
    }else if(id == "left")
    {
        n = weekday[today.getDay()];
        dd = today.getDate();
    }else if(id == "right")
    {
        if(today.getDay() < 6)
        {n = weekday[today.getDay() + 1];}
        else{n = weekday[0];}
        
        if(lastday(yyyy,mm) < (dd + 1))
        {//if today is the last day of the month
            dd = 01;
            mm = today.getMonth()+2; //January is 0!
        }else{
        mm = today.getMonth() + 1;
        dd = today.getDate() + 1;
        }
    }

    if(dd<10) {
        dd = '0'+dd
    } 
    if(mm<10) {
        mm = '0'+mm
    }

    today = n + ' ' + mm + '. ' + dd + '. ' + yyyy;
    //console.log(today);
    document.getElementById("dates").innerHTML = today;
}