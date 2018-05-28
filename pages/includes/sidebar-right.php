<?php

// get popular posts
$popularArticles = $database->select(["*"], 'articles')->orderBy('count_view', 'DESC')->limit(4)->fetchAll();

?>
<div class="col-md-4 sidebar">
    <!--Sidebar Social Links-->
    <div class="sidebar-social"><a href="javascript:void(0)"><i class="fa fa-facebook"
                                                                aria-hidden="true"></i></a> <a
            href="javascript:void(0)"><i class="fa fa-twitter" aria-hidden="true"></i></a> <a
            href="javascript:void(0)"><i class="fa fa-google-plus" aria-hidden="true"></i></a> <a
            href="javascript:void(0)"><i class="fa fa-whatsapp" aria-hidden="true"></i></a> <a
            href="javascript:void(0)"><i class="fa fa-linkedin" aria-hidden="true"></i></a> <a
            href="javascript:void(0)"><i class="fa fa-youtube" aria-hidden="true"></i></a></div>
    <hr>
    <!--Sidebar Popular Posts-->
    <h2>Bài viết nổi bật</h2>
    <?
    foreach ($popularArticles as $article) {
        ?>
        <div class="sidebar-post sidebar-post-last">
            <a href="pages/detail.php?id=<?= $article['id'] ?>"><?= $article['title'] ?></a>
            <p class="post-meta"><?= date('F d, Y', strtotime($article['create_time'])) ?></p>
        </div>
        <hr>
        <?
    }
    ?>
</div>