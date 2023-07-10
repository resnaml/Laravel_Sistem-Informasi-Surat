$('#isi_oleh').hide();
$('#checkbox').hide();
$('#isi_ditolak').hide();
$('#acc_admin').hide();

function handelOnChangeEvent(x){
    if (x === 'Proses') {
        $('#isi_oleh').show();
        $('#checkbox').show();
        $('#no_disposisi').show();
        $('#isi_ditolak').hide();
    } else {
        $('#checkbox').hide();
        $('#isi_oleh').hide();
        $('#checkbox').hide();
        $('#isi_ditolak').show();
    }
}