<pre>
<?php
/**
 * Created by PhpStorm.
 * User: Tunay
 * Date: 7/23/2017
 * Time: 8:27 AM
 */
    $path= '';
    session_start();
if('POST'==$_SERVER['REQUEST_METHOD'] && !empty($_POST) && $_POST['token']==$_SESSION['token']){
    $url = htmlspecialchars($_POST['url']);
    $netice = get($url);
    preg_match('@<meta property="og:image" content="(.*?)" />@',$netice,$im_url);
    preg_match('@<meta property="og:video" content="(.*?)" />@',$netice,$vi_url);
    if(!empty($vi_url[1])) {
        //get($vi_url[1],2);
        $_SESSION['file'] = $vi_url[1];
        header('Location:download.php');
    }
    elseif(!empty($im_url[1])){
        //get($im_url[1],1);
        $_SESSION['file'] =$im_url[1];
        header('Location:../download.php');
    }
    else{
        $_SESSION['message'] = "Bu şəkil public olaraq paylaşılmayıb";
        header('Location: /');
    }

}
function get($link,$d=0){
    $insta = curl_init();
    curl_setopt($insta,CURLOPT_URL,$link);
    curl_setopt($insta,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($insta,CURLOPT_SSL_VERIFYHOST,false);
    curl_setopt($insta,CURLOPT_SSL_VERIFYPEER,false);
    /* Video və ya Şəkli Serverə yükləmək üçün commentlərii deaktiv edin
    if ($d==2){
        global $path;
        $path= 'temp/'.md5($link).rand(5,10000).'.mp4';
        $fp = fopen($path,'w');
        curl_setopt($insta,CURLOPT_FILE,$fp);
    }
    else if ($d==1){
        global $path;
        $path= 'temp/'.md5($link).rand(5,10000).'.jpg';
        $fp = fopen($path,'w');
        curl_setopt($insta,CURLOPT_FILE,$fp);
    }
    */
    $result = curl_exec($insta);
    curl_close($insta);
    $cf = fopen('count.txt','a');
    fwrite($cf,"--- $link --- \n\t\r");
    fclose($cf);
    return $result;
}


?>
