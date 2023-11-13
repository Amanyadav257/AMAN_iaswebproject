<?php
include("./includes/connect.php");
session_start();

function get_all_que()
{
    global $con;

    $select_query = "select * from `question_add` order by rand()";
    $result_query = mysqli_query($con, $select_query);
    while ($row = mysqli_fetch_assoc($result_query)) {
        $Que_id = $row['Que_id'];
        $subject = $row['subject'];
        $topic = $row['topic'];
        $title = $row['title'];
        $que_text = $row['que_text'];
        $answer = $row['answer'];
        $img = $row['img'];
        $url = $row['url'];
        $sub_time = $row['time'];

        $excerpt = truncateText($answer, 100);

        echo "<div class='Item__List'>
    <a class='Link' href='./full_que.php?que_id=$Que_id' style='text-decoration: none;'>
        <div class='Item'>
            <div class='Image'>
                <img class='img' alt='' height='99px' src='./sol_img/$img' />
            </div>
            <div class='Name'>
                <span class='name font_style'>Question:-  $que_text</span> <br>
                <span class='que font_style'>Answer:-  $excerpt</span>
                <span class='font_style s_time'>$sub_time</span>
            </div>
        </div>
    </a>
</div>";

    }

}


// Function to truncate the text and display an excerpt
function truncateText($text, $maxChars = 100, $ellipsis = '...')
{
    if (strlen($text) <= $maxChars) {
        return $text;
    } else {
        $trimmedText = substr($text, 0, $maxChars);
        $lastSpace = strrpos($trimmedText, ' ');

        if ($lastSpace !== false) {
            $trimmedText = substr($trimmedText, 0, $lastSpace);
        }

        return $trimmedText . $ellipsis;
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!--------------------------------------------------------------- bootstrap css link --------------------------------------------->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!--------------------------------------------------------------- font awesome --------------------------------------------------->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!--------------------------------------------------------------- css file ------------------------------------------------------->
    <link rel="stylesheet" href="./HomePage.css" />

    <style>
        .container-fluid h1 {
            font-size: 60px;
            margin-top: 20px;
        }

        .container-fluid h1 span {
            color: #ff004f;
        }
    </style>
</head>

<body>
    <!-- -------------------------------------------------------------------- navbar ---------------------------------------------------->
    <div class="container-fluid p-0">
        <!------------------------------------------------------------------ first child ------------------------------------------------>
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <h1>Welcome to<span>T</span>ruly <span>I</span>AS</h1>
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">

                        <?php
                        if(!isset($_SESSION['username'])){
                        echo "<li class='nav-item'>
                            <a class='nav-link' href='./Admin_area/admin_login.php'>Admin Login</a>
                        </li>";
                        }else{
                        echo "<li class='nav-item'>
                            <a class='nav-link' href='./Admin_area/index.php'>Back to admin page</a>
                        </li>";
                        }
                        ?>
                    </ul>
                </nav>
            </div>
        </nav>

        <?php
        get_all_que();
        ?>

        <!-- -------------------------------------------------------------------------------last child ------------------------------------->
        <div class="bg-info p-3 text-center">
            <P>All rights reserved ©️ -Designed by AMAN 2023</P>
        </div>
    </div>

    <!---------------------------------------------------------------------------- bootstrap js link ----------------------------------------->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>

</html>