document.getElementById("sendBtn").addEventListener("click", function () {
    const userInput = document.getElementById("userInput").value;
    const chatbox = document.getElementById("chatbox");

    if (userInput.trim()) {
        chatbox.innerHTML += `<div class="user-msg">${userInput}</div>`;

        // Send query to the backend
        fetch("chatbot.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ question: userInput }),
        })
            .then((response) => response.json())
            .then((data) => {
                chatbox.innerHTML += `<div class="bot-msg">${data.response}</div>`;
            })
            .catch((error) => {
                chatbox.innerHTML += `<div class="bot-msg">Error: Unable to process your request.</div>`;
            });
    }

    document.getElementById("userInput").value = ""; // Clear input
});
