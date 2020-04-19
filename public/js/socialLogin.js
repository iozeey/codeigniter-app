$(document).ready(function () {
    $('a[data-social-login]').on('click', function (e) {
        var $this = $(this);
        var socialId = $(this).attr('id');
        var url = "login";
        // $('#contestId').val(socialId);
        // alert($('#contestId').val());
        $.ajax({
            type: "get",
            url: url,
            data: socialId,
            beforeSend: function () {
               // alert('beforeSend');
            },
            success: function (data) {
                var dataDecoded = JSON.parse(data);
                console.log(dataDecoded);
                tokenForCompletion = dataDecoded.token;

                if (dataDecoded.token === "FTR") {
                    $('#modalFanTag').modal('toggle');
                }


            },
            complete: function () {
           // alert('completed');
        }
        }).done(function () {
            // $($this).children().text('Join Contest');
        });
    });


});