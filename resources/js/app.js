require('./bootstrap');

import { createApp } from 'vue'
import Weight from './components/Weight'

const app = createApp({})

app.component('weight', Weight)

app.mount('#app')
