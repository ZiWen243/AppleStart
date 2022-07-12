//获取当天日期
function date() {
    var date = new Date();
    var hour = "00" + date.getHours();
    hour = hour.substr(hour.length - 2);
    var minute = "00" + date.getMinutes();
    minute = minute.substr(minute.length - 2);
    var second = "00" + date.getSeconds();
    second = second.substr(second.length - 2);

    document.getElementById("divBottom").innerHTML = hour + ":" + minute + ":" + second;
}
setInterval("date()", 1000);