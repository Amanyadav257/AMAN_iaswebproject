<?php
include("./includes/connect.php");
// session_start();


function get_full_que()
{
    global $con;

    if (isset($_GET["que_id"])) {
        $que_id = $_GET['que_id'];
        $select_query = "select * from `question_add` where Que_id=$que_id";
        $result_query = mysqli_query($con, $select_query);

        $row = mysqli_fetch_assoc($result_query);

        $subject = $row['subject'];
        $topic = $row['topic'];
        $title = $row['title'];
        $que_text = $row['que_text'];
        $answer = $row['answer'];
        $img = $row['img'];
        $url = $row['url'];
        $sub_time = $row['time'];


        echo " <div class='row'>
    <div class='col-md-12 bg-secondary p-1 d-flex  p-3'>
    <div>
        <h3 class='text-light text-center'>Subject: $subject</h3>
        <h4 class='text-light'>Title: $title</h4>
        <h4 class='text-light'>Topic: $topic</h4>
        <a href='./index.php'><button class='btn btn-info mb-3 px-10 s_time'>Back to home</button></a>
        </div>
    </div>
    <p class='text-dark'>Question: $que_text</p>
    <p class='text-dark'>Answer: $answer</p>
    <img class='imge' alt='' height='99px' src='./sol_img/$img' />
    <span class=''></span>
    <a href='$url'>$url</a>

</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question Details</title>
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

        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
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
            </div>
        </nav>

        <?php
        get_full_que();
        ?>
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