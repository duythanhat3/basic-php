<?php

?>
<footer>
    <div id="intro-footer" class="footer-info">
        <div class="container">
            <div class="row">
                <!-- footer logo -->
                <div class="col-md-6 "><img src="themes/img/logo.png" alt="footer logo"/>
                    <p>Curabitur efficitur malesuada velit, in ultricies nisi ornare eu. In a tortor non dolor
                        vestibulum fermentum. Curabitur mattis nulla sem, vel vestibulum erat rutrum nec. Aenean libero
                        tellus, tempus a mi eu, fringilla ullamcorper dui.</p>
                </div>
                <div class="col-md-6">
                    <!--- subscribtion form -->
                    <h3 class="footer-heading">Đăng ký email để nhận được những bài viết mới nhất của tôi</h3>
                    <form class="form-inline" method="post" action="#intro-footer">
                        <div class="form-group">
                            <input name="email" type="email" class="form-control email-btn" placeholder="Nhập email của bạn ở đây">
                        </div>
                        <button type="submit" class="btn btn-default">Đăng ký</button>
                        <?php
                        if($insertEmail){
                            ?>
                            <p style="margin-top: 10px; color: #4cae4c;">Email <?=$email?> đã đăng ký thành công!!!</p>
                        <?
                        }
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- copyright  -->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <p class="copyright text-muted text-center">&copy; Copyright 2018 Blog's Thanh</p>
            </div>
        </div>
    </div>
</footer>
