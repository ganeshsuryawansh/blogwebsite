<?php


include 'include/dbconnect.php';
session_start();
error_reporting(E_ALL ^ E_NOTICE);

session_start();

$log = $_SESSION['Adloggedin'];
try {
    if ($log) {
        //code here
    } else {
        header("location: admin.php");
    }
} catch (Exception $e) {
    echo ($e);
}


?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <style>
        .pimg {
            height: 150px;
            width: 150px;
        }

        .td {
            border: 1px solid black;
        }

        .leftside {
            background-color: dimgrey;
            color: white;
        }
    </style>

</head>

<body id="body">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Admin</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">LOGOUT</a>
                    </li>

                </ul>

            </div>
        </div>
    </nav>
    <div class="">

        <div class="row">
            <div class="col-2 leftside text-center">
                <h4 class="my-5">Categories</h4>
                <hr>
                <h4>Users</h4>
                <hr>
                <h4>Blogs</h4>
            </div>
            <div class="col my-5">
                <h4>Add new post</h4>
                <form action="adminpanel.php" method="POST">
                    <div class="mb-3">
                        <label for="exampleInput" class="form-label">POST TITLE</label>
                        <input type="text" class="form-control" name="postname" id="" aria-describedby="emailHelp" required>
                    </div>

                    <label for="exampleInput" class="form-label">POST FIRST PARAGRAPHS</label>
                    <div class="form-floating">
                        <textarea class="form-control" name="posttext" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" required></textarea>
                    </div>

                    <label for="exampleInput" class="form-label">POST SECOND PARAGRAPHS</label>
                    <div class="form-floating">
                        <textarea class="form-control" name="posttext2" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                    </div>

                    <label for="exampleInput" class="form-label">POST THIRD PARAGRAPHS</label>
                    <div class="form-floating">
                        <textarea class="form-control" name="posttext3" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="number" class="form-label">POST IMAGE</label>
                        <input type="file" name="pimg" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="number" class="form-label">POST SECOND IMAGE</label>
                        <input type="file" accept="jpeg/png/JPEG/JPG" name="postimg2" class="form-control" id="">
                    </div>

                    <div class="mb-3">
                        <label for="number" class="form-label">POST THIRD IMAGE</label>
                        <input type="file" accept="jpeg/png/JPEG/JPG" name="postimg3" class="form-control" id="">
                    </div>

                    <div class="mb-3">
                        <label for="text" class="form-label">POST CATEGORY</label>

                        <p><b>Categoris:</b> Lifestyle , Shopping ,
                            Beauty , Travel , Food , kids</p>

                        <input type="text" class="form-control" name="postcat" id="" aria-describedby="emailHelp" required>
                    </div>

                    <button type="submit" class="btn btn-primary" value="Upload">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>
<?php

$title = $_POST["postname"];


if (!$title == "") {

    $title = $_POST["postname"];
    $text = $_POST["posttext"];
    $text2 = $_POST["posttext2"];
    $text3 = $_POST["posttext3"];

    $image = $_POST["pimg"];
    //echo $image;
    //$image = $_FILES["pimg"];
    $image2 = $_POST["postimg2"];
    $image3 = $_POST["postimg3"];
    $cate = $_POST["postcat"];
    $email1 = $_SESSION['adminemail'];

    //move_uploaded_file($_FILES['pimg']['tmp_name'],'ecommerce');
    /*
    $sql = "INSERT INTO `blog_posts` (`post_title`, `post_content`, `post_content2`,`post_content3`,`post_image`,`post_image2`,`post_image3`,`emailid`, `post_cat`,`date`)
    VALUES ('$title', '$text', '$text2','$text3','$image','$image2','$image3','$email1', '$cate',current_timestamp())";
    $result = mysqli_query($conn, $sql);
    */
    $data = $conn->prepare("INSERT INTO `blog_posts` (`post_title`, `post_content`, `post_content2`,`post_content3`,`post_image`,`post_image2`,`post_image3`,`emailid`, `post_cat`,`date`) VALUES (?, ?, ?,?,?,?,?,?, ?, current_timestamp())");
    $data->execute(array($title, $text, $text2, $text3, $image, $image2, $image3, $email1, $cate));

    if ($data) {
        echo ("Blog Post Succesfully Submited");
    }
} else {
    echo ("Do not insert blank data");
}

?>