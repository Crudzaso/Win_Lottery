<template>
  <div class="main_content">
    <Navbar />
    <section class="hero">
      <!-- Bloque de texto -->
      <div class="hero-text">
        <h1>¿LISTO PARA GANAR?</h1>
        <Word />
        <button class="cta-button">Saber Más</button>
      </div>


      <!-- Bloque de imagen -->
      <div class="hero-image">
        <div class="img-container">
          <img src="../../assets/imgs/phoneimg.png" alt="Imagen ilustrativa" />
        </div>
      </div>


    </section>

    <div class="svg-container">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#Efb810" fill-opacity="1" d="M0,64L1440,96L1440,0L0,0Z"></path>
        <!-- Primer texto -->
        <text x="10%" y="11%" dominant-baseline="middle" text-anchor="middle" fill="#fff" font-size="2rem"
          class="svg-text">
          JUEGA Y GANA
        </text>
        <!-- Segundo texto -->
        <text x="28%" y="12%" dominant-baseline="middle" text-anchor="middle" fill="#fff" font-size="2rem"
          class="svg-text">
          SUERTE HOY
        </text>
        <!-- Tercer texto -->
        <text x="45%" y="13%" dominant-baseline="middle" text-anchor="middle" fill="#fff" font-size="2rem"
          class="svg-text">
          APUESTA SEGURA
        </text>
        <!-- Cuarto texto -->
        <text x="68%" y="14%" dominant-baseline="middle" text-anchor="middle" fill="#fff" font-size="2rem"
          class="svg-text">
          TÚ NUMERO GANADOR
        </text>
        <!-- Quinto texto -->
        <text x="90%" y="15%" dominant-baseline="middle" text-anchor="middle" fill="#fff" font-size="2rem"
          class="svg-text">
          PRUEBA TU SUERTE
        </text>
      </svg>
    </div>

    <div class="aboutsection">

      <h2 class="about-title">¿QUE ES WIN LOTTERY? </h2>
      <div>
        <div class="video-container">
          <div class="video-container">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/4V90AmXnguw?si=dMW9vAeKStKn4FHg"
              title="YouTube video player" frameborder="0"
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
              referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
            </iframe>
          </div>

        </div>

      </div>

    </div>

    <div class="carrusel-section">
      <carrusel />
    </div>





    <div class="servicesection">
      <h2 class="services-title">¿QUÉ HACEMOS?</h2>
      <div class="container-services">
        <div class="services-item">
          <div class="services-container-img">
            <img src="../../assets/imgs/services1.png" alt="Imagen ilustrativa" />
          </div>

          <h3 class="servies-subtitle">Consulta los resultados en tiempo real</h3>
          <p class="servies-parraf">En nuestra plataforma tienes la posibilidad de resivar los resultados en timepo real
            de las loterias y rifas más famosas del momento</p>
        </div>
        <div class="services-item">
          <div class="services-container-img">
            <img src="../../assets/imgs/services2.png" alt="Imagen ilustrativa" />
          </div>

          <h3 class="servies-subtitle">Apuestale a tus números favoritos</h3>
          <p class="servies-parraf">Te permitimos jugar en tus números en tus loterías favoritas , para que tengas
            accesos a tus oportunidades de ganar en cualquier parte del mundo </p>
        </div>
        <div class="services-item">
          <div class="services-container-img">
            <img src="../../assets/imgs/services1.png" alt="Imagen ilustrativa" />
          </div>

          <h3 class="servies-subtitle">Consulta los resultados en tiempo real</h3>
          <p class="servies-parraf">En nuestra plataforma tienes la posibilidad de resivar los resultados en timepo real
            de las loterias y rifas más famosas del momento</p>
        </div>
      </div>


      <div class="svg-container2">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
          <path fill="#FFF" fill-opacity="1" d="M0,128L1440,96L1440,0L0,0Z"></path>
        </svg>

      </div>

    </div>

    <div class="Raffle-calculator">
      <h2 class="Raffle-title">PRUEBA TU RIFAS Y VE LAS GANANCIAS</h2>
      <RaffleCalculator />
    </div>

  </div>
</template>

