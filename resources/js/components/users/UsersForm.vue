<template>
    <div class="checkout-page mt-100">
        <div class="container">
            <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                

                <div class="shipping-address-area">
                    <h2 class="shipping-address-heading pb-1">Edit User</h2>
                    <div class="shipping-address-form-wrapper">
                        <form class="shipping-address-form common-form" @submit="editUser">
                            <div class="row">
                                <div class="col-lg-6 col-md-12 col-12">
                                    <fieldset>
                                        <label class="label">Name</label>
                                        <input type="text" v-model="name" />
                                    </fieldset>
                                </div>
                                <div class="col-lg-6 col-md-12 col-12">
                                    <fieldset>
                                        <label class="label">Email</label>
                                        <input type="text" v-model="email" />
                                    </fieldset>
                                </div>
                                <div class="col-lg-6 col-md-12 col-12">
                                    <fieldset>
                                        <label class="label">Points</label>
                                        <input type="number" v-model="points" />
                                    </fieldset>
                                </div>
                                <div class="col-lg-6 col-md-12 col-12 mb-5">
                                    <fieldset>
                                        <label class="label">Role</label>
                                        <select class="form-select" v-model="role_id">
                                            <option v-for="role in roles" :value="role.id" :key="role.id" :selected="role.id === role_id">
                                                {{ role.name }}
                                            </option>
                                        </select>
                                    </fieldset>
                                </div>
                                <div class="col-lg-6 col-md-12 col-12">
                                    <div class="minicart-btn-area d-flex align-items-center justify-content-between flex-wrap">
                                        <a :href="$router.resolve({name: 'users'}).href" class="checkout-page-btn minicart-btn btn-secondary" style="border: 1px solid black">BACK</a>
                                        <button type="submit" class="checkout-page-btn minicart-btn btn-primary">SAVE</button>
                                    </div>
                                </div>
                                
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import Swal from 'sweetalert2';

export default {
    name: 'UsersForm',
    mounted() {
        this.getRoles();
        this.getUser();
    },
    data() {
        return {
            user_id: this.$route.params.id,
            name: '',
            email: '',
            points: '',
            role_id: '',
            roles: []
        }
    },
    methods: {
        async getUser() {
            await axios.get(`/api/users/${this.user_id}`, {
                headers: {
                    Authorization: `Bearer ${localStorage.getItem('token')}`
                }
            }).then(response => {
                this.name = response.data.user.name;
                this.email = response.data.user.email;
                this.points = response.data.user.points;
                this.role_id = response.data.user.role_id;
            }).catch(error => {
                console.log(error);
            });
        },
        async getRoles() {
            await axios.get('/api/roles', {
                headers: {
                    Authorization: `Bearer ${localStorage.getItem('token')}`
                }
            }).then(response => {
                this.roles = response.data.roles;
            }).catch(error => {
                console.log(error);
            });
        },
        async editUser(e) {
            e.preventDefault();
            
            await axios.put(`/api/users/${this.user_id}`,
            {
                name: this.name,
                email: this.email,
                points: this.points,
                role_id: this.role_id
            },
            {
                headers: {
                    Authorization: `Bearer ${localStorage.getItem('token')}`
                }
            }).then((response) => {
                if(response.data.error){    
                    Swal.fire({
                        icon: 'error',
                        text: response.data.error,
                    });
                }
                else {                                                                      
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: response.data.success,
                    }).then(value => {
                        if(value.isConfirmed){
                            window.location.href = '/users';
                        }
                    });
                }                   
            }).catch((error) => {
                console.log(error);
            });
        }
    }
}
</script>