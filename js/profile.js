function doLogout() {
    document.cookie = "login=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/";
    window.location.href = "/Services/index.html";
}

async function saveProfile(login) {
    var name = document.getElementById("newName").value;
    var phone = document.getElementById("newPhone").value;
    var address = document.getElementById("newAddress").value;
    var password = document.getElementById("newPassword").value;
    if (!password) {
        password = await getPassword(login);
    }
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '/Services/php/updateProfile.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = xhr.responseText;
            if (response === 'Success update') {
                var container = document.getElementById('notificationContainer');
                container.innerHTML = '<div id="success" class="alert alert-success alert-dismissible fade" role="alert">' +
                    '<strong>Успешно!</strong> Данные профиля были обновлены.' +
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                    '<span aria-hidden="true">&times;</span>' +
                    '</button>' +
                    '</div>';
                setTimeout(function () {
                    document.getElementById('success').classList.add('show');
                }, 100);
                setTimeout(function () {
                    document.getElementById('success').classList.remove('show');
                    setTimeout(function () {
                        container.innerHTML = '';
                    }, 300);
                }, 4000);
            }
            else {
                console.log(response);
                var container = document.getElementById('notificationContainer');
                container.innerHTML = '<div id="failed" class="alert alert-error alert-dismissible fade" role="alert">' +
                    '<strong>Провалено!</strong> Данные профиля не обновлены.' +
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                    '<span aria-hidden="true">&times;</span>' +
                    '</button>' +
                    '</div>';
                setTimeout(function () {
                    document.getElementById('failed').classList.add('show');
                }, 100);
                setTimeout(function () {
                    document.getElementById('failed').classList.remove('show');
                    setTimeout(function () {
                        container.innerHTML = '';
                    }, 300);
                }, 4000);
            }
        }
    }
    xhr.send("login=" + login + "&name=" + name + "&phone=" + phone + "&address=" + address + "&password=" + password);
}

function getPassword(login) {
    return new Promise(function (resolve, reject) {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '/Services/php/getPassword.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var response = xhr.responseText;
                resolve(response);
            }
        }
        xhr.send("login=" + login);
    });
}