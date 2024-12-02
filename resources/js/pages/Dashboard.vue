<template>
   <div class="main-content">
    <Sidebar/>
    <div class="panel-container"> 
     <ResultsContainer/>
    </div>
    
   </div>
</template>
  
<script>
  import Navbar from '../components/Navbar.vue';
  import Sidebar from '../components/Sidebar.vue';
  import ResultsContainer from '../components/ResultsContainer.vue';
  export default {
    name: 'Dashboard',
    components: {
        Navbar,
        Sidebar,
        ResultsContainer
    }
  };
</script>
  
  <style scoped>
  .main-content{
    height: 100vh;
    display: flex;
    flex-direction: row;
  }

  .panel-container{
    margin-top: 2%;
    margin-left: 1%;
    width: 100%;
  }
  </style>
  