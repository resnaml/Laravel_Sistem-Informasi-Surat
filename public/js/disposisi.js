
$(function()
{   
    $('#isi_ditolak').hide();
    $('#example').change(function()
    {
        if ($('status').val() != true) {
            $('#checkbox').hide();
            $('#isi_oleh').hide();
            $('#checkbox').hide();
            $('#no_disposisi').hide();
            $('#sign').hide();
            $('#form-ttd').hide();
            $('#isi_ditolak').show();
        }
    });
});