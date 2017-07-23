/**
 * Created by Tunay on 7/23/2017.
 */
function yoxla() {
    var input = document.getElementById('s_1').value;
    var $boo = input.search(/http(?:s)?:\/\/(?:www\.)?instagram\.com\/p\/([\w\d\/?\-\=\',]*)/);
    if($boo >=0){
        return true;
    }
    else{
        alert('Yalnız İnstagram linki daxil edilməlidir');
        return false;
    }
}