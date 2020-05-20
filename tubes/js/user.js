// Ambil elemen yang dibutuhkan
var keyword = document.getElementById('keyworduser');
var tombolCari = document.getElementById('cariuser');
var user = document.getElementById('user');


// tambahkan event ketika keyword ditulis
keyword.addEventListener('keyup', function(){

    var xhr = new XMLHttpRequest();

    // kesiapan ajax
    xhr.onreadystatechange = function(){
        if(xhr.readyState == 4 && xhr.status == 200){
            user.innerHTML = xhr.responseText;
        }
    }


    // ekesekusi ajax
    xhr.open('GET', '../ajax/user.php?keyword=' + keyword.value, true);
    xhr.send();

    
});