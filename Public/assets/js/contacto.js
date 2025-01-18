document.addEventListener("DOMContentLoaded", function () {
    const phoneInputField = document.querySelector("#phone");
    const phoneInput = window.intlTelInput(phoneInputField, {
        initialCountry: "auto",
        geoIpLookup: function (callback) {
            fetch('https://ipinfo.io/json?token=your_token_here')
                .then((resp) => resp.json())
                .then((resp) => {
                    const countryCode = (resp && resp.country) ? resp.country : "us";
                    callback(countryCode);
                });
        },
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"
    });

    window.validateForm = function () {
        const name = document.getElementById("name").value.trim();
        const phone = phoneInput.getNumber();
        const email = document.getElementById("email").value.trim();
        const message = document.getElementById("message").value.trim();

        if (!name || !phone || !email || !message) {
            alert("Por favor, complete todos los campos obligatorios.");
            return false;
        }

        if (!phoneInput.isValidNumber()) {
            alert("Por favor, ingrese un número de teléfono válido.");
            return false;
        }

        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(email)) {
            alert("Por favor, ingrese un correo electrónico válido.");
            return false;
        }

        return true; // No muestres alerta aquí, el envío del formulario se maneja en el archivo PHP
    };
});
