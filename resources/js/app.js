import './bootstrap';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';

import { createApp } from 'vue';
import ContactList from './components/ContactList.vue';

const app = createApp({});
app.component('contact-list', ContactList);
app.mount('#app');
