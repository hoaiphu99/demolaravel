const API_URL = "http://project-api-levi.herokuapp.com/api"
const API_KEY = "VSBG"
const IMGUR_API_URL = "https://api.imgur.com/3"
const IMGUR_CLIENT_ID = "db12bcd4537c063"
const fails_code = 0
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

const createUser = async (data) => {
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
            if (result.status == fails_code)
            {
                alert('Username này đã tồn tại!')
            }
            else
            {
                const tbodyElement = document.querySelector("#list-data")

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
                document.querySelector(".insert-form").style.display = "none"

                alert('Thêm thành công!')
                console.log(result.data[0])
            }

            // const tbodyElement = document.querySelector("#list-user")

            // const textNode = `<tr>
            //             <th scope="row">${result.data[0].id}</th>
            //             <td>${result.data[0].username}</td>
            //             <td>${result.data[0].name}</td>
            //             <td>${result.data[0].email}</td>
            //             <td>${result.data[0].phone}</td>
            //             <td>${result.data[0].birthday}</td>
            //             <td><a href="/admin/user/${result.data[0].id}"><i class="fas fa-edit"></i></a></td>
            //             <td><i class="fas fa-trash" style="cursor: pointer" onclick="deleteUser(${result.data[0].id})"></i></td>
            //             </tr>`

            // tbodyElement.innerHTML += textNode
            // document.querySelector(".insert-user").style.display = "none"

            // alert('Thêm thành công!')
            // console.log(result.data[0])
        })
        .catch(error => {
            console.log(error)
        })
}

const updateUser = async (data) => {
    console.log(data)

    if (data.avatar.length === 0) {
        data.avatar = data.prevAvatar
    }
    else {
        const formdata = new FormData();
        formdata.append("image", data.avatar[0]);
        await fetch(`${IMGUR_API_URL}/image`, {
            method: 'POST',
            headers: {
                'Authorization': `Client-ID ${IMGUR_CLIENT_ID}`
            },
            body: formdata
        })
            .then(response => response.json())
            .then(result => {
                data.avatar = result.data.link
                console.log(result)
            })
            .catch(error => console.log(error))
    }
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
            alert('Cập nhật thành công!')
            document.querySelector(".update-img").src = result.data.avatar
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
            const tbodyElement = document.querySelector("#list-data")
            const trElement = document.querySelector(`tr[data-id="${id}"]`)
            tbodyElement.removeChild(trElement)

            alert('Xóa thành công!')
        })
        .catch(error => {
            console.log(error)
        })
}

// post
const createPost = async (data) => {
    const formData = new FormData()
    formData.append('content', data.content)
    formData.append('image', data.image[0])
    formData.append('user_id', data.user_id)
    await fetch(`${API_URL}/post`, {
        method: 'POST',
        headers: {
            'APIKEY': API_KEY
        },
        body: formData
    })
        .then(response => response.json())
        .then(result => {
            const tbodyElement = document.querySelector("#list-data")

            tbodyElement.innerHTML = `<tr>
                        <th scope="row">${result.data[0].id}</th>
                        <td>${result.data[0].content}</td>
                        <td><img src="${result.data[0].image}" alt="" height="100" width="100"></td>
                        <td>${result.data[0].user.name}</td>
                        <td><a style="text-decoration: none; color: #858796;" href="/admin/post/comments/${result.data[0].id}">
                        <i class="fas fa-comments"></i> ${result.data[0].comment_count}</a></td>
                        <td><a style="text-decoration: none; color: #858796;" href="/admin/post/likes/${result.data[0].id}">
                        <i class="fas fa-heart" ></i> ${result.data[0].like_count}</a></td>
                        <td><a href="/admin/post/${result.data[0].id}"><i class="fas fa-edit"></i></a></td>
                        <td><i class="fas fa-trash" style="cursor: pointer" onclick=""></i></td>
                        </tr>` + tbodyElement.innerHTML
            document.querySelector(".insert-form").style.display = "none"

            alert('Thêm thành công!')
            console.log(result.data[0])
        })
        .catch(error => {
            console.log(error)
        })
}

const updatePost = async (data) => {
    console.log(data)
    await fetch(`${API_URL}/post/${data.id}`, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json',
            APIKEY: API_KEY
        },
        body: JSON.stringify(data)
    })
        .then(response => {
            response.json()
        })
        .then(result => {
            alert('Cập nhật thành công!')
            console.log(result)
        })
        .catch(error => {
            console.log(error)
        })
}

const deletePost = async (id) => {

    await fetch(`${API_URL}/post/${id}`, {
        method: 'DELETE',
        headers: {
            APIKEY: API_KEY
        }
    })
        .then(response => response.json())
        .then(result => {
            const tbodyElement = document.querySelector("#list-data")
            const trElement = document.querySelector(`tr[data-id="${id}"]`)
            tbodyElement.removeChild(trElement)

            alert('Xóa thành công!')
        })
        .catch(error => {
            console.log(error)
        })
}

// Comment
const deleteComment = async (id) => {

    await fetch(`${API_URL}/comment/${id}`, {
        method: 'DELETE',
        headers: {
            APIKEY: API_KEY
        }
    })
        .then(response => response.json())
        .then(result => {
            if (document.querySelector("#list-data")) {
                const tbodyElement = document.querySelector("#list-data")
                const trElement = document.querySelector(`tr[data-id="${id}"]`)
                tbodyElement.removeChild(trElement)
            }
            else if (document.querySelector("#comment")) {
                const commentBlock = document.querySelector("#comment")
                const cardBlock = document.querySelector('.card')
                commentBlock.removeChild(cardBlock)
            }
            alert('Xóa thành công!')
        })
        .catch(error => {
            console.log(error)
        })
}

// Like
const likePost = async (event, id) => {
    console.log(event)
    event.target.classList.toggle('liked')
    //await fetch(`${API_URL}/like/${id}`)
}

const createLike = async(user_id, post_id) => {
    const formData = new FormData();
    formData.append('user_id', user_id);
    formData.append('post_id', post_id);

    await fetch(`${{API_URL}}/post`, {
        method: 'POST',
        headers:{
            'APIKEY': API_KEY
        },
        body: formData
    })
        .then(response => response.json())
        .then(result => {
            console.log(result.data[0]);
        })
        .catch(error => {
            console.log(error);
        })
}

// Common

const hideForm = () => {
    document.querySelector(".insert-form").style.display = "none"
}


