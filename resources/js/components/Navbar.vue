<template>
    <nav class="navbar">
      <div class="navbar-left">
        <img src="../../assets/logos/LogoWin.png" alt="Logo" class="logo" />
      </div>
      <div class="navbar-right">
          <button  class="text-button">Conócenos</button>
        <button class="text-button">Calculadora</button>
        <button class="circle-button">Registrarse</button>
        <button class="circle-button">Iniciar Sesión</button>
      </div>
    </nav>
  </template>
  
  <script>
  export default {
    name: "Navbar",

    computed: {
    // Detecta si está en la ruta actual para ajustar estilos
    navbarClass() {
      return this.$route.path === "/dashboard" ? "navbar navbar-home" : "navbar";
    }
  }
  };

  
  </script>
  
  <style scoped>
  .navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0.5rem 1rem;
    background-color: #080257FF; /* Cambia al color de tu preferencia */
    width: 100%;
    height: 15vh; 
  }
  
  .navbar-left .logo {
    height: 80px; /* Ajusta el tamaño según necesites */
    object-fit: contain;
  }
  
  .navbar-right {
    display: flex;
    gap: 1rem;
    align-items: center;
  }
  
  .text-button {
    background: none;
    border: none;
    font-size: 1rem;
    font-weight: bold;
    color: #Efb810;
    cursor: pointer;
    transition: color 0.3s;
  }
  
  .text-button:hover {
    color: #Efb810;
  }
  
  .circle-button {
    padding: 0.5rem 1rem;
    border: 2px solid #Efb810;
    background-color: transparent;
    color: #Efb810;
    border-radius: 20px;
    font-size: 1rem;
    font-weight: bold;
    cursor: pointer;
    transition: background-color 0.3s, color 0.3s;
  }
  
  .circle-button:hover {
    color: #ffffff;
  }
  </style>
  