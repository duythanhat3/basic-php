<?php
require '../libraries/library.php';

$id     = $_GET['id'];
$detail = $database->select(['*'], 'articles')->where('`id` = ' . $id)->fetch();

if(!$detail){
    header("Location: /blog/", true, 301);
    exit();
}

// 
$getListIds = $database->select(['id'], 'articles')->orderBy('id', 'ASC')->fetchAll();
$getListIds = array_column($getListIds, 'id');

$minId       = $maxId = 0;
$getMinMaxId = $database->select(['MIN(`id`) as minId', 'MAX(`id`) as maxId'], 'articles')->fetch();
$minId       = $getMinMaxId['minId'];
$maxId       = $getMinMaxId['maxId'];

$keyPrev = array_search($id, $getListIds) - 1;
$keyNext = array_search($id, $getListIds) + 1;

$prevId = $getListIds[$keyPrev];
$nextId = $getListIds[$keyNext];

//
$hidePrev = $hideNext = false;
if ($id == $minId) {
    $hidePrev = true;
}
if ($id == $maxId) {
    $hideNext = true;
}

$prevArticle = ROOT_PATH . 'pages/detail.php?id=' . $prevId;
$nextArticle = ROOT_PATH . 'pages/detail.php?id=' . $nextId;

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
    <title>Single Post</title>

    <?php
    include_once('includes/resource-top.php');
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
                        src="../themes/img/menu.png" class="menu-icon" alt="menu"/></button>
            <!-- logo -->
            <a class="navbar-brand" href="index.html"><img src="../themes/img/logo.png" alt="logo"/></a></div>

        <!-- Menu -->
        <?php
        include_once('includes/menu.php');
        ?>
        <!-- /.Menu ends -->
    </div>
    <!-- /.nav ends -->
</nav>

<!-- Post Header -->
<?php
include_once('includes/intro-header.php');
?>

<!-- Post Content -->
<div class="container">
    <div class="row">
        <div class="col-md-8 list-container post">
            <h2><?=$detail['title']?></h2>
            <p class="post-meta"><?= date('F d, Y', strtotime($detail['create_time'])) ?></p>
            <!-- Post description -->
            <hr>

            <?= $detail['content'] ?>
            <!-- Pager -->
            <ul class="pager">
                <?php
                if (!$hidePrev) {
                    ?>
                    <li class="prev"><a href="<?= $prevArticle ?>">&larr; Prev</a></li>
                    <?
                }
                ?>
                <?php
                if (!$hideNext) {
                    ?>
                    <li class="next"><a href="<?= $nextArticle ?>">Next &rarr;</a></li>
                    <?
                }
                ?>
            </ul>
        </div>
        <!-- ==== Sidebar Starts Here ==== -->
        <?php
        include_once('includes/sidebar-right.php');
        ?>
        <!-- ==== Sidebar Ends Here ==== -->
    </div>
</div>
<!-- ===== Main Content ENDS here ===== -->

<!-- ===== Footer ===== -->
<?php
include_once('includes/intro-footer.php');
?>

<!--- goto top button--->
<a id="back-to-top" href="#" class="back-to-top" role="button" title="Click to return on the top page"
   data-toggle="tooltip" data-placement="left"><img src="../themes/img/arrow-top.png" alt="go-to-top"></a>
<?php
include_once('includes/resoure-bottom.php');
?>
</body>
</html>