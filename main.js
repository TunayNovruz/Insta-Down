/**
 * Created by Tunay on 7/23/2017.
 */
function yoxla() {
    var input = document.getElementById('s_1').value;
    var $ioo = input.search(/http(?:s)?:\/\/(?:www\.)?instagram\.com\/p\/([\w\d\/?\-\=\',]*)/);
    var $yoo = input.search(/(?:https?:\/\/)?(?:youtu\.be\/|(?:www\.)?youtube\.com\/watch(?:\.php)?\?.*v=)([a-zA-Z0-9\-_]+)/);
    if($ioo >=0 || $yoo>=0){
        return true;
    }
    else{
        alert('Link Doğru deyil');
        return false;
    }
}