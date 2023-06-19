<template>
    <div class="login-page mt-100" style="margin-bottom: 220px">
        <div class="container">
            <form action="#" class="login-form common-form mx-auto" @submit="login">
                <div class="section-header mb-3">
                    <h2 class="section-heading text-center">Login</h2>
                </div>
                <div class="row">
                    <div class="col-12">
                        <fieldset>
                            <label class="label">Email address</label>
                            <input type="email" v-model="email" />
                        </fieldset>
                    </div>
                    <div class="col-12">
                        <fieldset>
                            <label class="label">Password</label>
                            <input type="password" v-model="password" />
                        </fieldset>
                    </div>
                    <div class="col-12 mt-3">
                        <a href="#" class="text_14 d-block">Forgot your password?</a>
                        <button type="submit" class="btn-primary d-block mt-4 btn-signin">SIGN IN</button>
                        <router-link to="/register" class="btn-secondary mt-2 btn-signin">CREATE AN ACCOUNT</router-link>
                    </div>
                </div>
            </form>
        </div>
    </div>  
</template>

<script>
import axios from 'axios';
import Swal from 'sweetalert2';

export default {
    name: 'LoginForm',
    data() {
        return {
            email: '',
            password: '',
        }
    }, 
    methods: {
        async login(e) {
            e.preventDefault();
            await axios.post('api/login', {
                email: this.email,
                password: this.password,
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
                            localStorage.setItem('token', response.data.token);
                            localStorage.setItem('user_id', response.data.user.id);
                            localStorage.setItem('role_id', response.data.role_id);
                            if (localStorage.getItem('role_id') === '2') window.location.href = '/users';
                            else window.location.href = '/';
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