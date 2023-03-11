<?php
include('include/dbconnect.php');
session_start();
error_reporting(E_ALL ^ E_NOTICE);

//category wise show blogs
if ($category = $_GET['cat']) {
    $query = "SELECT * FROM blog_posts WHERE post_cat = '$category'";
    $stmt = $conn->prepare($query);

    $stmt->execute();

    $results = $stmt->fetchAll();

    foreach ($results as $result) {
        $name = $result['post_content'];
        $small = substr($name, 0, 100);
        //while ($result= $stmt->fetch_object()) {
        //    $postname = $result->post_content;
        //    $small = substr($postname, 0, 100);
?>
        <a href="post.php?poid=<?php echo ($result['post_id']); ?>">
            <div class="card mb-3 blogcard" style="max-width: 800px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="assets/img/<?php echo ($result['post_image']); ?>" class="img-fluid rounded-start image" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo ($result['post_title']); ?></h5>
                            <p class="card-text text-black"><?php echo ($small); ?></p>
                            <?php echo ($result['date']); ?>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    <?php
    }
}
//show recent blogs
elseif ($_GET['rcblog']) {
    $qr = "SELECT * FROM blog_posts ORDER BY post_id DESC LIMIT 5";
    $stmt = $conn->prepare($qr);

    $stmt->execute();

    $results = $stmt->fetchAll();

    foreach ($results as $result) {
        $name = $result['post_content'];
        $small = substr($name, 0, 100);
        //while ($result = $stmt->fetch_object()){
        //    $postname = $result->post_content;
        //    $small = substr($postname, 0, 100);
    ?>
        <a href="post.php?poid=<?php echo ($result['post_id']); ?>">
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="assets/img/<?php echo ($result['post_image']); ?>" class="img-fluid rounded-start rcblgimg" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <p class="card-title crdtext"><?php echo ($small); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    <?php
    }
}

//by defoult show blogs
elseif ($defaultblogcategory = $_GET['defaultcat']) {
    /*
    $query = "SELECT * FROM blog_posts WHERE post_cat = '$defaultblogcategory'";
    $stmt = $conn->query($query);
    while ($result = $stmt->fetch_object()) {
        $postname = $result->post_content;
        $small = substr($postname, 0, 100);
        */

    $q = $conn->prepare("SELECT * FROM blog_posts WHERE post_cat = '$defaultblogcategory'");
    $q->execute();

    $results = $q->fetchAll();

    foreach ($results as $result) {
        $name = $result['post_content'];
        $small = substr($name, 0, 100);
    ?>
        <a href="post.php?poid=<?php echo ($result['post_id']); ?>">
            <div class="card mb-3 blogcard" style="max-width: 800px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="assets/img/<?php echo ($result['post_image']); ?>" class="img-fluid rounded-start image" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo ($result['post_title']); ?></h5>
                            <p class="card-text text-black"><?php echo ($small); ?></p>
                            <?php echo ($result['date']); ?>
                        </div>
                    </div>
                </div>
            </div>
        </a>
<?php
    }
}
