<template>
    
    <div class="col-xl-4 col-lg-4 col-md-12 col-12">
        <div class="checkout-user-area overflow-hidden d-flex align-items-center">
            <div class="checkout-user-details d-flex align-items-center justify-content-between w-100">
                <div class="checkout-user-info">
                    <h2 class="checkout-user-name">{{ name }}</h2>
                    <p class="checkout-user-address mb-0">{{ email }}</p>
                    <p class="checkout-user-address mb-0">{{ points }} points</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: "Card",
    mounted() {
        this.getUser();
    },
    data() {
        return {
            user_id: localStorage.getItem('user_id') ? localStorage.getItem('user_id') : null,
            name: '',
            email: '',
            points: '',
        }
    },
    methods: {
        async getUser() {
            await axios.get(`/api/users/${this.user_id}`, {
                headers: {
                    Authorization: `Bearer ${localStorage.getItem('token')}`
                }
            }).then(response => {
                console.log(response, 24)
                this.name = response.data.user.name;
                this.email = response.data.user.email;
                this.points = response.data.user.points;
                this.role_id = response.data.user.role_id;
            }).catch(error => {
                console.log(error);
            });
        },
        
    }
}
</script>