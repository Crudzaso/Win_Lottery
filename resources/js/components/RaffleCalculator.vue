<template>
    <div class="calculator-container">

        <div class="calculator">

            <!-- Input para el número de boletos -->
            <div class="input-container">
                <label class="label-input" for="tickets">Número de boletos:</label>
                <input id="tickets" type="number" v-model.number="numTickets" min="1"
                    placeholder="Ingresa el número de boletos" />
            </div>

            <!-- Barra deslizante para el total del premio -->
            <div class="slider-container">
                <label  class="label-input" for="prize">Total del premio:</label>
                <input id="prize" type="range" v-model="totalPrize" :min="500000" :max="50000000" :step="500000" />
                <p class="Total">Total del premio: {{ formatCurrency(totalPrize) }}</p>
            </div>

        </div>

        <!-- Card con el resultado -->
        <div class="card-result">
            <h3 class="car-">RESULTADOS DE LA RIFA</h3>
            <p>Número de boletos: <strong>{{ numTickets }}</strong></p>
            <p>Total del premio: <strong>{{ formatCurrency(totalPrize) }}</strong></p>
            <p>
                Precio recomendado por boleto:
                <strong>{{ formatCurrency(ticketPrice) }}</strong>
            </p>
            <p>Ganancia estimada: <strong>{{ formatCurrency(profit) }}</strong></p>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            numTickets: 100, // Número inicial de boletos
            totalPrize: 500000, // Valor inicial del premio
            profitMargin: 0.3, // Margen de ganancia del 30%
        };
    },
    computed: {
        // Calcula el precio recomendado por boleto
        ticketPrice() {
            if (this.numTickets <= 0) return 0;
            const baseCost = this.totalPrize / this.numTickets; // Costo base por boleto
            return baseCost * (1 + this.profitMargin); // Incrementa el precio con el margen de ganancia
        },
        // Calcula la ganancia total estimada
        profit() {
            return this.ticketPrice * this.numTickets - this.totalPrize;
        },
    },
    methods: {
        // Formatea números como moneda
        formatCurrency(value) {
            return new Intl.NumberFormat("es-CO", {
                style: "currency",
                currency: "COP",
            }).format(value);
        },
    },
};
</script>

<style scoped>
.calculator-container {
    display: flex;
    flex-direction: row;
    gap: 1rem;
    padding: 1rem;
    width: 100%;
    height: 100%;
    margin: auto;

}

.input-container{
    margin-left: 3%;
    display: flex;
    flex-direction: column;
    margin-top: 1%;
}
.slider-container{
    
    display: flex;
    flex-direction: column;
    margin-top: 15%;
}
.card-result {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

.card-result h3 {
  font-size: 2rem;
  font-family: 'Oswald', sans-serif;

}

label {
    font-weight: bold;
    color: #333;
}

input[type="number"] {
    padding: 0.5rem;
    font-size: 1rem;
    border: 1px solid #ddd;
    border-radius: 5px;
}

input[type="range"] {
    width: 100%;
}

.card-result {
    height: 80%;
    padding: 1rem;
    background-color: #ffffff;
    border: 2px solid #Efb810;
    border-radius: 10px;
    text-align: center;
    margin-left: 40%;
}

.card-result h3 {
    margin-bottom: 1rem;
}

.card-result p {
    margin: 0.5rem 0;
}

.label-input{
    font-family: 'Oswald', sans-serif;
    text-align: center;
    color: #Efb810;
    font-size: 3rem;
    font-family: 'Oswald', sans-serif
}

.Total{
    color: #FFF;
    font-size: 2rem;
    font-family: 'Oswald', sans-serif  
}
</style>