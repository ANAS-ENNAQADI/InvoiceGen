const inputs = document.querySelectorAll('.verification-code-input');

inputs.forEach((input, index) => {
    input.addEventListener('input', (event) => {
        if (event.inputType === 'insertText' && event.data.length === 1) {
            // Move focus to the next input
            if (index < inputs.length - 1) {
                inputs[index + 1].focus();
            }
        }
    });

    // Handle backspace key to move focus to the previous input
    input.addEventListener('keydown', (event) => {
        if (event.key === 'Backspace' && index > 0) {
            inputs[index - 1].focus();
        }
    });
});



var expirationTimeInSeconds = 180; // 3 minutes

function startCountdown() {
    var countdownElement = document.getElementById("countdown-timer");

    function updateCountdown() {
        var minutes = Math.floor(expirationTimeInSeconds / 60);
        var seconds = expirationTimeInSeconds % 60;
        var formattedTime = minutes + "m " + seconds + "s";
        countdownElement.style.fontFamily="tahoma";
        countdownElement.style.fontsize=15 + "px";
        countdownElement.textContent = "Code expires in: " + formattedTime;

        if (expirationTimeInSeconds <= 0) {
            // Token has expired, you can redirect the user or take appropriate action
            countdownElement.textContent = "Token has expired";
        } else {
            expirationTimeInSeconds--;
            setTimeout(updateCountdown, 1000); // Update every second
        }
    }

    // Start the countdown
    updateCountdown();
}

// Start the countdown when the page loads
window.onload = function () {
    startCountdown();
};
/*
document.getElementById("send").addEventListener("click", function () {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "/backend/resetlink.php", true); // Replace with the actual path to your PHP file
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // PHP file executed successfully
            console.log(xhr.responseText); // You can handle the response here
        }
    };
    xhr.send();
});*/


$(document).ready(function () {
    // Your code that uses $ (jQuery) can go here

    // For example, you can attach a click event handler to the "send" button:
    $("#send").click(function () {
        // Your AJAX request or other code here
        $.ajax({
            type: "GET",
            url: "/backend/resetlink2.php", // Replace with the actual path to your PHP file
            success: function (response) {
                // Update the 'php-response' div with the PHP file's response
               
                $("#php-response").html(response);
                // In this example, we simulate success after a delay
                setTimeout(function () {
                    var response = "Code has been sent successfully.";
                    // Update the 'message-text' span with the success message
                    $("#success-message .message-text").text(response);
                    // Show the 'success-message' div
                    $("#success-message").show();
                }, 10);
           
            },
            error: function () {
                // Handle any errors here
                alert("An error occurred while executing the PHP file.");
            }
        });
    });
});

