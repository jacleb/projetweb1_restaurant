
import { createApp, ref } from 'https://unpkg.com/vue@3/dist/vue.esm-browser.js'

const reviews = ref([])
const review = ref({ title: "", text: "" })

fetch("data/reviews.json").then(resp => {
    resp.json().then(content => {
        reviews.value = content
        review.value = arrayRand(content) 
    })
})

function arrayRand(tableau){ 
    return tableau[Math.floor(Math.random() * tableau.length)]
}

const root = {
    setup() {
        return {
            //Propriétés
            reviews,
            review,
        }
    }
}

//Initialisation de vue
createApp(root).mount('#app')