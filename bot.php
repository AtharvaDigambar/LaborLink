<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>How can I assist you</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('loginb.jpg');
            background-size: cover;
            background-position:center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .chat-container {
            border: 1px solid #ccc;
            width: 400px;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            display: flex;
            flex-direction: column;
        }
        .chat-header {
            background-color: #4CAF50;
            color: #fff;
            padding: 15px;
            text-align: center;
            font-weight: bold;
            font-size: 24px;
            border-bottom: 1px solid #ccc;
        }
        .chat-box {
            flex-grow: 1;
            padding: 15px;
            overflow-y: scroll;
        }
        .message {
            margin-bottom: 10px;
            display: inline-block;
            max-width: 70%;
            word-wrap: break-word;
            padding: 10px 15px;
            border-radius: 20px;
            font-size: 16px;
        }
        .user-message {
            align-self: flex-end;
            background-color: #4CAF50;
            color: #fff;
        }
        .bot-message {
            align-self: flex-start;
            background-color: #f2f2f2;
            color: #333;
        }
        .chat-input-container {
            display: flex;
            padding: 15px;
            background-color: #fff;
            border-top: 1px solid #ccc;
        }
        .chat-input {
            flex-grow: 1;
            padding: 10px;
            border: none;
            outline: none;
            border-radius: 20px;
            font-size: 16px;
        }
        .send-btn {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 20px;
            font-size: 16px;
            transition: background-color 0.3s ease;
            margin-left: 10px;
        }
        .send-btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div class="chat-container">
    <div class="chat-header">How can I assist you?</div>
    <div class="chat-box" id="chatBox"></div>
    <div class="chat-input-container">
        <input type="text" class="chat-input" id="userInput" placeholder="Type your message...">
        <button class="send-btn" onclick="handleUserInput()">Send</button>
    </div>
</div>

<script>
    const chatBox = document.getElementById('chatBox');

    function addUserMessage(message) {
        const userMessage = document.createElement('div');
        userMessage.classList.add('message', 'user-message');
        userMessage.textContent = message;
        chatBox.appendChild(userMessage);
    }

    function addBotMessage(message) {
        const botMessage = document.createElement('div');
        botMessage.classList.add('message', 'bot-message');
        botMessage.textContent = message;
        chatBox.appendChild(botMessage);
    }

    function handleUserInput() {
        const userInput = document.getElementById('userInput');
        const message = userInput.value.trim();
        if (message === '') return;

        addUserMessage(message);

        // Simulate bot response (you can replace this with actual backend logic)
        setTimeout(() => {
            let response = '';
            switch (message.toLowerCase()) {
                case 'hi':
                case 'hello':
                    response = 'Hello! How can I assist you today?';
                    break;
                case 'find laborers':
                    response = 'Sure! Please login to your account to find skilled laborers.';
                    break;
                case 'how it works':
                    response = `Here's how it works:
                                Step 1: Post Your Project
                                Step 2: Get Matched with Skilled Laborers
                                Step 3: Connect and Hire
                                Step 4: Complete Your Project`;
                    break;
                case 'services':
                    response = `We offer various services such as:
                                - Painting
                                - Electrician
                                - House Cleaning
                                - Carpenter
                                - Construction Worker
                                - Waterproofing
                                - Pest Control
                                - Appliance Repair
                                - Plumber`;
                    break;
                case 'contact':
                    response = 'You can contact us at contact@laborlink.com or call us at +91 9407568130';
                    break;
                case 'feedback':
                    response = 'We appreciate your feedback! Please email us at feedback@laborlink.com';
                    break;
                case 'schedule meeting':
                    response = 'Please login to your account and schedule a meeting with the laborer or contractor.';
                    break;
                case 'cancel project':
                    response = 'Please login to your account and go to your project dashboard to cancel the project.';
                    break;
                case 'check project status':
                    response = 'Please login to your account and check the status of your project in the project dashboard.';
                    break;
                default:
                    response = "I'm sorry, I don't understand that. Can you please be more specific?";
            }
            addBotMessage(response);
            chatBox.scrollTop = chatBox.scrollHeight;
        }, 500);

        userInput.value = '';
    }

    document.getElementById('userInput').addEventListener('keypress', function (e) {
        if (e.key === 'Enter') {
            handleUserInput();
        }
    });
</script>

</body>
</html>
