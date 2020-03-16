// Signin
const signinFormBtn = document.getElementById('signinFormBtn');
const signinFormLogin = document.getElementById('signinFormLogin');
const signinFormPassword = document.getElementById('signinFormPassword');
const signinFormError = document.getElementById('signinFormError');

signinFormBtn.addEventListener('click', () => {
    signinFormLogin.classList.remove('is-invalid');
    signinFormPassword.classList.remove('is-invalid');

    if (signinFormLogin.value < 1 && signinFormPassword.value < 1) {
        signinFormError.innerText = 'Enter login and password';
        signinFormLogin.classList.add('is-invalid');
        signinFormPassword.classList.add('is-invalid');
        return
    }

    if (signinFormLogin.value < 1) {
        signinFormError.innerText = 'Enter login';
        signinFormLogin.classList.add('is-invalid');
        return
    }

    if (signinFormPassword.value < 1) {
        signinFormError.innerText = 'Enter password';
        signinFormPassword.classList.add('is-invalid');
        return
    }

    let req = {
        login: signinFormLogin.value,
        password: signinFormPassword.value,
    }
    sendDataSignin(JSON.stringify(req));
});

async function sendDataSignin(req) {
    let url = window.location.protocol + '//' + window.location.hostname + '/main/signin'
    let response = await fetch(url, {
        method: "POST",
        headers: {
            "Content-Type": "application/json;charset=utf-8"
        },
        body: req,
    });

    let result = await response.json();

    if (!result['result']) {
        signinFormError.innerText = 'Invalid login or password';
        signinFormLogin.classList.add('is-invalid');
        signinFormPassword.classList.add('is-invalid');
    } else {
        document.location.reload(true);
    }
}

// Logout
const logoutFormBtn = document.getElementById('logoutFormBtn');

logoutFormBtn.addEventListener('click', () => {
    let req = {
        logout: true,
    }
    sendDataLogout(JSON.stringify(req));

    async function sendDataLogout(req) {
        let url = window.location.protocol + '//' + window.location.hostname + '/main/logout'
        let response = await fetch(url, {
            method: "POST",
            headers: {
                "Content-Type": "application/json;charset=utf-8"
            },
            body: req,
        });

        let result = await response.json();

        if (result['result']) {
            document.location.reload(true);
        }
    }
});

// Add new task
const addNewTaskBtn = document.getElementById('addNewTaskBtn');
const addNewTaskName = document.getElementById('addNewTaskName');
const addNewTaskEmail = document.getElementById('addNewTaskEmail');
const addNewTaskTextarea = document.getElementById('addNewTaskTextarea');
const addNewTaskError = document.getElementById('addNewTaskError');

addNewTaskBtn.addEventListener('click', () => {
    addNewTaskName.classList.remove('is-invalid');
    addNewTaskEmail.classList.remove('is-invalid');
    addNewTaskTextarea.classList.remove('is-invalid');

    if (addNewTaskName.value < 1) {
        addNewTaskError.innerText = 'Enter name';
        addNewTaskName.classList.add('is-invalid');
        return
    }

    if (!checkEmail(addNewTaskEmail)) {
        addNewTaskError.innerText = 'Invalid email';
        addNewTaskEmail.classList.add('is-invalid');
        return
    }

    if (addNewTaskTextarea.value < 1) {
        addNewTaskError.innerText = 'Enter description of task';
        addNewTaskTextarea.classList.add('is-invalid');
        return
    }

    let req = {
        name: addNewTaskName.value,
        email: addNewTaskEmail.value,
        description: addNewTaskTextarea.value,
    }
    sendDataCreateTask(JSON.stringify(req));
});

async function sendDataCreateTask(req) {
    let url = window.location.protocol + '//' + window.location.hostname + '/main/create-task'
    let response = await fetch(url, {
        method: "POST",
        headers: {
            "Content-Type": "application/json;charset=utf-8"
        },
        body: req,
    });

    let result = await response.json();

    if (!result['result']) {
        addNewTaskError.innerHTML = 'Unexpected error <br> Please try again';
    } else {
        addNewTaskError.innerHTML = '<p style="color:#28a745">Great job! Task added!</p>'
        const addNewTask = document.getElementById('addNewTask');
        const btns = addNewTask.getElementsByClassName('modal-footer')[0];
        btns.style.display = 'none'

        setTimeout(() => {
            document.location.reload(true)
        }, 1000);
    }
}

function checkEmail(email) {
    const regex = /^[-._aA-zZ0-9]+@(?:[aA-zZ0-9][-aA-zZ0-9]+\.)+[aA-zZ]{2,6}$/;
    return regex.test(email.value);
}

// Edit task
function editTask(id) {
    const task = document.getElementById('task' + id);
    const text = task.getElementsByClassName('task__text')[0];
    const status = task.getElementsByClassName('task__status')[0];
    const save = task.getElementsByClassName('save')[0];

    text.setAttribute('contenteditable', true);

    save.innerHTML = `<button class="save-button btn btn-primary btn-sm" onclick="saveChanges(${id})">Save changes</button>`;
    status.innerHTML =
        `Status: 
    <select>
        <option value="1">In progress</option>
        <option value="2">Complite</option>
    </select>`
}

function saveChanges(id) {
    const task = document.getElementById('task' + id);
    const text = task.getElementsByClassName('task__text')[0];
    const status = task.getElementsByTagName('select')[0];

    if (text.innerText < 1) {
        text.classList.add('is-invalid');
        return
    }

    let req = {
        id: id,
        description: text.innerText,
        status: status.value,
    }
    sendDataEditTask(JSON.stringify(req), id);
}

async function sendDataEditTask(req, id) {
    let url = window.location.protocol + '//' + window.location.hostname + '/main/edit-task'
    let response = await fetch(url, {
        method: "POST",
        headers: {
            "Content-Type": "application/json;charset=utf-8"
        },
        body: req,
    });

    let result = await response.json();

    if (!result['result']) {
        const task = document.getElementById('task' + id);
        let div = `
        <div class="alert alert-danger" role="alert" style="margin-top: 15px;">
            Unexpected error. Please try again
        </div>`
        task.children[0].innerHTML = task.children[0].innerHTML + div;
    } else {
        document.location.reload(true);
    }
}

// Sort
const sortBtn = document.getElementById('sortBtn');
const sortValue = document.getElementById('sortValue');

sortBtn.addEventListener('click', () => {
    let locationGet = window.location.search.replace('?', '');
    let url = window.location.protocol + '//' + window.location.hostname

    if (locationGet == '') {
        url = url + '?sort=' + sortValue.value;
        window.location = url;
    } else {
        url = url + '?' + locationGet.split('&')[0] + '&sort=' + sortValue.value;
        window.location = url;
    }
});

document.addEventListener('DOMContentLoaded', () => {
    const options = sortValue.getElementsByTagName('option');
    [].forEach.call(options, el => {
        if (el.value == sortValue.getAttribute('data-value')) {
            el.setAttribute('selected', 'selected')
        }
    });
});