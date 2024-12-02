<template>
    <div class="sidebar bg-gray-800 h-screen w-64 flex flex-col items-center py-6">
      <!-- Foto de perfil -->
      <div @click="toggleModal" class="profile-pic cursor-pointer hover:opacity-80 mb-8">
        <img
          :src="profilePic"
          alt="User Profile"
          class="w-20 h-20 rounded-full border-2 border-gray-300"
        />
      </div>
  
      <!-- Elementos del menú -->
      <div
        v-for="(item, index) in menuItems"
        :key="index"
        class="menu-item w-11/12 py-2 px-4 my-2 text-gray-300 rounded-md border border-gray-500 cursor-pointer hover:bg-gray-700 hover:text-white"
      >
        {{ item }}
      </div>
  
      <!-- Modal -->
      <div
        v-if="isModalOpen"
        class="fixed inset-0 flex justify-center items-center bg-black bg-opacity-50 z-50"
      >
        <div class="modal-content bg-white p-6 rounded-md shadow-lg">
          <h3 class="text-xl font-semibold mb-4">Perfil del usuario</h3>
          <p class="text-gray-600 mb-4">Aquí puedes cambiar la foto de perfil o editar los datos del usuario.</p>
          <button
            class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600"
            @click="closeModal"
          >
            Cerrar
          </button>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        profilePic: 'https://via.placeholder.com/150', // Imagen de perfil por defecto
        menuItems: ['Inicio', 'Panel', 'Estadísticas', 'Configuración', 'Ayuda'], // Elementos del menú
        isModalOpen: false, // Estado para el modal
      };
    },
    methods: {
      toggleModal() {
        this.isModalOpen = true;
      },
      closeModal() {
        this.isModalOpen = false;
      },
    },
  };
  </script>
  
  <style scoped>
  .sidebar {
    background-color: #080257FF;
    min-width: 16rem;   
    height: 100%;
  }
  .menu-item {
    border: 2px solid #Efb810;

    transition: all 0.2s ease;
  }
  </style>
  