function fresh_time(){
    var time_send=new Date().getTime();
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "./php/time.php");
    xhr.send();
    xhr.onreadystatechange = function () {
        var network_time = xhr.responseText;
        var time_end=new Date().getTime();
        var delay=(time_end-time_send)/2;
        var real_nettime=network_time-delay;
        var correction = network_time - time_send;
        localStorage.setItem("corr",correction);
        
    };
}
fresh_time();
tick();
var main_loop = setInterval(tick, 1000);
var last_time=new Date().getTime() + parseInt(localStorage.getItem("corr"));
function tick() {
    var dat = new Date();
    var real_time = dat.getTime() + parseInt(localStorage.getItem("corr"));
    if(Math.abs(real_time-last_time)>5000){
        fresh_time()
    }
    var date = new Date(real_time);
    var hour = "00" + date.getHours();
    hour = hour.substr(hour.length - 2);
    var minute = "00" + date.getMinutes();
    minute = minute.substr(minute.length - 2);
    var second = "00" + date.getSeconds();
    second = second.substr(second.length - 2);
    document.getElementById("divBottom").innerHTML = hour + ":" + minute + ":" + second;
    last_time=real_time;
}