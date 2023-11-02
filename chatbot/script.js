// Get references to DOM elements
const chatBox = document.getElementById("chatBox");
const userInput = document.getElementById("userInput");
const sendMessageButton = document.getElementById("sendMessage");

// Function to add a user message to the chat
function addUserMessage(message) {
    const userMessage = document.createElement("div");
    userMessage.className = "chat-message user-message";
    userMessage.textContent = message;
    chatBox.appendChild(userMessage);
    userInput.value = ""; // Clear the input field
}

// Function to add a bot message to the chat
function addBotMessage(message) {
    // Add "Bot is typing..." message
    const botIsTypingMessage = document.createElement("div");
    botIsTypingMessage.className = "chat-message bot-message";
    botIsTypingMessage.textContent = "Bot is typing...";
    chatBox.appendChild(botIsTypingMessage);

    // Simulate delay before bot responds
    setTimeout(() => {
        // Remove the "Bot is typing..." message
        chatBox.removeChild(botIsTypingMessage);

        // Add the actual bot response
        const botMessage = document.createElement("div");
        botMessage.className = "chat-message bot-message";
        botMessage.textContent = message;
        chatBox.appendChild(botMessage);
    }, 1000); // Simulating a delay for the bot's response (you can adjust this)

}

// Function to handle user input and send messages
function sendMessage(message) {
    addUserMessage(message);

    // Handle user messages here and generate bot responses
    if (message.toLowerCase() === "get started") {
        // Respond to "Get Started" message
        addBotMessage("Great! How can I assist you with your career?");
    } else if (message.toLowerCase().includes("career advice")) {
        // Respond to questions about career advice
        addBotMessage("I can provide advice on various career topics. What specific question do you have?");
    } else if (message.toLowerCase() === "goodbye") {
        // Respond to "Goodbye" message
        addBotMessage("Goodbye! If you have more questions in the future, feel free to ask.");
    } else if (message.toLowerCase() === "hello") {
        // Respond to "Hello" message
        addBotMessage("Hello! How can I assist you?");
    }
    else if (message.toLowerCase() === "hellows") {
        // Respond to "Hello" message
        addBotMessage("Hello! How can I assist you?");
    }
    else if (message.toLowerCase().includes("networking skills")) {
        // Respond to questions about networking skills
        addBotMessage("Networking skills are important for building professional connections. They involve...");
    }
    
    else {
        // Respond to unrecognized messages
        addBotMessage("I'm here to assist with career advice. Please ask a specific question or type 'Get Started'.");
    }
}

// Event listener for the "Send" button
sendMessageButton.addEventListener("click", () => {
    const userMessage = userInput.value.trim();
    if (userMessage !== "") {
        sendMessage(userMessage);
    }
});

// Event listener for the Enter key in the input field
userInput.addEventListener("keyup", (event) => {
    if (event.key === "Enter") {
        const userMessage = userInput.value.trim();
        if (userMessage !== "") {
            sendMessage(userMessage);
        }
    }
});

// Initial bot message
// addBotMessage("Hello! This is the Career Advice Consultation Chatbot");
// addBotMessage("To get started, please type: Get Started");
