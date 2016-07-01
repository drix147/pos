var day = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Staturday"];
var month = ["Janury", "Febuary", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
function getDate(){var time = new Date();return day[time.getDay()] + ", " + time.getDate() + ", " + month[time.getMonth()] + ", " + time.getFullYear();}
function getHours(){var time = new Date(); return time.getHours();}
function getMinutes(){var time = new Date(); return (time.getMinutes() < 10) ? "0" + time.getMinutes() : time.getMinutes();}
function getSeconds(){var time = new Date();return (time.getSeconds() < 10) ? "0" + time.getSeconds() : time.getSeconds();}
function getAmPm(){ var time = new Date(); return (time.getHours() >= 12) ? "PM" : "AM";}
function showDate(){
	setInterval(function(){
		document.getElementById("time").innerHTML = getDate() +" "+ getHours() +":"+ getMinutes() +":"+ getSeconds() +":"+ getAmPm();
	}, 100);
}
showDate();