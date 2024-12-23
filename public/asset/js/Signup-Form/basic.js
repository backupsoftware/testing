$(document).ready(function () {

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

        if (password.length >= 8 && !["password", "123456", "qwerty"].includes(password
            .toLowerCase())) {
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
});