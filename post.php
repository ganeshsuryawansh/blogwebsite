<?php
include('include\dbconnect.php');
session_start();
$postid = $_GET['poid'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>View Blog</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body>
    <!-- Navigation-->
    <?php include('include\navbar.php'); ?>

    <?php
    //$query = mysqli_query($conn, "SELECT * FROM blog_posts WHERE post_id='$postid'");
    $query = "SELECT * FROM blog_posts WHERE post_id='$postid'";

    $data = $conn->prepare($query);
    $data->execute();
    $rows = $data->fetchAll();

foreach($rows as $row){

    //while ($row = mysqli_fetch_array($query)) {
        $name = $row['post_title'];
        $post_content = $row['post_content'];
        $post_content2 = $row['post_content2'];
        $post_content3 = $row['post_content3'];

        $date = $row['date'];
        $img = $row['post_image'];
        $img2 = $row['post_image2'];
        $img3 = $row['post_image3'];
        //$pid = $row['post_id'];
        $emailid = $row['emailid'];
        $postcate = $row['post_cat'];
        $small = substr($post_content, 0, 50);

        $_SESSION['poscat'] = $postcate;

    ?>
        <!-- Page Header-->
        <header class="masthead" style="background-image: url('assets/img/<?php echo ($img); ?>')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="post-heading">
                            <h1><?php echo ($name); ?></h1>
                            <h2 class="subheading"><?php echo ($small); ?></h2>
                            <span class="meta">
                                Posted by
                                <a href="#!"><?php echo ($emailid); ?></a>
                                <?php echo ($date); ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Post Content-->
        <article class="mb-4">
            <div class="container px-6 px-lg-7">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <p><?php echo ($post_content); ?></p>
                        <a href="#!"><img class="img-fluid" src="assets/img/<?php echo ($img); ?>" alt="..." /></a>
                        <span class="caption text-muted">To go places and do things that have never been done before – that’s what living is all about.</span>
                        <p><?php echo ($post_content2); ?></p>
                        <img class="img-fluid" src="assets/img/<?php echo ($img2); ?>">
                        <p><?php echo ($post_content3); ?></p>
                        <img class="img-fluid" src="assets/img/<?php echo ($img3); ?>">
                    </div>
                </div>
            </div>
        </article>
    <?php
    }
    ?>
    <hr>
    <div class="form-floating container">
        <div class="my-5">
            <h4 class="my-5 mb-5">Comments Section</h4>

        </div>
        <textarea class="form-control text-dark" placeholder="Write Comments" id="floatingTextarea"></textarea>
        <input class="btn btn-primary my-2" type="SUBMIT" name="SUBMIT" />
    </div>

    <hr>
    <div class="container">
        <h4>Related Blogs</h4>

        <div class="row my-5">

            <?php
            $postcategory = $_SESSION['poscat'];
            //$query = mysqli_query($conn, "SELECT * FROM blog_posts WHERE post_cat='$postcategory'");

            $query = "SELECT * FROM blog_posts WHERE post_cat='$postcategory'";
            $data = $conn->prepare($query);
            $data->execute();
            $rows = $data->fetchAll();
        
        foreach($rows as $row){
            //while ($row = mysqli_fetch_array($query)) {
                $name = $row['post_title'];
                $post_content = $row['post_content'];
                $date = $row['date'];
                $img = $row['post_image'];
                $pid = $row['post_id'];
                $emailid = $row['emailid'];

                $small = substr($post_content, 0, 50);
                $poid = 0;

            ?>
                <div class="col my-5">
                    <div class="card" style="width: 18rem;">
                        <a href="post.php?poid=<?php echo ($pid); ?>">
                            <img src="assets/img/<?php echo ($img); ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo ($name); ?></h5>
                                <p class="card-text"><?php echo ($small); ?></p>
                                <p class="card-text"><?php echo ($date); ?></p>
                        </a>
                    </div>
                </div>
        </div>

    <?php
            }
    ?>

    </div>


    </div>
    <!-- Footer-->
    <footer class="border-top">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <ul class="list-inline text-center">
                        <li class="list-inline-item">
                            <a href="#!">
                                <span class="fa-stack fa-lg">
                                    <i class="fas fa-circle fa-stack-2x"></i>
                                    <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#!">
                                <span class="fa-stack fa-lg">
                                    <i class="fas fa-circle fa-stack-2x"></i>
                                    <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#!">
                                <span class="fa-stack fa-lg">
                                    <i class="fas fa-circle fa-stack-2x"></i>
                                    <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                    </ul>
                    <div class="small text-center text-muted fst-italic">Copyright &copy; Your Website 2022</div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>