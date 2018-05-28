<?php
require 'libraries/library.php';

// get articles
$articles = $database->select(['*'], 'articles')->orderBy('create_time', 'DESC')->limit(5)->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Herald Blog template</title>

    <?php
    include_once('pages/includes/resource-top.php');
    ?>

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-default navbar-custom navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1"><span class="sr-only">Toggle navigation</span> <img
                        src="themes/img/menu.png" class="menu-icon" alt="menu icon"/></button>
            <!--Logo-->
            <a class="navbar-brand" href="index.html"><img src="themes/img/logo.png" alt="logo"/></a></div>

        <!-- Menu -->
        <?php
        include_once('pages/includes/menu.php');
        ?>
        <!-- /.Menu ends -->
    </div>
    <!-- /.nav ends -->
</nav>

<!-- Page Header -->
<?php
include_once ('pages/includes/intro-header.php');
?>

<!-- ===== Main Content ======-->
<div class="container">
    <div class="row">
        <div class="col-md-8 list-container">

            <?php
            foreach ($articles as $article) {
                ?>
                <!--Post -->
                <div class="post-preview"><a href="pages/detail.php?id=<?= $article['id'] ?>">
                        <div class="list-thumb"
                             style="background-image: url(themes/img/avatars/<?= $article['avatar'] ?>);">
                            <div></div>
                        </div>
                        <h2 class="post-title"><?= ucfirst($article['title']) ?></h2>
                    </a>
                    <p class="post-meta"><?= date('F d, Y', strtotime($article['create_time'])) ?></p>
                </div>
                <hr>
                <?
            }
            ?>
        </div>

        <!-- ==== Sidebar Starts Here ==== -->
        <?php
        include_once ('pages/includes/sidebar-right.php');
        ?>
        <!-- ==== Sidebar Ends Here ==== -->
    </div>
</div>
<!-- ===== Main Content ENDS here ===== -->

<!-- ===== Footer ===== -->
<?php
include_once ('pages/includes/intro-footer.php');
?>

<!-- goto top button -->
<a id="back-to-top" href="#" class="back-to-top" role="button" title="Click to return on the top page"
   data-toggle="tooltip" data-placement="left"><img src="themes/img/arrow-top.png" alt="go-to-top"></a>
<?
include_once ('pages/includes/resoure-bottom.php');
?>
</body>
</html>
