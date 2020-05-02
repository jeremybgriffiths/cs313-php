document.getElementById("button1").addEventListener("click", function () {
    alert("Clicked!");
});

$(document).ready(function () {
    $("#change-color").click(function () {
        let backgroundColor = document.getElementById("text-color").value;
        $("#div1").css("background-color", backgroundColor);
    });
});

$(document).ready(function () {
    $("#fade").click(function () {
        $("#div3").fadeToggle(3000);
    });
});