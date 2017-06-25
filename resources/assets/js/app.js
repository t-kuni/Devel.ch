Cookies = require('js-cookie');

$(function() {
    var pw = Cookies.get('password');
    $input = $('input[name="password"]');
    $input.val(pw);

    $('.save-pw-to-cookie').on('click', function() {
        var pw = $input.val();
        Cookies.set('password', pw);
    });
});
