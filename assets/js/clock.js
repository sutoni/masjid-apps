function gettheDate() {
Todays = new Date();
TheDate = "" + Todays.getDate() +" "+ getBln(Todays.getMonth()) + " " + Todays.getFullYear();
return TheDate;
}

var timerID = null;
var timerRunning = false;
function stopclock (){
if(timerRunning) clearTimeout(timerID);
timerRunning = false;
}
function startclock () {
// Make sure the clock is stopped
stopclock();
document.getElementById("date").innerHTML = " "+gettheDate();
showtime();
}
function showtime () {
var now = new Date();
var hours = now.getHours();
var minutes = now.getMinutes();
var seconds = now.getSeconds()
var timeValue = "" + ((hours >23) ? hours -24 :hours)
timeValue = ((hours <10) ? "0" : "") + hours
timeValue += ((minutes < 10) ? ":0" : ":") + minutes
timeValue += ((seconds < 10) ? ":0" : ":") + seconds
document.getElementById("clock").innerHTML = " "+timeValue;
timerID = setTimeout("showtime()",1000);
timerRunning = true;

}

function getBln(bln){
var nmBln = "";
switch(bln){
case 0: nmBln = "Januari"; break;
case 1: nmBln = "Februarii"; break;
case 2: nmBln = "Maret"; break;
case 3: nmBln = "April"; break;
case 4: nmBln = "Mei"; break;
case 5: nmBln = "Juni"; break;
case 6: nmBln = "Juli"; break;
case 7: nmBln = "Agustus"; break;
case 8: nmBln = "September"; break;
case 9: nmBln = "Oktober"; break;
case 10: nmBln = "Nopember"; break;
case 11: nmBln = "Desember"; break;
}
return nmBln;
}
