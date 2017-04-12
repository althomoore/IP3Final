var modal = document.getElementById('myModal');
var btn = document.getElementById("myBtn");
var span = document.getElementsByClassName("close")[0];

var modalU = document.getElementById('myModalU');
var btnU = document.getElementById('myBtnU');
var spanU = document.getElementsByClassName("close")[1];

btn.onclick = function () {
    modal.style.display = "block";
}
span.onclick = function () {
    modal.style.display = "none";
}
window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}


btnU.onclick = function () {
    modalU.style.display = "block";
}
spanU.onclick = function () {
    modalU.style.display = "none";
}
window.onclick = function (event) {
    if (event.target == modal) {
        modalU.style.display = "none";
    }
}




