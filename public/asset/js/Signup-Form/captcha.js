$(document).ready(function () {

    // Password strength functionality
    const passwordInput = $('#password');
    const passwordFeedback = $('#passwordFeedback');
    const togglePassword = $('#togglePassword');
    const passwordIcon = $('#passwordIcon');
    const strengthBar = $('#strengthBar');

    const feedback = {
        uppercase: $('#uppercase'),
        lowercase: $('#lowercase'),
        number: $('#number'),
        special: $('#special'),
        length: $('#length'),
        unique: $('#unique')
    };

    togglePassword.on('click', function () {
        const type = passwordInput.attr('type') === 'password' ? 'text' : 'password';
        passwordInput.attr('type', type);
        passwordIcon.toggleClass('bi-eye bi-eye-slash');
    });

    passwordInput.on('focus', function () {
        passwordFeedback.show();
    });

    passwordInput.on('blur', function () {
        if ($(this).val() === "") {
            passwordFeedback.hide();
        }
    });

    passwordInput.on('input', function () {
        const password = passwordInput.val();
        let strength = 0;

        if (/[A-Z]/.test(password)) {
            feedback.uppercase.addClass('text-success').removeClass('text-danger');
            strength += 20;
        } else {
            feedback.uppercase.addClass('text-danger').removeClass('text-success');
        }

        if (/[a-z]/.test(password)) {
            feedback.lowercase.addClass('text-success').removeClass('text-danger');
            strength += 20;
        } else {
            feedback.lowercase.addClass('text-danger').removeClass('text-success');
        }

        if (/\d/.test(password)) {
            feedback.number.addClass('text-success').removeClass('text-danger');
            strength += 20;
        } else {
            feedback.number.addClass('text-danger').removeClass('text-success');
        }

        if (/[!@#$%^&*(),.?":{}|<>]/.test(password)) {
            feedback.special.addClass('text-success').removeClass('text-danger');
            strength += 20;
        } else {
            feedback.special.addClass('text-danger').removeClass('text-success');
        }

        if (password.length >= 8) {
            feedback.length.addClass('text-success').removeClass('text-danger');
            strength += 20;
        } else {
            feedback.length.addClass('text-danger').removeClass('text-success');
        }

        if (password.length >= 8 && !["password", "123456", "qwerty"].includes(password.toLowerCase())) {
            feedback.unique.addClass('text-success').removeClass('text-danger');
        } else {
            feedback.unique.addClass('text-danger').removeClass('text-success');
        }

        strengthBar.css('width', `${strength}%`).attr('aria-valuenow', strength);
        if (strength < 40) {
            strengthBar.removeClass('bg-success bg-warning').addClass('bg-danger');
        } else if (strength < 80) {
            strengthBar.removeClass('bg-danger bg-success').addClass('bg-warning');
        } else {
            strengthBar.removeClass('bg-danger bg-warning').addClass('bg-success');
        }
    });

    // Email OTP functionality
    const emailInput = $('#email');
    const sendOtpBtn = $('#sendOtpBtn');
    const otpField = $('#otpField');

    // Show Send OTP button when email is valid
    emailInput.on('input', function() {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Email validation regex
        if (emailRegex.test(emailInput.val().trim())) {
            sendOtpBtn.show(); // Show button
        } else {
            sendOtpBtn.hide(); // Hide button
        }
    });

    // Handle Send OTP Button Click
    sendOtpBtn.on('click', function() {
        const email = emailInput.val().trim();

        if (email) {
            // Simulate sending OTP
            alert('An OTP has been sent to ' + email);

            // Show the OTP input field
            otpField.show();
        }
    });

    // Check if all fields are filled
    function checkFormCompletion() {
        var name = $('#name').val();
        var email = $('#email').val();
        var otp = $('#otp').val();
        var password = $('#password').val();

        // If all fields are filled, show CAPTCHA
        if (name && email && otp && password) {
            $('#captchaField').show(); // Show CAPTCHA
            $('#submitBtn').prop('disabled', false); // Enable Submit Button
        } else {
            $('#captchaField').hide(); // Hide CAPTCHA
            $('#submitBtn').prop('disabled', true); // Disable Submit Button
        }
    }

    // Trigger check on each field change
    $('#name, #email, #otp, #password').on('input', checkFormCompletion);

});
