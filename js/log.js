function toggleEye() {
    var pass = document.getElementById("pass");
    var eyeIcon = document.getElementById("eye-icon");

    if (pass.type === "password") {
        pass.type = "text";
        eyeIcon.classList.remove("fa-eye");
        eyeIcon.classList.add("fa-eye-slash");

        setTimeout(function () {
            pass.type = "password";
            eyeIcon.classList.remove("fa-eye-slash");
            eyeIcon.classList.add("fa-eye");
        }, 800); // Delay in milliseconds (1 second)
    }
}

