function sendMessage() {
    var message = document.getElementById('message').value;
    if (message.trim() !== '') {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'send_message.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
            if (xhr.status == 200) {
                document.getElementById('message').value = '';
                fetchMessages();
            }
        };
        xhr.send('message=' + message);
    }
}

function fetchMessages() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'fetch_messages.php', true);
    xhr.onload = function() {
        if (xhr.status == 200) {
            document.getElementById('messages').innerHTML = xhr.responseText;
        }
    };
    xhr.send();
}

setInterval(fetchMessages, 1000);
