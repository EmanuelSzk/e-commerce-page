if (document.readyState == 'loading') {
    document.addEventListener('DOMContentLoaded', ready)
} else {
    ready();
}

function ready () {
    const form = document.getElementById('register-form');
    form.addEventListener("submit", (e) => {

        e.preventDefault();

        const nombre = document.getElementById('first-name').value;
        const apellido = document.getElementById('last-name').value;
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;
        const confirmPassword = document.getElementById('password-confirm').value;

        console.log(nombre, apellido, email, password, confirmPassword);

        fetch("../pages/registrar_usuario.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: `first-name=${nombre}&last-name=${apellido}&email=${email}&password=${password}`
        })

        alert("Usuario creado correctamente");

    });
}