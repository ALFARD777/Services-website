function startModal(element) {
    var row = element.closest('tr');
    var itemName = row.querySelector('td:nth-child(2)').textContent.trim();
    var itemPrice = row.querySelector('td:nth-child(4)').textContent.trim();
    var actionButton = document.querySelector('#addToBasketModal .btn.unique-color.text-white');
    actionButton.dataset.itemName = itemName;
    actionButton.dataset.itemPrice = itemPrice;
    document.getElementById('itemNamePlaceholder').textContent = itemName;
    document.getElementById('itemPricePlaceholder').textContent = itemPrice;
    $('#addToBasketModal').modal('show');
}

function closeModal() {
    $('#addToBasketModal').modal('hide');
    document.getElementById("externalBasketMessage").innerHTML = '';
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

async function orderModal() {
    var name = document.getElementById("newName").value;
    var phone = document.getElementById("newPhone").value;
    var address = document.getElementById("newAddress").value;
    var password = await getPassword(getLogin());
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'updateProfile.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = xhr.responseText;
            if (response === 'Success update') {
                doOrder();
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
    xhr.send("login=" + getLogin() + "&name=" + name + "&phone=" + phone + "&address=" + address + "&password=" + password);
}

function getPassword(login) {
    return new Promise(function (resolve, reject) {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'getPassword.php', true);
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

function doOrder() {
    var login = getCookie("login");
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "order.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = xhr.responseText;
            if (response === "success") {
                document.getElementById('orderMessage').innerHTML = '<p id="successNotification" class="light-green-text">Заказ оформлен!</p>';
            }
            else {
                console.log(response);
                document.getElementById('orderMessage').innerHTML = '<p id="failedNotification" class="red-text">Произошла ошибка! Подробнее в консоли!</p>';
            }
        }
    };
    var data = "login=" + login;
    xhr.send(data);
}

function addToBasket() {
    var itemName = document.querySelector('#addToBasketModal .btn.unique-color.text-white').dataset.itemName;
    var itemPrice = document.querySelector('#addToBasketModal .btn.unique-color.text-white').dataset.itemPrice.replace(/\D/g, "");
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "php/addToBasket.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = xhr.responseText;
            if (response === "success") {
                document.getElementById("externalBasketMessage").innerHTML = '<p id="successNotification" class="light-green-text">Успешно добавлено!</p>';
            }
            else {
                console.log(response);
                document.getElementById("externalBasketMessage").innerHTML = '<p id="errorNotification" class="red-text">Произошла ошибка! Подробнее в консоли</p>';
            }
        }
    };
    xhr.send("positionName=" + itemName + "&price=" + itemPrice);
}

function basketUpdate() {
    var login = getCookie("login");
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "updateBasket.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = xhr.responseText;
            var userBaskets = JSON.parse(response);
            updateTable(userBaskets);
        }
    };
    var data = "login=" + login;
    xhr.send(data);
}

function getCookie(name) {
    var value = "; " + document.cookie;
    var parts = value.split("; " + name + "=");
    if (parts.length === 2) return parts.pop().split(";").shift();
}

function updateTable(userBaskets) {
    var table = {};
    userBaskets.forEach(function (basketItem) {
        var productName = basketItem.product_name;
        if (table[productName]) {
            table[productName].quantity++;
        } else {
            table[productName] = {
                id: basketItem.user_id,
                quantity: 1,
                price: basketItem.price
            };
        }
    });
    var tbody = document.querySelector("#ordersTable tbody");
    tbody.innerHTML = "";
    var sum = 0;
    for (var productName in table) {
        var row = tbody.insertRow();
        var nameCell = row.insertCell(0);
        var quantityCell = row.insertCell(1);
        var priceCell = row.insertCell(2);
        var actionCell = row.insertCell(3);

        nameCell.textContent = productName;
        quantityCell.textContent = table[productName].quantity;
        priceCell.textContent = (table[productName].price * table[productName].quantity) + " BYN";
        actionCell.innerHTML = "<button id='deleteOrderButton' class='btn btn-orange cta-btn btn-form' data-text='" + productName + ":" + table[productName].id + "'><i class='fas fa-trash animated tada delay-1s infinite'></i></button>"
        actionCell.classList.add("center");
        sum += table[productName].price * table[productName].quantity;
    }
    var costText = document.getElementById("costText");
    var checkoutButton = document.getElementById("checkoutButton");
    if (Object.keys(table).length > 0) {
        costText.classList.remove("hide");
        checkoutButton.style.display = "inline";
    }
    else {
        costText.classList.add("hide");
        checkoutButton.style.display = "none";
        document.getElementById("ordersTable").style.display = "none";
        document.getElementById('basketText').textContent = "Увы, корзина пуста";
    }
    costText.textContent = "Итого: " + sum + " BYN";
    var deleteOrderButtons = document.querySelectorAll("#deleteOrderButton");
    deleteOrderButtons.forEach(function (button) {
        button.addEventListener("click", function () {
            var buttonText = this.getAttribute("data-text");
            var arrayButtonText = buttonText.split(":");
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "deletePosition.php", true);
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

if (window.location.href.includes("basket.php")) basketUpdate();