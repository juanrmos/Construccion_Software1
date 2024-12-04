document.getElementById('login-form').addEventListener('submit', async (e) => {
    e.preventDefault(); 
    const usuario = document.getElementById('usuario').value.trim();
    const contrasena = document.getElementById('contrasena').value.trim();
    const output = document.getElementById('output');

    try {
        const response = await fetch(controladorLoginUrl, {
            method: 'POST',
            body: new URLSearchParams({
                usuario: usuario,
                contrasena: contrasena
            })
        });

        const data = await response.json();
        console.log('Respuesta del servidor:', data);

        if (data.status === 'success') {
            console.log('Redirigiendo a:', principalUrl);
            window.location.replace(principalUrl);
        } else {
            output.textContent = data.message || 'Usuario o contraseña incorrectos.';
        }
    } catch (error) {
        console.error('Error al procesar la solicitud:', error);
        output.textContent = 'Ocurrió un error al procesar la solicitud.';
    }
});

