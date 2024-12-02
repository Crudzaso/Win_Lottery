<template>
  <div class="carousel-container">
    <!-- Contenedor del carrusel -->
    <div class="carousel" :style="{ transform: `translateX(-${currentIndex * (100 / visibleImages)}%)` }">
      <!-- Elementos del carrusel -->
      <div class="carousel-item" v-for="(image, index) in images" :key="index">
        <img :src="image" alt="Image" />
      </div>
    </div>
  </div>
</template>

<script>
import logoAntioquenita from '../../assets/logos/LogoAntioqueñita1.png';
import logoAstro from '../../assets/logos/LogoAstro.png';
import logoPaisita from '../../assets/logos/logoPaisita.png';
import logoPijao from '../../assets/logos/LogoPijao.png';
import logoAstroLuna from '../../assets/logos/LogoAstroLuna.png';
import logoEldorado from '../../assets/logos/LogoEldorado.png';
import logoCafeterito from '../../assets/logos/LogoCafeterito.png';
import logoFantastica from '../../assets/logos/LogoFantastica.png';

export default {
  data() {
    return {
      images: [logoAntioquenita, logoAstro, logoPaisita, logoPijao ,logoAstroLuna, logoCafeterito, logoEldorado, logoFantastica, logoAntioquenita ,logoPaisita , logoAstroLuna,logoEldorado,logoAstroLuna,logoCafeterito,logoFantastica,logoPaisita,logoAstro,logoAntioquenita,logoEldorado],
      currentIndex: 0, // Índice inicial
      visibleImages: 7, // Cantidad de imágenes visibles
      interval: null, // Controlador del temporizador
    };
  },
  computed: {
    maxIndex() {
      // Determina el índice máximo para evitar overflow
      return this.images.length - this.visibleImages;
    },
  },
  methods: {
    nextSlide() {
      // Avanza el carrusel automáticamente (desplaza una imagen)
      this.currentIndex = (this.currentIndex < this.maxIndex) ? this.currentIndex + 1 : 0;
    },
  },
  mounted() {
    // Inicia el desplazamiento automático
    this.interval = setInterval(() => {
      this.nextSlide();
    }, 3000); // Cada 3 segundos
  },
  beforeDestroy() {
    // Limpia el intervalo para evitar problemas de memoria
    clearInterval(this.interval);
  },
};
</script>

<style scoped>
.carousel-container {
  margin: auto;
  position: relative;
  width: 100%;
  overflow: hidden;
}

.carousel {
  display: flex;
  transition: transform 0.5s ease-in-out;
}

.carousel-item {
  background-color: rgb(255, 255, 255);
  border-radius: 10px;
  margin-left: 0.5%;
  border: 1px solid  #Efb810;
;
  flex: 0 0 calc(50% / 4); /* Ajusta el ancho para mostrar 3 imágenes */
  display: flex;
  justify-content: center;
  align-items: center;
}

.carousel-item img {

  width: 100%;
  height: auto;
  object-fit: cover;
}
</style>
