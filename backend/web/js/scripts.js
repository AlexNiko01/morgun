(function () {
    $(document).ready(function () {


        var body = $('body');
        body.on('click', '.set-lang', (function () {
            var lang = $(this).data('lang');

            $.ajax({
                url: '/admin/lang/set-language',
                type: 'post',
                dataType: 'json',
                data: {
                    lang: lang
                },
                success: function (response) {
                    console.log(response);
                    if (response.success == true) {
                        location.reload();
                    }
                }
            });
        }));
            });

})(jQuery);


