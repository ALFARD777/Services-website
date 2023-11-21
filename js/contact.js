function writeRequest() {
    var contactName = document.getElementById('contactName').value;
    var contactAddress = document.getElementById('contactAddress').value;
    var contactPhone = document.getElementById('contactPhone').value;
    var contactComments = document.getElementById('contactComments').value;

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'php/writeRequest.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = xhr.responseText;
            if (response == 'success') {
                document.getElementById('contactMessage').innerHTML = '<p class="lead light-green-text">Запрос успешно отправлен!</p>';
            }
            else {
                console.log(response);
                document.getElementById('contactMessage').innerHTML = '<p class="lead red-text">Произошла ошибка. Подробнее в консоли</p>';
            }
        }
    }
    xhr.send("name=" + contactName + "&address="+contactAddress + "&phone=" + contactPhone + "&comments=" + contactComments);
}

function readRequests() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'readRequest.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var calls = JSON.parse(xhr.responseText);
            var table = {};
            calls.forEach(function (callItem) {
                var name = callItem.name;
                table[name] = {
                    address: callItem.address,
                    phone: callItem.phone,
                    comments: callItem.comments
                };
            });
            var tbody = document.querySelector("#callsTable tbody");
            tbody.innerHTML = "";
            for (var name in table) {
                var row = tbody.insertRow();
                var nameCell = row.insertCell(0);
                var addressCell = row.insertCell(1);
                var phoneCell = row.insertCell(2);
                var commentsCell = row.insertCell(3);
                nameCell.textContent = name;
                addressCell.textContent = table[name].address;
                phoneCell.innerHTML = table[name].phone;
                commentsCell.innerHTML = table[name].comments;
            }
            if (Object.keys(table).length == 0) {
                document.getElementById('callsMessage').innerHTML = '<p class="lead">Актуальных звонков нет</p>';
            }
            $('#callsModal').modal('show');
        }
    }
    xhr.send();
}

function clearCalls() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'clearCalls.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = xhr.responseText;
            if (response == "success") window.location.reload();
            else {
                console.log(response);
                document.getElementById('callsMessage').innerHTML = '<p class="lead red-text">Произошла ошибка. Подробнее в консоли</p>';
            }
        }
    }
    xhr.send();
}