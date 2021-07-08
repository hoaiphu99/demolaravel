"use strict";
$(document).ready(function () {
    $('.btn-insert').click(function () {
        $('.insert-form').css(
            {"display": "contents"}
        );
    });

    $('.btn-submit-user').click(function () {
        $('.insert-form').css(
            {"display": "none"}
        );
    });
});
