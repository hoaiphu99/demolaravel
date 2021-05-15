"use strict";
$(document).ready(function () {
    $('.btn-insert').click(function () {
        $('.insert-user').css(
            {"display": "contents"}
        );
    });

    $('.btn-submit-user').click(function () {
        $('.insert-user').css(
            {"display": "none"}
        );
    });
});
