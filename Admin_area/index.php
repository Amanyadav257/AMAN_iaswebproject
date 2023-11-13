<?php
include("../includes/connect.php");
session_start();

if (isset($_POST['insert_que'])) {
    $sub = $_POST['sub'];
    $topic = $_POST['topic'];
    $title = $_POST['title'];
    $que_text = $_POST['que_text'];
    $answer = $_POST['answer'];

    $url = $_POST['url'];
    $sub_time = $_POST['sub_time'];

    $sol_image = $_FILES['sol_image']['name'];
    $sol_image_tmp = $_FILES['sol_image']['tmp_name'];

    move_uploaded_file($sol_image_tmp, "../sol_img/$sol_image");

    $insert_query = "insert into `question_add` (subject,topic,title,que_text,answer,img,url,sub_time) values
  ('$sub','$topic','$title','$que_text','$answer','$sol_image','$url','$sub_time')";

    $sql_execute = mysqli_query($con, $insert_query);

    echo "<script>alert('Question added')</script>";
    echo "<script>window.open('./index.php','_self')</script>";
}

// function admin_name(){
//     global $con;
//     $user_name = $_SESSION['username'];
//     echo "<p class='text-light text-center'>$user_name</p>";

// }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!--------------------------------------------------------------- bootstrap css link --------------------------------------------->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!--------------------------------------------------------------- font awesome --------------------------------------------------->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!--------------------------------------------------------------- css file ------------------------------------------------------->

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .admin_image {
            width: 100px;
            object-fit: contain;
        }

        /* .footer{
        position: absolute;
    } */
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
    <?php
    if (!isset($_SESSION['username'])) {
        echo "<script>window.open('../index.php','_self')</script>";
    } else {
        echo "<div class='container-fluid p-0'>
        
        <nav class='navbar navbar-expand-lg navbar-light bg-info'>
            <div class='container-fluid'>
                <h1><span>T</span>ruly <span>I</span>AS</h1>
                <nav class='navbar navbar-expand-lg'>
                    <ul class='navbar-nav'>
                        <li class='nav-item'>
                            <a href='../index.php' class='nav-link mx-5'>Home</a>
                            <a href='./admin_logout.php' class='nav-link mx-5'>Logout</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>

        <div class='row'>
            <div class='col-md-12 bg-secondary p-1 d-flex align-items-center p-3'>
                    <p class='text-light text-center'>Welcome  $_SESSION[username]</p>
              

            </div>
        </div>

        <div class='container mt-3'>
            <h1 class='text-center'>Insert Question</h1>

            
            <form action='' method='post' enctype='multipart/form-data'>

             <div class='form-outline mb-4 w-50 m-auto'>
                    <label for='product_title' class='form-label'>
                        Subject
                    </label>
                    <input type='text' placeholder='Enter Subject' name='sub' id='product_title' class='form-control'
                        autocomplete='off' required='required'>
                </div>

                <!------------------------------------------------------------ description --------------------------------------------------->
                <div class='form-outline mb-4 w-50 m-auto'>
                    <label for='description' class='form-label'>
                        Topic
                    </label>
                    <input type='text' placeholder='Enter Topic' name='topic' id='description' class='form-control'
                        autocomplete='off' required='required'>
                </div>

                <!------------------------------------------------------------ Keywords ---------------------------------------------------------->
                <div class='form-outline mb-4 w-50 m-auto'>
                    <label for='product_Keywords' class='form-label'>
                        Title
                    </label>
                    <input type='text' placeholder='Enter Titl'' name='title' id='product_Keywords'
                        class='form-control' autocomplete='off' required='required'>
                </div>


                <!------------------------------------------------------------ Question Text ---------------------------------------------------------->
                <div class='form-outline mb-4 w-50 m-auto'>
                    <label for='product_Keywords' class='form-label'>
                        Question Text
                    </label>
                    <input type='text' placeholder='Enter Question text' name='que_text' id='product_Keywords'
                        class='form-control' autocomplete='off' required='required'>
                </div>

                <!------------------------------------------------------------ Answer ---------------------------------------------------------->
                <div class='form-outline mb-4 w-50 m-auto'>
                    <label for='product_Keywords' class='form-label'>
                        Answer
                    </label>
                    <div>
                        <textarea id='answer' name='answer' rows='4' cols='70' style='resize: vertical;'
                            placeholder='Type your answer here...'></textarea>
                    </div>
                </div>

                <!-------------------------------------------------------------- Image ----------------------------------------------------------->
                <div class='form-outline mb-4 w-50 m-auto'>
                    <label for='product_image1' class='form-label'>
                        Answer Image
                    </label>
                    <input type='file' name='sol_image' id='product_image1' class='form-control' required='required'>
                </div>

                <!--------------------------------------------------------------- Url ------------------------------------------------------->
                <div class='form-outline mb-4 w-50 m-auto'>
                    <label for='product_Keywords' class='form-label'>
                        Url
                    </label>
                    <input type='url' placeholder='Enter Title' name='url' id='product_Keywords' class='form-control'
                        autocomplete='off' required='required'>
                </div>

                <div class='form-outline mb-4 w-50 m-auto'>
                    <label for='product_Keywords' class='form-label'>
                        Submit-Time
                    </label>
                    <input type='time' placeholder='Enter Time' name='sub_time' id='product_Keywords'
                        class='form-control' required='required'>
                </div>

                <!----------------------------------------------------------------- Button ----------------------------------------------------->
                <div class='form-outline mb-4 w-50 m-auto'>
                    <input type='submit' name='insert_que' class='btn btn-info mb-3 px-3' value='Submit'>
                </div>

            </form>
        </div>
        <!-- -------------------------------------------------------------------------------last child ------------------------------------->
        <div class='bg-info p-3 text-center footer'>
            <P>All rights reserved ©️ -Designed by AMAN 2023</P>
        </div>
    </div>";
}
?>
    <!---------------------------------------------------------------------------- bootstrap js link ----------------------------------------->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>

</html>