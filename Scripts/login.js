if (document.readyState == 'loading') {
    document.addEventListener('DOMContentLoaded', ready)
} else {
    ready();
}

function ready() {
    const login = document.getElementById('login-form');
    login.addEventListener('submit', (e) => {
        e.preventDefault();

        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;

        console.log(email, password);

        fetch("../pages/autenticar_usuario.php", {
            method: "POST", headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            }, body: `email=${encodeURIComponent(email)}&password=${encodeURIComponent(password)}`
        })
            .then(res => res.json())
            .then(data => {
                if (data.success == true) {
                    window.location.href = "../index.php";
                } else {
                    alert(data.message);
                }
            });
    });
}