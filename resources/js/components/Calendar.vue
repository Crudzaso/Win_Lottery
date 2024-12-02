<template>
    <div class="calendar-container">
      <label for="date-picker" class="block text-gray-700 font-medium mb-2">Seleccionar fecha:</label>
      <input
        id="date-picker"
        type="date"
        class="border rounded-md p-2 w-full"
        v-model="selectedDate"
        @change="emitDate"
      />
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        selectedDate: "", // Fecha seleccionada por el usuario
      };
    },
    methods: {
      emitDate() {
        // Emitir evento con la fecha seleccionada
        this.$emit("date-selected", this.selectedDate);
      },
    },
  };
  </script>
  
  <style scoped>
  .calendar-container {
    margin-bottom: 1rem;
  }
  </style>
  