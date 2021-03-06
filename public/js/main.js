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
        .then(response => {
            if (!response.ok) {
                alert('Có lỗi xảy ra vui lòng kiểm tra lại')
                return
            }
            return response.json()
        })
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
        .then(response => {
            if (!response.ok) {
                alert('Có lỗi xảy ra vui lòng kiểm tra lại')
                return
            }
            return response.json()
        })
        .then(result => {
            if (result.status === fails_code)
            {
                alert('Username này đã tồn tại!')
                return
            }
            if (result.data === null) {
                alert(`${result.message}`)
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
                            </tr>` + tbodyElement.innerHTML

                document.querySelector(".insert-form").style.display = "none"

                alert(`${result.message}`)
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
            .then(response => {
                if (!response.ok) {
                    alert('Có lỗi xảy ra vui lòng kiểm tra lại')
                    return
                }
                return response.json()
            })
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
        .then(response => {
            if (!response.ok) {
                alert('Có lỗi xảy ra vui lòng kiểm tra lại')
                return
            }
            return response.json()
        })
        .then(result => {
            if (result.data !== null) {
                alert(`${result.message}`)
                document.querySelector(".update-img").src = result.data[0].avatar
            }
            else {
                alert(`${result.message}`)
            }
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
        .then(response => {
            if (!response.ok) {
                alert('Có lỗi xảy ra vui lòng kiểm tra lại')
                return
            }
            return response.json()
        })
        .then(result => {
            if (result.status === 0) {
                alert(`${result.message}`)
                return
            }
            const tbodyElement = document.querySelector("#list-data")
            const trElement = document.querySelector(`tr[data-id="${id}"]`)
            tbodyElement.removeChild(trElement)

            const countElement = document.querySelector("#trashed")
            let count = parseInt(countElement.textContent)
            count += 1
            countElement.textContent = String(count)
            alert(`${result.message}`)
        })
        .catch(error => {
            console.log(error)
        })
}

const forceDeleteUser = async (id) => {

    await fetch(`${API_URL}/user/${id}/force`, {
        method: 'DELETE',
        headers: {
            APIKEY: API_KEY
        }
    })
        .then(response => {
            if (!response.ok) {
                alert('Có lỗi xảy ra vui lòng kiểm tra lại')
                return
            }
            return response.json()
        })
        .then(result => {
            if (result.status === 0) {
                alert(`${result.message}`)
                return
            }
            const tbodyElement = document.querySelector("#list-data")
            const trElement = document.querySelector(`tr[data-id="${id}"]`)
            tbodyElement.removeChild(trElement)

            alert(`${result.message}`)
        })
        .catch(error => {
            console.log(error)
        })
}

const restoreUser = async (id) => {

    await fetch(`${API_URL}/user/${id}/restore`, {
        method: 'PATCH',
        headers: {
            APIKEY: API_KEY
        }
    })
        .then(response => {
            if (!response.ok) {
                alert('Có lỗi xảy ra vui lòng kiểm tra lại')
                return
            }
            return response.json()
        })
        .then(result => {
            if (result.status === 0) {
                alert(`${result.message}`)
                return
            }
            const tbodyElement = document.querySelector("#list-data")
            const trElement = document.querySelector(`tr[data-id="${id}"]`)
            tbodyElement.removeChild(trElement)

            alert(`${result.message}`)
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
        .then(response => {
            if (!response.ok) {
                alert('Có lỗi xảy ra vui lòng kiểm tra lại')
                return
            }
            return response.json()
        })
        .then(result => {
            if (result.data !== null) {
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

                alert(`${result.message}`)
            }
            else {
                alert(`${result.message}`)
            }

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
            if (!response.ok) {
                alert('Có lỗi xảy ra vui lòng kiểm tra lại')
                return
            }
            return response.json()
        })
        .then(result => {
            if (result.data === null) {
                alert(`${result.message}`)
                return
            }
            alert(`${result.message}`)
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
        .then(response => {
            if (!response.ok) {
                alert('Có lỗi xảy ra vui lòng kiểm tra lại')
                return
            }
            return response.json()
        })
        .then(result => {
            if (result.status === 0) {
                alert(`${result.message}`)
                return
            }
            const tbodyElement = document.querySelector("#list-data")
            const trElement = document.querySelector(`tr[data-id="${id}"]`)
            tbodyElement.removeChild(trElement)

            const countElement = document.querySelector("#trashed")
            let count = parseInt(countElement.textContent)
            count += 1
            countElement.textContent = String(count)
            alert(`${result.message}`)
        })
        .catch(error => {
            console.log(error)
        })
}

const forceDeletePost = async (id) => {

    await fetch(`${API_URL}/post/${id}/force`, {
        method: 'DELETE',
        headers: {
            APIKEY: API_KEY
        }
    })
        .then(response => {
            if (!response.ok) {
                alert('Có lỗi xảy ra vui lòng kiểm tra lại')
                return
            }
            return response.json()
        })
        .then(result => {
            if (result.status === 0) {
                alert(`${result.message}`)
                return
            }
            const tbodyElement = document.querySelector("#list-data")
            const trElement = document.querySelector(`tr[data-id="${id}"]`)
            tbodyElement.removeChild(trElement)

            alert(`${result.message}`)
        })
        .catch(error => {
            console.log(error)
        })
}

const restorePost = async (id, user) => {
    if (user == null) {
        alert('Người dùng đã bị xóa, không thể khôi phục')
        return
    }

    await fetch(`${API_URL}/post/${id}/restore`, {
        method: 'PATCH',
        headers: {
            APIKEY: API_KEY
        }
    })
        .then(response => {
            if (!response.ok) {
                alert('Có lỗi xảy ra vui lòng kiểm tra lại')
                return
            }
            return response.json()
        })
        .then(result => {
            if (result.status === 0) {
                alert(`${result.message}`)
                return
            }
            const tbodyElement = document.querySelector("#list-data")
            const trElement = document.querySelector(`tr[data-id="${id}"]`)
            tbodyElement.removeChild(trElement)

            alert(`${result.message}`)
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
        .then(response => {
            if (!response.ok) {
                alert('Có lỗi xảy ra vui lòng kiểm tra lại')
                return
            }
            return response.json()
        })
        .then(result => {
            if (result.status === 0) {
                alert(`${result.message}`)
                return
            }
            if (document.querySelector("#list-data")) {
                const tbodyElement = document.querySelector("#list-data")
                const trElement = document.querySelector(`tr[data-id="${id}"]`)
                tbodyElement.removeChild(trElement)

                const countElement = document.querySelector("#trashed")
                let count = parseInt(countElement.textContent)
                count += 1
                countElement.textContent = String(count)
            }
            else if (document.querySelector("#comment")) {
                const commentBlock = document.querySelector("#comment")
                const cardBlock = document.querySelector('.card')
                commentBlock.removeChild(cardBlock)
            }
            alert(`${result.message}`)
        })
        .catch(error => {
            console.log(error)
        })
}

const forceDeleteComment = async (id) => {

    await fetch(`${API_URL}/comment/${id}/force`, {
        method: 'DELETE',
        headers: {
            APIKEY: API_KEY
        }
    })
        .then(response => {
            if (!response.ok) {
                alert('Có lỗi xảy ra vui lòng kiểm tra lại')
                return
            }
            return response.json()
        })
        .then(result => {
            if (result.status === 0) {
                alert(`${result.message}`)
                return
            }
            const tbodyElement = document.querySelector("#list-data")
            const trElement = document.querySelector(`tr[data-id="${id}"]`)
            tbodyElement.removeChild(trElement)

            alert(`${result.message}`)
        })
        .catch(error => {
            console.log(error)
        })
}

const restoreComment = async (id, user, post) => {

    if (user == null || post == null) {
        alert('Người dùng hoặc bài đăng đã bị xóa, không thể khôi phục')
        return
    }

    await fetch(`${API_URL}/comment/${id}/restore`, {
        method: 'PATCH',
        headers: {
            APIKEY: API_KEY
        }
    })
        .then(response => {
            if (!response.ok) {
                alert('Có lỗi xảy ra vui lòng kiểm tra lại')
                return
            }
            return response.json()
        })
        .then(result => {
            if (result.status === 0) {
                alert(`${result.message}`)
                return
            }
            const tbodyElement = document.querySelector("#list-data")
            const trElement = document.querySelector(`tr[data-id="${id}"]`)
            tbodyElement.removeChild(trElement)

            alert(`${result.message}`)
        })
        .catch(error => {
            console.log(error)
        })
}

// Like
const likePost = async (event, postId, userId) => {
    const data = {post_id: postId, user_id: userId, status: 'liked'}

    await fetch(`${API_URL}/like/handle-like`, {
        method: 'POST',
        headers:{
            'APIKEY': API_KEY,
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(data),
    })
        .then(response => {
            if (!response.ok) {
                alert('Có lỗi xảy ra vui lòng kiểm tra lại')
                return
            }
            return response.json()
        })
        .then(result => {
            if (result.data === null) {
                alert(`${result.message}`)
                return
            }
            if (event.target.classList.contains('liked')) {
                const likeCountElement = document.querySelector(`#post-${postId}`)
                let likeCount = likeCountElement.textContent
                let updateLikeCount = parseInt(likeCount) - 1
                likeCountElement.textContent = String(updateLikeCount)
            }
            else {
                const likeCountElement = document.querySelector(`#post-${postId}`)
                let likeCount = likeCountElement.textContent
                let updateLikeCount = parseInt(likeCount) + 1
                likeCountElement.textContent = String(updateLikeCount)
            }
            event.target.classList.toggle('liked')
            console.log('success')
        })
        .catch(err => {
            console.log(err)
        })
}

const createLike = async (data) => {
    const formData = new FormData();
    formData.append('user_id', data.user_id);
    formData.append('post_id', data.post_id);

    await fetch(`${{API_URL}}/like`, {
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


