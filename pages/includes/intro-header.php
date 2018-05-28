<?php

// get random banner image
$banners     = $database->select(['*'], 'banners')->fetchAll();
$countBanner = count($banners);
$index       = rand(0, $countBanner - 1);
$usingBanner = $banners[$index];
?>
<!-- Set your background image for this header on the line below. -->
<header class="intro-header" style="background-image: url('<?=ROOT_PATH?>themes/img/banners/<?= $usingBanner['image'] ?>')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading">
                    <h1>Modern Blog</h1>
                    <span class="subheading">e-pulse Blog Powered by KonnectCode</span></div>
            </div>
        </div>
    </div>
</header>
