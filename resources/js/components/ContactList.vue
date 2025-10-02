<template>
    <div class="container mt-5">
        <h2 class="mb-4 text-primary">Contact List</h2>
        <table class="table table-striped table-bordered shadow-sm">
            <thead class="table-dark">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Image</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="contact in contacts" :key="contact.id">
                <td>{{ contact.name }}</td>
                <td>{{ contact.email }}</td>
                <td>
                    <img :src="contact.image" alt="Contact Image" class="img-thumbnail" style="max-width: 80px;">
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "ContactList",
    data() {
        return {
            contacts: [],
        };
    },
    mounted() {
        axios.get("/api/contacts").then((response) => {
            this.contacts = response.data;
        });
    },
};
</script>
