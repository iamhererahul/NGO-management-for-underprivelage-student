<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Application</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
 /* CSS for Chat Application */

/* General body styles */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

/* Container for the chat messages */
.chat-container {
    max-width: 600px;
    margin: 50px auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

/* Styling for the chat messages */
.messages {
    height: 300px;
    overflow-y: scroll;
    padding: 10px;
    margin-bottom: 10px;
}

/* Styling for individual messages */
.message {
    margin-bottom: 10px;
}

/* Styling for received messages */
.received-message {
    background-color: #f0f0f0;
    padding: 8px 12px;
    border-radius: 5px;
    clear: both;
    float: left;
}

/* Styling for sent messages */
.sent-message {
    background-color: #007bff;
    color: white;
    padding: 8px 12px;
    border-radius: 5px;
    clear: both;
    float: right;
}

/* Input box for typing messages */
input[type="text"] {
    width: calc(100% - 70px);
    padding: 5px;
    margin-right: 5px;
    border-radius: 3px;
    border: 1px solid #ccc;
}

/* Send button */
button {
    padding: 5px 10px;
    border: none;
    border-radius: 3px;
    background-color: #007bff;
    color: white;
    cursor: pointer;
}

button:hover {
    background-color: #0056b3;
}


</style>
<body>
    <div class="chat-container">
        <div class="chat-messages">
            <?php
            $messages = file_get_contents("messages.txt");
            echo $messages;
            ?>
        </div>
        <form id="messageForm" method="post">
            <input type="text" name="message" id="messageInput" placeholder="Type your message here" required>
            <button type="submit">Send</button>
        </form>
    </div>

    <script>
        function sendMessage() {
            var message = document.getElementById("messageInput").value;
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "send_message.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    document.getElementById("messageInput").value = "";
                    fetchMessages(); // Update messages after sending
                }
            };
            xhr.send("message=" + message);
            return false; // Prevent form submission
        }

        function fetchMessages() {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "messages.txt", true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    document.querySelector(".chat-messages").innerHTML = xhr.responseText;
                }
            };
            xhr.send();
        }

        document.getElementById("messageForm").onsubmit = sendMessage;

        // Fetch messages initially and then set interval to fetch messages every 5 seconds
        fetchMessages();
        setInterval(fetchMessages, 5000); // 5000 milliseconds = 5 seconds
    </script>
</body>
</html>
