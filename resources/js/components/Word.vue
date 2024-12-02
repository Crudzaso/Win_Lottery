<template>
    <div class="word-container">
      <span class="word" id="word1">DISFRUTA</span>
      <span class="word" id="word2">MULTIPLICA</span>
      <span class="word" id="word3">ASEGURA</span>

    </div>
  </template>
  
  <script>
  export default {
  mounted() {
    let currentWord = 1;

    function changeWord() {
      const word1 = document.getElementById('word1');
      const word2 = document.getElementById('word2');
      const word3 = document.getElementById('word3');
      
      if (!word1 || !word2 || !word3) return; // Verifica que todos los elementos existan

      // Esconde todas las palabras y las mueve a la posición inicial
      word1.classList.remove('show');
      word2.classList.remove('show');
      word3.classList.remove('show');
      word1.style.top = '100%';
      word2.style.top = '100%';
      word3.style.top = '100%';

      // Mueve la palabra actual hacia la posición visible
      if (currentWord === 1) {
        word1.classList.add('show');
        word1.style.top = '0';
        currentWord = 2;
      } else if (currentWord === 2) {
        word2.classList.add('show');
        word2.style.top = '0';
        currentWord = 3;
      } else if (currentWord === 3) {
        word3.classList.add('show');
        word3.style.top = '0';
        currentWord = 1;
      }
    }

    // Cambiar palabra cada 2 segundos
    setInterval(changeWord, 2000);

    // Inicialmente mostrar la primera palabra
    const word1 = document.getElementById('word1');
    if (word1) word1.classList.add('show');
  }
};


</script>
  
  <style scoped>
  .word-container {
    top: -5vh;
    right: 30vh;
    position: relative;
    height: 6rem; /* Ajusta según el tamaño de la fuente */
    overflow: hidden;
  }
  
  .word {
    font-family: 'Oswald', sans-serif;
    position: absolute;
    top: 0;
    width: 100%;
    text-align: center;
    font-size: 5rem;
    opacity: 0;
    color: white;
    transition: opacity 0.3s ease-in-out, top 0.5s ease-in-out;
  }
  
  .word.show {
    opacity: 1;
  }
  
  #word2 {
    top: 100%;
  }
  
  #word1 {
    top: 0;
  }
  </style>
  