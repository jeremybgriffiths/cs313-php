document.getElementById("button1").addEventListener("click", function () {
    alert("Clicked!");
});

document.getElementById("change-color").addEventListener("click", function() {
    var backgroundColor = document.getElementById("text-color").value;
    document.getElementById("div1").style.backgroundColor = backgroundColor;
});