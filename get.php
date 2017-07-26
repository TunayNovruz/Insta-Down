<?php
ob_start();
$path= '';
session_start();
$url = htmlspecialchars($_POST['url']);
if('POST'==$_SERVER['REQUEST_METHOD'] && !empty($_POST) && $_POST['token']==$_SESSION['token']){
    preg_match('/(?:https?:\/\/)?(?:youtu\.be\/|(?:www\.)?youtube\.com\/watch(?:\.php)?\?.*v=)([a-zA-Z0-9\-_]+)/',$url,$y_match);
    preg_match('/http(?:s)?:\/\/(?:www\.)?instagram\.com\/p\/([\w\d\/?\-\=\\\',]*)/',$url,$i_match);
    if(!empty($i_match)){
        get_insta($url);
    }
    elseif(!empty($y_match)){
        get_youtube($url);
    }
    else{
        header('Location: /');
    }
}
    function get_insta($link){
    $netice = get($link);
    preg_match('@<meta property="og:image" content="(.*?)" />@',$netice,$im_url);
    preg_match('@<meta property="og:video" content="(.*?)" />@',$netice,$vi_url);
    if(!empty($vi_url[1])) {
        $_SESSION['file'] = $vi_url[1];
        header('Location: download.php');
    }
    elseif(!empty($im_url[1])){
        $_SESSION['file'] =$im_url[1];
        header('Location: download.php');
    }
    else{
        $_SESSION['message'] = "Bu şəkil public olaraq paylaşılmayıb";
        header('Location: /');
    }
}
    function get($link){
    $insta = curl_init();
    curl_setopt($insta,CURLOPT_URL,$link);
    curl_setopt($insta,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($insta,CURLOPT_SSL_VERIFYHOST,false);
    curl_setopt($insta,CURLOPT_SSL_VERIFYPEER,false);
    $result = curl_exec($insta);
    curl_close($insta);
    $cf = fopen('count.txt','a');
    fwrite($cf,"--- $link --- \n\t\r");
    fclose($cf);
    return $result;
}
    function get_youtube($link){
        //parse_str( parse_url( $link, PHP_URL_QUERY ), $my_array_of_vars );
        //$id = $my_array_of_vars['v'];
        $id= get_youtube_id($link);
        $format = 'video/mp4'; //$_GET['fmt']; //the MIME type of the video. e.g. video/mp4, video/webm, etc.
        parse_str(file_get_contents_curl("http://youtube.com/get_video_info?video_id=".$id),$info); //decode the data
        $streams = $info['url_encoded_fmt_stream_map']; //the video's location info
        $streams = explode(',',$streams);
        //print_r($info);
        //print_r($streams);
        foreach($streams as $stream){
            parse_str($stream,$data); //decode the stream
            //print_r($data);
           if(stripos($data['type'],$format) !== false){ //We've found the right stream with the correct format
                 $url = $data['url'].'&amp;signature='.$data['sig'];
                $_SESSION['file'] = $url;
                $_SESSION['yout'] = 'Youtube';
                header('Location: download.php');
             }
        }
 }
function get_youtube_id($url)
{
    if (stristr($url,'youtu.be/'))
    {preg_match('/(https:|http:|)(\/\/www\.|\/\/|)(.*?)\/(.{11})/i', $url, $final_ID); return $final_ID[4]; }
    else
    {
        preg_match('/(https:|http:|):(\/\/www\.|\/\/|)(.*?)\/(embed\/|watch.*?v=|)([a-z_A-Z0-9\-]{11})/i', $url, $IDD);
        //print_r($IDD);
        //exit;
        return $IDD[5]; }
}
function file_get_contents_curl($url) {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);

    $data = curl_exec($ch);
    curl_close($ch);

    return $data;
}

?>
