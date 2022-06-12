$(document).ready(function(){
    $('.tombol-cari').hide();


    $('#keyword').on('keyup',function(){

        //ajax menggunakan load
        // $('#container').load('ajax/mahasiswa.php?keyword='+$('#keyword').val());

        // ajax menggunakan get
        $.get('ajax/mahasiswa.php?keyword='+$('#keyword').val(),function(data){
            $('#container').html(data)
        })

    })
})