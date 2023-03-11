<?php
include('include\dbconnect.php');
error_reporting(E_ALL ^ E_NOTICE);
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
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet"
        type="text/css" />
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800"
        rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/blog.css">
</head>

<body>
    <!-- Navigation-->
    <?php include('include/navbar.php'); ?>

    <!-- Main Content-->
    <div class="container my-5 main">
        <div class="row my-5 maincontent">
            <div class="col mx-0">
                <div class="row subheding gx-4 gx-lg-5 justify-content-center">

                    <ul class="list">
                        <?php showCate(3); ?>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <span> See All</span>
                            </a>
                            <ul class="dropdown-menu">
                                <?php
                                dropdownCats($ar);
                                ?>
                            </ul>
                        </li>

                    </ul>

                </div>
                <h4 class="my-3" id="subhed"> </h4>
                <div id="mydata">
                </div>
            </div>
            <div class="col-5 mx-3">
                <div class="card mx-0" style="">
                    <div class="card-header crdheadr">
                        Recent Blogs
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item" id="recentblog">
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <hr class="my-4" />
        <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="#!">Older Posts
                →</a></div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>

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
    <script src="js/ajax.js"></script>
</body>

</html>


<?php

function showcate($limit)
{   global $ar;
    global $conn;
    $quer = "SELECT * FROM blog_post_category WHERE post_cat_id > 0 ORDER BY post_cat_id ASC LIMIT $limit";
    $statement = $conn->prepare($quer);
    $statement->execute();
    $results =$statement->fetchAll();
    foreach($results as $result){    //while ($result = $statement->fetch_object()) {
        //store all id in an array 
        $ar[] = $result['post_cat_id'];
        ?>
        <button class="subbtn mx-2" onclick="showBlog(this.value)" value="<?php print_r($result['post_cat_id']); ?>"
            class="col"><?php echo($result['post_cat_name']); ?></button>
        <h3>|</h3>
        <?php
        //print_r($ar);
    }
}



function dropdownCats($ar)
{   
    global $conn;
    $in_values = implode(',',$ar);
    $qr ="SELECT * FROM blog_post_category WHERE post_cat_id NOT IN (".$in_values.")";
    $statement = $conn->prepare($qr);

    $statement->execute();
    $results = $statement->fetchAll();
    foreach($results as $result){    //while ($result = $statement->fetch_object()) {
        
    //while ($result = $statement->fetch_object()) {
        //print_r($result->post_cat_name);
        ?>
        <li>
            <a class="dropdown-item">
                <button class="subbtn2 mx-2" onclick="showBlog(this.value)"
                    value="<?php echo ($result['post_cat_id']); ?>" class="col"><?php echo ($result['post_cat_name']); ?>
                </button>
            </a>
        </li>
        <?php
    }
}

/**
 * 
function dropdownCats($ar)
{   
    global $conn;
    $in_values = implode(',',$ar);
    $qr ="SELECT * FROM blog_post_category WHERE post_cat_id NOT IN (".$in_values.")";
    $statement = $conn->query($qr);
    while ($result = $statement->fetch_object()) {
        //print_r($result->post_cat_name);
        ?>
        <li>
            <a class="dropdown-item">
                <button class="subbtn2 mx-2" onclick="showBlog(this.value)"
                    value="<?php echo ($result->post_cat_id); ?>" class="col"><?php echo ($result->post_cat_name); ?>
                </button>
            </a>
        </li>
        <?php
    }
}
 */
//dropdownCats($ar);

/*
function dropdown($ar){
    global $conn;
    $in_values = implode(", ",$ar);
    $q = mysqli_query($conn,"SELECT * FROM blog_post_category WHERE post_cat_id NOT IN (".$in_values.")");
    while ($row = mysqli_fetch_array($q)) {
        $cate = $row['post_cat_name'];
        $cateid = $row['post_cat_id'];
        ?>
        <li>
            <a class="dropdown-item">
                <button class="subbtn2 mx-2" onclick="showBlog(this.value)"
                    value="<?php echo ($cateid); ?>" class="col"><?php echo ($cate); ?>
                </button>
            </a>
        </li>
        <?php
        
    }
}
*/

?>