/* Estilos específicos para principal.php */
.navbar {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 60px;
    background-color: rgba(0, 202, 78, 0.8);
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0 20px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    z-index: 1000;
}

.navbar-brand a {
    color: #fff;
    text-decoration: none;
    font-size: 1.5em;
    font-weight: bold;
}

.navbar-links {
    display: flex;
    align-items: center;
}

.navbar-links a {
    color: #fff;
    text-decoration: none;
    margin-left: 15px;
    font-size: 1em;
    transition: color 0.3s;
}

.navbar-links a:hover {
    color: #d4d4d4;
}

.navbar-links .logout {
    color: #ff6666;
    font-weight: bold;
}

.navbar-links .logout:hover {
    color: #ff3333;
}

.container {
    margin-top: 80px; /* Ajusta según la altura de la barra de navegación */
    padding: 20px;
}
