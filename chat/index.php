<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fitbox Live chat</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="chat-container">
        <div class="chat-header">
            <h1>Fitbox Live chat</h1>
        </div>
        <div class="chat-messages" id="chat-messages"></div>
        <form id="chat-form">
            <input type="text" id="username" placeholder="Enter your name" required>
            <input type="text" id="message" placeholder="Enter your message" required>
            <button type="submit">Send</button>
        </form>
    </div>

    <script>
        const chatForm = document.getElementById('chat-form');
        const chatMessages = document.getElementById('chat-messages');

        chatForm.addEventListener('submit', function(e) {
            e.preventDefault();

            const username = document.getElementById('username').value;
            const message = document.getElementById('message').value;

            fetch('chat.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: `username=${username}&message=${message}`
            }).then(response => response.json())
              .then(data => {
                  if (data.success) {
                      document.getElementById('message').value = '';
                      loadMessages();
                  }
              });
        });

        function loadMessages() {
            fetch('chat.php')
                .then(response => response.json())
                .then(data => {
                    chatMessages.innerHTML = '';
                    data.messages.forEach(message => {
                        const div = document.createElement('div');
                        div.classList.add('message');
                        div.innerHTML = `<strong>${message.username}</strong>: ${message.message} <span>${message.timestamp}</span>`;
                        chatMessages.appendChild(div);
                    });
                    chatMessages.scrollTop = chatMessages.scrollHeight;
                });
        }

        setInterval(loadMessages, 1000);
    </script>
</body>
</html>
