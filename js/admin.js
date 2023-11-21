function doLogout() {
    document.cookie = "login=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/";
    window.location.href = "/Services/index.html";
}
function searchUser() {
    var login = document.getElementById('searchLogin').value;
    var xhr = new XMLHttpRequest();
    xhr.open('POST', "userProfile.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = xhr.responseText;
            var userData = JSON.parse(response);
            document.getElementById('userModalLabel').textContent = "Профиль пользователя #" + userData.uuid;
            document.getElementById('profileModalLogin').textContent = "Логин: " + userData.login;
            document.getElementById('profileModalName').textContent = "Имя: " + userData.name;
            document.getElementById('profileModalPhone').textContent = "Телефон: " + userData.phone;
            document.getElementById('profileModalAddress').textContent = "Адрес: " + userData.address;
            document.getElementById('profileModalIsAdmin').textContent = "Доступ к ПА: " + userData.isAdmin;
            $('#userModal').modal('show');
        }
    }
    var data = "login=" + login;
    xhr.send(data);
}

function orderHistory() {
    var login = document.getElementById('searchLogin').value;
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'userHistory.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = xhr.responseText;
            var userHistory = JSON.parse(response);
            var table = {};
            userHistory.forEach(function (historyItem) {
                var productName = historyItem.product_name;
                table[productName] = {
                    price: historyItem.price,
                    updatedAt: historyItem.updated_at
                };
            });
            var tbody = document.querySelector("#historyTable tbody");
            tbody.innerHTML = "";
            for (var productName in table) {
                var row = tbody.insertRow();
                var nameCell = row.insertCell(0);
                var priceCell = row.insertCell(1);
                var dateCell = row.insertCell(2);
                nameCell.textContent = productName;
                priceCell.textContent = table[productName].price + " BYN";
                dateCell.innerHTML = table[productName].updatedAt;
            }
            if (Object.keys(table).length == 0) {
                document.getElementById('historyMessage').textContent = "История заказов пользователя пуста";
            }
            $('#userModal').modal('hide');
            $('#historyModal').modal('show');
        }
    }
    var data = "login=" + login;
    xhr.send(data);
}

function ordersUpdate() {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "updateOrders.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = xhr.responseText;
            var userOrders = JSON.parse(response);
            updateTable(userOrders);
        }
    };
    xhr.send();
}

function updateTable(userOrders) {
    var table = {};
    userOrders.forEach(function (orderItem) {
        var productName = orderItem.product_name;
        if (table[productName] && table[productName].login == orderItem.user_login) {
            table[productName].quantity++;
        } else {
            table[productName] = {
                login: orderItem.user_login,
                quantity: 1,
                price: orderItem.price
            };
        }
    });
    var tbody = document.querySelector("#ordersTable tbody");
    tbody.innerHTML = "";
    var sum = 0;
    for (var productName in table) {
        var row = tbody.insertRow();
        var loginCell = row.insertCell(0);
        var nameCell = row.insertCell(1);
        var quantityCell = row.insertCell(2);
        var priceCell = row.insertCell(3);
        var actionCell = row.insertCell(4);

        loginCell.textContent = table[productName].login;
        nameCell.textContent = productName;
        quantityCell.textContent = table[productName].quantity;
        priceCell.textContent = (table[productName].price * table[productName].quantity) + " BYN";
        actionCell.innerHTML = "<button id='completeOrderButton' class='btn btn-orange cta-btn btn-form' data-text='" + productName + ":" + table[productName].id + "'><i class='fas fa-check animated tada delay-1s infinite'></i></button>"
        actionCell.classList.add("center");
        sum += table[productName].price * table[productName].quantity;
    }
    if (Object.keys(table).length == 0) {
        document.getElementById('basketText').textContent = "Увы, актуальных заказов нет";
    }
    var completeOrderButtons = document.querySelectorAll("#completeOrderButton");
    completeOrderButtons.forEach(function (button) {
        button.addEventListener("click", function () {
            var buttonText = this.getAttribute("data-text");
            var arrayButtonText = buttonText.split(":");
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "completePosition.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var response = xhr.responseText;
                    if (response === "success") {
                        window.location.reload();
                    }
                    else {
                        console.log(response);
                        var container = document.getElementById('notificationContainer');
                        container.innerHTML = '<div id="failed" class="alert alert-error alert-dismissible fade" role="alert">' +
                            '<strong>Провалено!</strong> Товар не удален Подробнее в консоли.' +
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
            };
            var data = "productName=" + arrayButtonText[0] + "&id=" + arrayButtonText[1];
            xhr.send(data);
        });
    });
}

ordersUpdate();