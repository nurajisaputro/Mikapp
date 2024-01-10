function startTime() {
    const today = new Date();
    let h = today.getHours();
    let m = today.getMinutes();
    let s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('clock').innerHTML = h + ":" + m + ":" + s;
    setTimeout(startTime, 1000);
}

function checkTime(i) {
    if (i < 10) { i = "0" + i };  // add zero in front of numbers < 10
    return i;
}

function date() {
    let date = new Date().toUTCString().slice(5, 16);
    document.getElementById('date').innerHTML = date
}

startTime()
checkTime()
date()


function TEST() {
    const button = document.getElementById('add-user-login')
    document.getElementById('alert').style.display = "block"
    console.log("berhasil")
}

function showAlert(){
//    document.getElementById('alert_login').style.display = "block"
alert('GAGAL')
}