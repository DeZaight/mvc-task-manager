// Signin
const signinFormBtn = document.getElementById('signinFormBtn');
const signinFormLogin = document.getElementById('signinFormLogin');
const signinFormPassword = document.getElementById('signinFormPassword');
const signinFormError = document.getElementById('signinFormError');

signinFormBtn.addEventListener('click', () => {
    signinFormLogin.classList.remove('is-invalid');
    signinFormPassword.classList.remove('is-invalid');

    if (signinFormLogin.value < 1 && signinFormPassword.value < 1) {
        signinFormError.innerText = 'Введите логин и пароль';
        signinFormLogin.classList.add('is-invalid');
        signinFormPassword.classList.add('is-invalid');
        return
    }

    if (signinFormLogin.value < 1) {
        signinFormError.innerText = 'Введите логин';
        signinFormLogin.classList.add('is-invalid');
        return
    }

    if (signinFormPassword.value < 1) {
        signinFormError.innerText = 'Введите пароль';
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
        signinFormError.innerText = 'Неверный логин или пароль';
        signinFormLogin.classList.add('is-invalid');
        signinFormPassword.classList.add('is-invalid');
    } else {
        window.location = window.location.protocol + '//' + window.location.hostname;
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
            window.location = window.location.protocol + '//' + window.location.hostname;
        }
    }
});

// Add new task
const addNewTaskBtn = document.getElementById('addNewTaskBtn');
const addNewTaskName = document.getElementById('addNewTaskName');
const addNewTaskEmail = document.getElementById('addNewTaskEmail');
const addNewTaskTextarea = document.getElementById('addNewTaskTextarea');

addNewTaskBtn.addEventListener('click', () => {
    console.log('Add new task');
});