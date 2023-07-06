$('#checkbox').hide();
$('#isi_oleh').hide();
$('#checkbox').hide();
$('#no_disposisi').hide();
$('#sign').hide();
$('#form-ttd').hide();
$('#isi_ditolak').hide();

function handelOnChangeEvent(x){
    if (x === 'Diterima') {
        $('#isi_oleh').show();
        $('#checkbox').show();
        $('#no_disposisi').show();
        $('#sign').show();
        $('#form-ttd').show();
        $('#checkbox').show();
        $('#isi_ditolak').hide();
    } else {
        $('#checkbox').hide();
        $('#isi_oleh').hide();
        $('#checkbox').hide();
        $('#no_disposisi').hide();
        $('#sign').hide();
        $('#form-ttd').hide();
        $('#isi_ditolak').show();
    }
}