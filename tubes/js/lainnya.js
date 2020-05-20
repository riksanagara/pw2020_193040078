// Ambil elemen yang dibutuhkan
var keyword = document.getElementById('keyword');
var tombolCari = document.getElementById('tombol-cari');
var container = document.getElementById('container');


// tambahkan event ketika keyword ditulis
keyword.addEventListener('keyup', function(){

    var xhr = new XMLHttpRequest();

    // kesiapan ajax
    xhr.onreadystatechange = function(){
        if(xhr.readyState == 4 && xhr.status == 200){
            container.innerHTML = xhr.responseText;
        }
    }


    // ekesekusi ajax
    xhr.open('GET', '../ajax/lainnya.php?keyword=' + keyword.value, true);
    xhr.send();

    
});