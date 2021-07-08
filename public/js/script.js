"use strict";
$(document).ready(function () {
    $('.btn-insert').click(function () {
        $('.insert-form').css(
            {"display": "contents"}
        );
    });

    const inputAvatar = $('#image')
    inputAvatar.change(() => {
        console.log(inputAvatar[0])
        if (inputAvatar[0].files && inputAvatar[0].files[0]) {
            const reader = new FileReader()

            reader.onload = (e) => {
                $('#img-avatar')
                    .attr('src', e.target.result)
                    .css({width: '50%', height: '200px',})

            }

            reader.readAsDataURL(inputAvatar[0].files[0])
        }
    })
});
