<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Downloader</title>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css" type="text/css" >
    <link rel="icon" href="img/icon.png">
</head>
<body>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button id="btn" onclick="clr()" type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <i class="material-icons" style="color: white;">view_headline</i>
            </button>
            <a class="navbar-brand hidden-md hidden-lg" href="index.php"><span>Insta-Down</span></a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <li class="hidden-xs hidden-sm"><a href="index.php"><b>Yüklə</b></a></li>
                <li ><a href="how.php"><b>Necə işlətməli?</b></a></li>
                <li><a href="#"><b>Əlaqə</b></a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-sm-12 how">
            <h2 style="color: rgba(44,44,36,.9);">Mobil Versiya üçün</h2>
            <h2>Addım 1</h2>
            <img src="img/m_step_1.png">
            <h2>Addım 2</h2>
            <img src="img/m_step_2.png">
            <h2>Addım 3</h2>
            <img src="img/m_step_3.png">
        </div>

        <div class="col-md-6 col-sm-12 how-p">
            <h2 style="color: rgba(44,44,36,.9);">Brauzer Versiya üçün</h2>
            <h2>Addım 1: Şəkli seçin</h2>
            <img src="img/p_step_1.jpg">
            <h2>Addım 2:Linki kopyalayın</h2>
            <img src="img/p_step_2.jpg">
            <h2>Addım 3:Əlavə edin</h2>
            <img src="img/p_step_3.jpg">
        </div>
        <div class="col-md-6 col-sm-12"></div>
    </div>
</div>
<div class="panel-footer">
    <p class="text-center">&copy;<?=Date('Y')?> Insta-Down</p>
</div>
<script type='text/javascript' src='//platform-api.sharethis.com/js/sharethis.js#property=596e1999b69de60011989f63&product=inline-share-buttons' async='async'></script>
<script src="bootstrap/js/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="main.js"></script>
</body>
</html>
</div>
