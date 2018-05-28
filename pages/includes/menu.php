<?php
// get menus
$menus = $database->select(['*'], 'menus')->fetchAll();


?>
<!-- Menu -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">

        <?php
        $i = 0;
        foreach($menus as $menu) {
            $activeClass = '';
            $i++;
            if($i == 1){
                $activeClass = 'active';
            }
            ?>
            <li class="<?=$activeClass?>">
                <a href="<?= $menu['link'] ?>"><?= $menu['name'] ?></a>
            </li>
            <?
        }
        ?>
</ul>
</div>
<!-- /.Menu ends -->