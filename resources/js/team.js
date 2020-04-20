$(function() {
    $('.choose-side a').click(function(e) {
        var side = $(this).data('side');
        $('input[name="side"]').val(side);
        $('input:checkbox').prop('checked', false);
    });

    $('#teamForm').submit(function(e) {
        var numHeroes = $('input:checkbox:checked').length;
        if(numHeroes > 5 || numHeroes < 3) {
            alert('Please choose between 3-5 heroes.')
            e.preventDefault();
        }
    });

    $('.choose-side a')[0].click();
});
