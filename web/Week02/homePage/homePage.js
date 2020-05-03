$(document).ready(function () {
    $("#prev_image").click(function () {
        prev();
    });
    $("#next_image").click(function () {
        next();
    });
});

var images = ["image1", "image2", "image3", "image4"];

function prev() {
    $('#slideshow_image').fadeOut(300, function () {
        var prev_val = document.getElementById("img_no").value;
        var prev_val = Number(prev_val) - 1;
        if (prev_val <= -1) {
            prev_val = images.length - 1;
        }
        $('#slideshow_image').attr('src', 'images/' + images[prev_val] + '.jpg');
        document.getElementById("img_no").value = prev_val;
    });
    $('#slideshow_image').fadeIn(1000);
}

function next() {
    $('#slideshow_image').fadeOut(300, function () {
        var next_val = document.getElementById("img_no").value;
        var next_val = Number(next_val) + 1;
        if (next_val >= images.length) {
            next_val = 0;
        }
        $('#slideshow_image').attr('src', 'images/' + images[next_val] + '.jpg');
        document.getElementById("img_no").value = next_val;
    });
    $('#slideshow_image').fadeIn(1000);
}