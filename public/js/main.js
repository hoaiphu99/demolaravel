﻿const API_URL = "http://project-api-levi.herokuapp.com/api"
const API_KEY = "VSBG"

// User //
const getUser = async () => {
    await fetch(`${API_URL}/user`, {
        method: 'GET',
        headers: {
            'APIKEY': API_KEY
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

const postUser = async (data) => {
    const formData = new FormData()
    formData.append('username', data.username)
    formData.append('password', data.password)
    formData.append('name', data.name)
    formData.append('email', data.email)
    formData.append('phone', data.phone)
    formData.append('birthday', data.birthday)
    formData.append('avatar', data.avatar[0])
    await fetch(`${API_URL}/user`, {
        method: 'POST',
        headers: {
            'APIKEY': API_KEY
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
                        <td><a href="/admin/user/${result.data[0].id}"><i class="fas fa-edit"></i></a></td>
                        <td><i class="fas fa-trash" style="cursor: pointer" onclick="deleteUser(${result.data[0].id})"></i></td>
                        </tr>`

            tbodyElement.innerHTML += textNode
            document.querySelector(".insert-user").style.display = "none"

            alert('Thêm thành công!')
            console.log(result.data[0])
        })
        .catch(error => {
            console.log(error)
        })
}

const updateUser = async (data) => {
    console.log(data)
    const formData = new FormData()
    formData.append('username', data.username)
    formData.append('password', data.password)
    formData.append('name', data.name)
    formData.append('email', data.email)
    formData.append('phone', data.phone)
    formData.append('birthday', data.birthday)
    formData.append('avatar', data.avatar[0])
    // formData.append('image', data.prevAvatar)
    await fetch(`${API_URL}/user/${data.id}`, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json',
            APIKEY: API_KEY
        },
        body: JSON.stringify(data)
    })
        .then(response => response.json())
        .then(result => {
            console.log(result)
        })
        .catch(error => {
            console.log(error)
        })
}

const deleteUser = async (id) => {

    await fetch(`${API_URL}/user/${id}`, {
        method: 'DELETE',
        headers: {
            APIKEY: API_KEY
        }
    })
        .then(response => response.json())
        .then(result => {
            const tbodyElement = document.querySelector("#list-user")
            const trElement = document.querySelector(`tr[data-id="${id}"]`)
            tbodyElement.removeChild(trElement)

            alert('Xóa thành công!')
        })
        .catch(error => {
            console.log(error)
        })
}

// Common

const hideForm = () => {
    document.querySelector(".insert-user").style.display = "none"
}
