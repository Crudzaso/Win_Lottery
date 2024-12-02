<template>
    <div class="container">
      <!-- Componente del calendario -->
      <calendar @date-selected="fetchResultsByDate" />
  
      <!-- Mostrar estado de carga -->
      <div v-if="loading" class="text-center text-gray-500">Cargando resultados...</div>
      <!-- Mostrar estado de error -->
      <div v-else-if="error" class="text-center text-red-500">Error al cargar resultados</div>
      <!-- Mostrar resultados -->
      <div v-else class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        <div
          v-for="(lottery, index) in results"
          :key="index"
          class="card-container"
          @mouseover="hoveredResult = index"
          @mouseleave="hoveredResult = null"
        >
          <div class="card" :class="{ flipped: hoveredResult === index }">
            <!-- Cara frontal -->
            <div class="card-front">
              <p class="text-center text-black font-medium">{{ lottery.slug }}</p>
            </div>
            <!-- Cara trasera -->
            <div class="card-back">
              <p class="text-center text-white font-bold">{{ lottery.result }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  import axios from "axios";
  import Calendar from "./Calendar.vue";
  
  export default {
    components: { Calendar },
    data() {
      return {
        results: [], // Datos de los resultados
        loading: true, // Estado de carga
        error: false, // Estado de error
        hoveredResult: null, // Índice del elemento en hover
      };
    },
    methods: {
      async fetchResults() {
        try {
          const response = await axios.get("https://api-resultadosloterias.com/api/results");
          this.results = response.data.data; // Asignar datos de la API
          this.loading = false;
        } catch (error) {
          this.error = true;
          this.loading = false;
          console.error("Error al cargar los resultados:", error);
        }
      },
      async fetchResultsByDate(date) {
        // Manejar si no se seleccionó ninguna fecha
        if (!date) return;
  
        this.loading = true;
        try {
          const response = await axios.get(`https://api-resultadosloterias.com/api/results/${date}`);
          this.results = response.data.data; // Actualizar resultados con la fecha seleccionada
          this.loading = false;
        } catch (error) {
          this.error = true;
          this.loading = false;
          console.error("Error al cargar los resultados para la fecha:", error);
        }
      },
    },
    mounted() {
      this.fetchResults(); // Llamar a la API al montar el componente
    },
  };
  </script>
  
  <style scoped>
  .container {
    width: 50%;
    padding: 2rem;
    border: 2px solid #Efb810;
    border-radius: 20px;
  }
  
  .card-container {
    perspective: 1000px; /* Habilita el efecto 3D */
  }
  
  .card {
    width: 100%;
    height: 120px;
    position: relative;
    transform-style: preserve-3d;
    transition: transform 0.6s ease-in-out;
  }
  
  .card.flipped {
    transform: rotateY(180deg); /* Gira la carta */
  }
  
  .card-front,
  .card-back {
    position: absolute;
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    backface-visibility: hidden; /* Oculta la cara trasera cuando no está frente a la vista */
    border: 2px solid #Efb810;
    border-radius: 20px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    text-align: center;
  }
  
  .card-front {
    background-color: white;
  }
  
  .card-back {
    background-color: #1d4ed8; /* Fondo azul para la cara trasera */
    color: white;
    transform: rotateY(180deg); /* Posiciona la cara trasera inicialmente */
  }
  </style>
  