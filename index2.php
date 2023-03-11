<?php
include('include\dbconnect.php');

error_reporting(E_ALL ^ E_NOTICE);
$category = $_GET['cat'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Blog Deals2Buy</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />

    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin-top: 100px;
        }

        .subheding {
            background-color: #9D4EDD;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;



            color: white;
            font-size: 15px;
            font-family: 'Roboto', sans-serif;
            padding-top: 10px;
        }

        .crdheadr {
            background-color: #9D4EDD;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            padding: 10px;
            color: white;
        }

        .col {
            color: black;
        }

        .image {
            height: 250px;
            width: 220px;
        }

        .rcblgimg {
            height: 100px;
            width: 100px;
        }

        .subhedlink {
            color: white;
        }

        .subhedlink:hover {
            color: blue;
        }

        .main {
            margin-top: 200px;
        }


        .maincontent {
            display: flex;
            flex-wrap: wrap;
        }

        .crdbody {
            margin-top: 0px;
        }

        .recentblogcard {
            color: black;
            width: 500px;
        }

        .crdtext {
            margin-top: 0px;
        }

        .ftcnt {
            color: black;
            padding: 20px 50px 10px 30px;
            background-color:white;
            border-radius: 8px;

        }

        .ftrw {
            color: black;
            font-size:10px;
        }

        .fthedding {
            color:tomato;
        }
    </style>
</head>

<body>
    <!-- Navigation-->
    <?php include('include/navbar.php'); ?>

    <!-- Page Header-->
    <!---
    <header class="masthead" style="background-image: url('assets/img/home-bg.jpg')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="site-heading">
                        <h1>
                            <img src="images/brand-logo.png" alt="">
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </header>

    -->

    <!-- Main Content-->
    <div class="container my-5 main">

        <div class="row my-5 maincontent flex-wrap">
            <div class="col-6">
                <div class="row subheding gx-4 gx-lg-5 justify-content-center">
                    <div class="col"><a class="subhedlink" href="index.php?cat=Lifestyle">Lifestyle</a> </div>
                    <div class="col"><a class="subhedlink" href="index.php?cat=Shopping">Shopping</a> </div>
                    <div class="col"><a class="subhedlink" href="index.php?cat=Health&Beauty">Health & Beauty</a> </div>
                    <div class="col"><a class="subhedlink" href="index.php?cat=Travel">Travel</a> </div>
                    <div class="col"><a class="subhedlink" href="index.php?cat=Food">Food</a> </div>
                    <div class="col"><a class="subhedlink" href="index.php?cat=Mom&kids">Mom & kids</a></div>
                </div>
                <h4><?php echo ($category); ?> Blogs</h4>
                <?php


                if ($category = $_GET['cat']) {
                    $query = mysqli_query($conn, "SELECT * FROM blog_posts WHERE post_cat = '$category'");
                    while ($row = mysqli_fetch_array($query)) {
                        $name = $row['post_title'];
                        $post_content = $row['post_content'];
                        $date = $row['date'];
                        $img = $row['post_image'];
                        $pid = $row['post_id'];
                        $emailid = $row['emailid'];

                        $small = substr($post_content, 0, 100);

                ?>

                        <a href="post.php?poid=<?php echo ($pid); ?>">
                            <div class="card mb-3 blogcard" style="max-width: 800px;">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="assets/img/<?php echo ($img); ?>" class="img-fluid rounded-start image" alt="...">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo ($name); ?></h5>
                                            <p class="card-text text-black"><?php echo ($small); ?></p>
                                            <?php echo ($date); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>

                    <?php
                    }
                } else {
                    $query = mysqli_query($conn, "SELECT * FROM blog_posts WHERE post_cat = 'shopping'");
                    while ($row = mysqli_fetch_array($query)) {
                        $name = $row['post_title'];
                        $post_content = $row['post_content'];
                        $date = $row['date'];
                        $img = $row['post_image'];
                        $pid = $row['post_id'];
                        $emailid = $row['emailid'];

                        $small = substr($post_content, 0, 100);

                    ?>

                        <a href="post.php?poid=<?php echo ($pid); ?>">
                            <div class="card mb-3 blogcard" style="max-width: 800px;">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="assets/img/<?php echo ($img); ?>" class="img-fluid rounded-start image" alt="...">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo ($name); ?></h5>
                                            <p class="card-text text-black"><?php echo ($small); ?></p>
                                            <?php echo ($date); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>

                <?php
                    }
                }
                ?>
            </div>

            <div class="col-4 mx-2">

                <div class="card" style="width:25rem;">
                    <div class="card-header crdheadr">
                        Recent Blogs
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">

                            <a href="post.php?poid=<?php echo ($pid); ?>">
                                <div class="card mb-3" style="max-width: 540px;">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <img src="assets/img/<?php echo ($img); ?>" class="img-fluid rounded-start rcblgimg" alt="...">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <p class="card-title crdtext"><?php echo (substr($name, 0, 45)); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>

                        </li>
                    </ul>
                </div>

            </div>
        </div>

        <hr>

        <hr class="my-4" />
        <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="#!">Older Posts
                →</a></div>
    </div>
    </div>
    </div>

    <!-- Footer-->
    <footer class="border-top">
        <div class="container ftcnt">
            <div class="row ftrw">
                <div class="col">
                    <h3 class="fthedding">Subscribe Now </h3>
                </div>
                <div class="col">
                    <form class="d-flex" role="search">
                        <input class="form-control me-2 mx-0" type="email" placeholder="Enter your E-mail Id" aria-label="Subscribe">
                        <button class="btn btn-warning mx-0" type="submit">Subscribe</button>
                    </form>
                </div>
                <p><b>Receive the best online deals sent directly to your inbox</b></p>
                <br>
                <p>We respect your privacy and promise that your inbox won't contain any spam from us. Subscribe today and never miss an offer again.</p>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col">

                </div>
                <div class="col">
                    
                </div>
                <div class="col">
                    
                </div>
                <div class="col">
                    
                </div>
                <div class="col">
                    
                </div>
            </div>
        </div>


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