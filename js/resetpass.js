

function validatePassword() {
    var newPassword = document.getElementById("password").value;
    var confirmPassword = document.getElementById("oldpass").value;
    var errorDiv = document.getElementById("password-error");
    
    var oldp = document.getElementById("password");
    var cfrmp = document.getElementById("password");
    
    if (newPassword !== confirmPassword) {
        errorDiv.style.display ="block";
        cfrmp.value = "";
        cfrmp.placeholder = "Comfirm Password";
      
        oldp.style.borderColor = "red" ;
        cfrmp.style.color = "red";
        
        
        errorDiv.textContent = "Your password don't match. Please enter your password again to comfirm it";
        
        return false; // Prevent form submission
    } else {
        errorDiv.textContent = ""; // Clear error message
        return true; // Allow form submission
    }
}

