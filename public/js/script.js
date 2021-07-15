"use strict";
$(document).ready(function () {
    $('.btn-insert').click(function () {
        $('.insert-form').css(
            {"display": "contents"}
        );
    });

    const showImage = (element) => {
        console.log(element[0])
        if (element[0].files && element[0].files[0]) {
            const reader = new FileReader()

            reader.onload = (e) => {
                $('#img-avatar')
                    .attr('src', e.target.result)
                    .css({width: '50%', height: 'auto',})

            }

            reader.readAsDataURL(element[0].files[0])
        }
    }

    const inputImage = $('#image')
    const inputAvatar = $('#avatar')
    const content = $('#content-post')

    inputImage.change(() => {
        showImage(inputImage)
    })

    inputAvatar.change(() => {
        showImage(inputAvatar)
    })

    const formCreate = $('#form-create')
    const btnSubmit = $('#submitBtn')
    btnSubmit.click(() => {
        if (inputImage[0].files.length === 0) {
            alert('Chưa chọn hình')
            return
        }
        if (content[0].value === "") {
            alert('Chưa nhập nội dung')
        }
        else {
            formCreate.submit()
        }
    })
});