<script>
import Carrusel from '../components/Carrusel.vue'; // Verifica que esta ruta sea correcta.
import Word from '../components/Word.vue';
import RaffleCalculator from '../components/RaffleCalculator.vue';
import Navbar from '../components/Navbar.vue';


export default {
  name: 'Home',
  components: {
    Carrusel, // Asegúrate de registrarlo aquí.
    Word, //
    RaffleCalculator, // calculator
    Navbar
  },

};


</script>


<style scoped>
.main_content {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  background-color: #080257FF;
}

.hero {
  height: 100vh;

  display: flex;
  align-items: center;
  justify-content: space-between;
  max-width: 100%;
}

.hero-text {
  flex: 1;
  padding: 20px;
}

.hero-text h1 {
  font-family: 'Oswald', sans-serif;
  font-size: 5rem;
  margin-bottom: 20px;
  margin-left: -4%;
  width: 50vw;
  color: #Efb810;
}

.hero-text p {
  font-family: 'Oswald', sans-serif;

  font-size: 5.0em;
  margin-bottom: 20px;
  color: #FFFFFFFF;
}




.cta-button {
  width: 25%;
  margin-top: 10%;
  background-color: #Efb810;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-size: 1rem;
}

.cta-button:hover {
  background-color: #0056b3;
}

.hero-image {
  flex: 1;
  display: flex;
  justify-content: center;
  align-items: center;
  overflow: hidden;
  animation: slide-up 2s ease-in-out;
}



.hero-image img {
  max-width: 100%;
  height: auto;
  border-radius: 10px;
}

@keyframes slide-up {
  from {
    transform: translateY(100%);
    /* Inicia fuera de la vista (abajo) */
    opacity: 0;
    /* Inicia invisible */
  }

  to {
    transform: translateY(0);
    opacity: 1;
  }
}


.svg-container {
  width: 100%;
  background-color: #ffffff;
}

.svg-container2 {
  width: 100%;
  background-color: #080257FF;
}

svg {
  width: 100%;
  height: auto;
}

.svg-text {
  font-family: 'Oswald', sans-serif;


}

.img-container {
  margin-left: 30%;
  width: 500px;
  height: auto;
}

.img-container img {
  margin-left: 23%;
  width: 70%;
  height: auto;
  display: block;
}

.carrusel-section {
  width: 100%;
  align-content: center;
  background-color: #FFF;
}

.video-container {
  position: relative;
  top: -12%;
  display: flex;
  justify-content: center;
  height: 100vh;
}

iframe {
  max-width: 100%;
  max-height: 100%;
  border: none;
}


.aboutsection {
  height: 60vh;
  width: 100%;
  display: flex;
  flex-direction: column;
  background-color: white;
}

.about-title {
  position: relative;
  font-family: 'Oswald', sans-serif;
  font-size: 5rem;
  top: -48%;
  color: #080257FF;
  text-align: center;
}

.servicesection {
  background-color: #FFF;
  width: 100%;
  height: auto;
}

.services-title {

  margin-top: 5%;
  margin-bottom: 3%;
  font-size: 5rem;
  font-family: 'Oswald', sans-serif;
  opacity: 0.4;
  text-align: center;
}

.container-services {
  display: flex;
  flex-direction: row;
  margin-top: 5%;
  margin: auto;
  width: 80%;
  height: 70%;
}

.services-item {
  width: 33%;
  height: 90%;
  margin: auto;
}

.services-container-img {
  width: 100%;
  height: 70%;
  margin: auto;
  margin-top: 5%;
}

.services-container-img img {
  position: relative;
  top: -18%;
  margin-left: 11%;
}

.servies-subtitle {
  color: rgb(47, 40, 145);
  text-align: center;
  margin-top: -8%;
  font-size: 1.4rem;
  font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
}

.servies-parraf {
  margin-top: 1%;
  text-align: center;
  margin-bottom: 3%;

}

.Raffle-title {
  position: relative;
  font-family: 'Oswald', sans-serif;
  font-size: 4rem;
  text-align: center;
  top: -20%;
  color: #Efb810;
  background-color: #080257FF
}

.Raffle-calculator {
  margin-top: 1%;
  width: 100%;
  height: 100vh;
}
</style>
