<?php
ob_start();
include 'menu.html';

session_start();
if (!empty($_SESSION['message'])){
echo <<<HTML
<script> alert('{$_SESSION['message']}');</script>
HTML;
unset($_SESSION['message']);
}
?>

<div class="container-fluid">
    <div class="row main">
        <div class="col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2 col-xs-12 col-sm-12 text-center">
            <h1>Online Instagram Foto,Video Və Youtube Video yükləmə</h1>
            <h1>
                <i class="glyphicon glyphicon-arrow-down"></i>
                Kopyaladığınız linki buraya əlavə edin
                <i class="glyphicon glyphicon-arrow-down"></i>
            </h1>
        </div>
        <div class="col-md-8 col-md-offset-2 col-lg-offset-2 col-xs-12 col-sm-12 search">
            <form action="get.php" method="post" onsubmit="return yoxla()">
                <div class="input-group">
                    <?php $_SESSION['token']= sha1(md5(rand(10000,999999))); ?>
                    <input type="hidden" value="<?=$_SESSION['token']?>" name="token">
                    <input type="url" id="s_1" class="form-control" placeholder="Nümunə link : https://www.instagram.com/p/BW3AmpLjeCW" name="url" required>
                    <div class="input-group-btn">
                        <button class="btn btn-default" id="s_2" type="submit">
                            <span class="glyphicon glyphicon-download"></span> Yüklə
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <br>
        <div class="paylash col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3 col-xs-12 col-sm-12 ">
        <div class="sharethis-inline-share-buttons"></div>
        </div>
</div>

<?php include 'footer.html';?>
