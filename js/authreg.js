function authSubmit() {
    var login = document.getElementById('authlogin').value;
    var password = document.getElementById('authpassword').value;
    document.getElementById('authform').reset();
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'php/auth.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = xhr.responseText;
            if (response == "Success authorization") {
                var authButton = document.getElementById('authButton');
                authButton.innerHTML = "Профиль <i class=\"far fa-user animated tada delay-1s infinite ml-1\"></i>";
                authButton.href = "php/profile.php";
                window.location.href = "index.html";
            }
            else if (response == "Incorrect password") {
                document.getElementById('authMessage').innerHTML = '<p class="red-text ml-2">Неверный логин или пароль</p>';
            }
            else {
                document.getElementById('authMessage').innerHTML = '<p class="red-text ml-2">Неизвестная ошибка</p>';
            }
        }
    };
    xhr.send("login=" + login + "&password=" + password);
}

function registerSubmit() {
    var login = document.getElementById('registerlogin').value;
    var password = document.getElementById('registerpassword').value;
    document.getElementById('registerform').reset();
    console.log('1');
    if (password.length < 7) {
        console.log('2');
        document.getElementById('registerMessage').innerHTML = '<p class="red-text ml-2">Пароль должен состоять из не менее 8 символов</p>';
        return;
    }
    var criteria1 = /[!@#$%^&*(),.?":{}|<>]/;
    var criteria2 = /\d/;
    var criteria3 = /[a-z]/;
    var criteria4 = /[A-Z]/;
    if (!criteria1.test(password) || !criteria2.test(password) || !criteria3.test(password) || !criteria4.test(password)) {
        console.log('3');
        document.getElementById('registerMessage').innerHTML = '<p class="red-text ml-2">Пароль должен состоять из строчных и прописных букв, чисел, спец. символов</p>';
        return;
    }
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'php/register.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = xhr.responseText;
            if (response == "Success registration") {
                var authButton = document.getElementById('authButton');
                authButton.innerHTML = "Профиль <i class=\"far fa-user animated tada delay-1s infinite ml-1\"></i>";
                authButton.href = "php/profile.php";
                window.location.href = "index.html";
            }
            else if (response === "Name already exists in database") {
                document.getElementById('registerMessage').innerHTML = '<p class="red-text ml-2">Пользователь уже зарегестрирован</p>';
            }
            else {
                document.getElementById('registerMessage').innerHTML = '<p class="red-text ml-2">Неизвестная ошибка</p>';
            }
        }
    }
    xhr.send("login=" + login + "&password=" + password);
}
function getLogin() {
    var cookies = document.cookie.split(';');
    for (var i = 0; i < cookies.length; i++) {
        var cookie = cookies[i].trim();
        if (cookie.indexOf('login=') === 0) {
            return cookie.substring('login='.length, cookie.length);
        }
    }
    return null;
}
if (getLogin() != null) {
    var authButton = document.getElementById('authButton');
    authButton.innerHTML = "Профиль <i class=\"far fa-user animated tada delay-1s infinite ml-1\"></i>";
    authButton.href = "php/profile.php";
    authButton.removeAttribute('data-toggle');
    authButton.removeAttribute('data-target');
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'php/adminState.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = xhr.responseText;
            if (response == 'Admin') {
                var adminPanelButton = document.getElementById('orderOrAdmin');
                adminPanelButton.innerHTML = "Панель администратора <i class=\"fas fa-tools animated tada delay-1s infinite ml-1\"></i>";
                adminPanelButton.setAttribute("onclick", "window.location.href = \"php/admin.php\";");
                adminPanelButton.removeAttribute('data-toggle');
                adminPanelButton.removeAttribute('data-target');
            }
        }
    }
    xhr.send("login=" + getLogin());
}
else {
    document.getElementById('basketButton').classList.add('hide');
}

function checkLogin(login) {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'php/findLogin.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = xhr.responseText;
            if (response == 'FOUND') {
                return true;
            }
            else {
                var restoreMessage = document.getElementById('restoreMessage');
                restoreMessage.innerHTML = '<p class="lead red-text">Неверный логин!</p>';
                return false;
            }
        }
    }
    xhr.send("login=" + login);
}

function restorePassword() {
    var login = document.getElementById('restoreLogin').value;
    var newPassword = document.getElementById('restorePassword').value;
    if (checkLogin(login)) {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'php/setPassword.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var response = xhr.responseText;
                if (response == "success") {
                    var restoreMessage = document.getElementById('restoreMessage');
                    restoreMessage.innerHTML = '<p class="lead light-green-text">Пароль восстановлен!</p>'
                }
                else {
                    console.log(response);
                    var restoreMessage = document.getElementById('restoreMessage');
                    restoreMessage.innerHTML = '<p class="lead red-text">Произошла ошибка. Подробнее в консоли!</p>';
                }
            }
        }
        var data = "login=" + login + "&password=" + newPassword;
        xhr.send(data);
    }
}