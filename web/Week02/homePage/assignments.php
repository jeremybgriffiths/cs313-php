<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignments</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="homePage.css">
</head>

<body>
    <header>
        <h1>Assignments</h1>
        <a href="homePage.php">Home Page</a>
        <hr>
    </header>
    <main>
        <ul id="assignment_list">
            <li><a href="../../hello.html">Week 1</a></li>
            <li><a href="homepage.php">Week 2</a></li>
            <li>More coming soon ...</li>
        </ul>
    </main>
    <footer>
        <p>Created by Jeremy Griffiths</p>
        <?php
        echo date("D M d, Y") . "<br>";
        ?>
    </footer>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>