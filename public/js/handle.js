function Validator(options) {

    function getParent(element, selector) {
        while(element.parentElement) {
            if(element.parentElement.matches(selector)) {
                return element.parentElement
            }
            element = element.parentElement
        }
    }

    var selectorRules = {}

    // Ham thuc hien validate
    function validate(inputElement, rule) {
        var errorElement = getParent(inputElement, options.formGroupSelector).querySelector(options.errorSelector)
        var errorMessage

        // Lay ra cac rules cua selector
        var rules = selectorRules[rule.selector];

        // Lap qua tung rule & kiem tra
        // Neu co loi dung viec kiem tra
        for(var i = 0; i < rules.length; i++) {
            switch(inputElement.type) {
                case 'radio':
                    errorMessage = rules[i](
                        formElement.querySelector(rule.selector + ':checked')
                    )
                    break;
                case 'checkbox':
                    errorMessage = rules[i](
                        formElement.querySelector(rule.selector + ':checked')
                    )
                    break;

                default:
                    errorMessage = rules[i](inputElement.value)
                    break;
            }

            if(errorMessage) break;
        }

        if(errorMessage) {
            errorElement.innerText = errorMessage
            getParent(inputElement, options.formGroupSelector).classList.add('invalid')
        }
        else {
            errorElement.innerText = ''
            getParent(inputElement, options.formGroupSelector).classList.remove('invalid')
        }

        return !errorMessage
    }

    // Lay elements cua form can validate
    var formElement = document.querySelector(options.form)

    if(formElement) {
        // Khi submit form
        formElement.onsubmit = function(e) {
            e.preventDefault();

            var isFormValid = true;
            // Lap qua tung rule & validate
            options.rules.forEach(function(rule) {
                var inputElement = formElement.querySelector(rule.selector)
                var isValid = validate(inputElement, rule)
                if(!isValid) {
                    isFormValid = false
                }
            });

            if(isFormValid) {
                // Truong hop submit voi js
                if(typeof options.onSubmit === 'function') {
                    var enableInputs = formElement.querySelectorAll('[name]')
                    var formValues = Array.from(enableInputs).reduce(function(values, input) {
                        switch(input.type) {
                            case 'radio':
                                values[input.name] = formElement.querySelector('input[name="' + input.name + '"]:checked').value
                                break
                            case 'checkbox':
                                if (!input.matches(':checked')) {
                                    return values
                                }
                                if (!Array.isArray(values[input.name])) {
                                    values[input.name] = []
                                }
                                values[input.name].push(input.value)
                                break
                            case 'file':
                                values[input.name] = input.files
                                break
                            default:
                                values[input.name] = input.value
                                break
                        }

                        return values
                    }, {})
                    options.onSubmit(formValues)
                }
                // Truong hop submit voi hanh vi mac dinh
                else {
                    formElement.submit()
                }
            }
        }
        // Xu ly lap qua moi rule & lang nghe su kien
        options.rules.forEach(function(rule) {

            // Luu lai cac rules cho moi input
            if(Array.isArray(selectorRules[rule.selector])) {
                selectorRules[rule.selector].push(rule.test)
            } else {
                selectorRules[rule.selector] = [rule.test]
            }

            var inputElements = formElement.querySelectorAll(rule.selector)

            Array.from(inputElements).forEach(function(inputElement) {
                if(inputElement) {
                    // Truong hop blue khoi input
                    inputElement.onblur = function() {
                        validate(inputElement, rule)
                    }

                    // Truong hop khi nguoi dung nhap vao input
                    inputElement.oninput = function() {
                        var errorElement = getParent(inputElement, options.formGroupSelector).querySelector(options.errorSelector)
                        errorElement.innerText = ''
                        getParent(inputElement, options.formGroupSelector).classList.remove('invalid')
                    }
                }
            })
        })
    }
}

// Rules
Validator.isRequired = function(selector, msg) {
    return {
        selector: selector,
        test: function(val) {
            return val ? undefined : msg || 'Vui lòng nhập trường này'
        }
    }
}

Validator.isEmail = function(selector, msg) {
    return {
        selector: selector,
        test: function(val) {
            var regex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/
            return regex.test(val) ? undefined : msg || 'Trường này phải là email'
        }
    }
}

Validator.minLength = function(selector, min, msg) {
    return {
        selector: selector,
        test: function(val) {
            return val.length >= min ? undefined : msg || 'Vui lòng nhập tối thiểu 6 ký tự'
        }
    }
}

Validator.isConfirmed = function(selector, getConfirmValue, msg) {
    return {
        selector: selector,
        test: function(val) {
            return val === getConfirmValue()  ? undefined : msg || 'Giá trị nhập vào không đúng'
        }
    }
}
const tbodyElement = document.querySelector("#list-user")
console.log(tbodyElement.innerHTML)
const postUser = (data) => {
    const formData = new FormData()
    formData.append('username', data.username)
    formData.append('password', data.password)
    formData.append('name', data.name)
    formData.append('email', data.email)
    formData.append('phone', data.phone)
    formData.append('birthday', data.birthday)
    formData.append('avatar', data.avatar[0])
    fetch('http://project-api-levi.herokuapp.com/api/user', {
        method: 'POST',
        headers: {
            'APIKEY': 'VSBG'
        },
        body: formData
    })
        .then(response => response.json())
        .then(result => {
            const tbodyElement = document.querySelector("#list-user")

            const textNode = `<tr>
                        <th scope="row">${result.data[0].id}</th>
                        <td>${result.data[0].username}</td>
                        <td>${result.data[0].name}</td>
                        <td>${result.data[0].email}</td>
                        <td>${result.data[0].phone}</td>
                        <td>${result.data[0].birthday}</td>
                        <td><a href="/admin/user/${result.data[0].id}"><b>Sửa</b></a></td>
                        <td>
                            <form action="/admin/user/delete/${result.data[0].id}" method="post">
                                <input class="btn btn-danger" type="submit" value="Xóa"/>
                            </form>
                        </td>
                        </tr>`

            tbodyElement.innerHTML += textNode
                console.log(result.data[0])
        })
        .catch(error => {
            console.log(error)
        })
}

const getUser = () => {
    fetch('http://project-api-levi.herokuapp.com/api/user', {
        method: 'GET',
        headers: {
            'APIKEY': 'VSBG'
        }
    })
        .then(response => response.json())
        .then(result => {
            console.log(result)
        })
        .catch(error => {
            console.log(error)
        })
}
