document.addEventListener("DOMContentLoaded", function() {
    const loginForm = document.getElementById("login-form");
    
    loginForm.addEventListener("submit", function(event) {
        event.preventDefault(); // Prevent default form submission
        
        const formData = new FormData(newForm); // Get form data
        
        fetch("login1.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            // Handle the server response
            if (data === "success") {
                // Redirect the user after successful login
                window.location.href = "body.php";
            } else {
                // Update the UI to show an error message
                const errorDiv = document.createElement("div");
                errorDiv.className = "error-message";
                errorDiv.textContent = "The email or password is wrong";
                loginForm.appendChild(errorDiv);
            }
        })
        .catch(error => {
            // Handle any errors that occur during the fetch
            console.error("Fetch error:", error);
        });
    });
});

function borderC (){
   
    var text2 = document.getElementById("pass");
   var taille = text2.value ;
if (text2.value.taille <8){
    text2.style.borderColor = "red";
}else {
    text2.style.borderColor = "green";
}
  
        
    }