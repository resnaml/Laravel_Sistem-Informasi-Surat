var sign = $('#sign').signature({ syncField:'#asd', syncFormat:'PNG' });
        $('#clear').click(function(e){
            e.preventDefault();
            sign.signature('clear');
            $('#signature').val('');
        });

$('#hide1').hide();
$('#hide2').hide();