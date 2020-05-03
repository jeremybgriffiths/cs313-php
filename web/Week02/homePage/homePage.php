<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="homePage.css">
</head>

<body>
    <header>
        <h1>Home Page</h1>
        <a href="assignments.php">Assignments</a>
        <hr>
    </header>
    <main>
        <p id="intro">I really enjoy hiking, so I have provided a page with images
            of different places that I find inspiring. You can click the buttons to cycle through the images</p>
        <div id="slide_container">
            <img src="images/image1.jpg" id="slideshow_image" class="container">
        </div>
        <button id="prev_image">Prev</button>
        <button id="next_image">Next</button>
        <input type="hidden" id="img_no" value="0">
    </main>
    <footer>
        <p>Created by Jeremy Griffiths</p>
        <?php
        echo date("D M d, Y") . "<br>";
        ?>
    </footer>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="homePage.js"></script>
</body>

</html>