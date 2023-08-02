<template>
    <div class="col-xl-8 col-lg-8 col-md-12 col-12">
        <div class="shipping-address-area">
            <h2 class="shipping-address-heading pb-1">Change password</h2>
            <div class="shipping-address-form-wrapper">
                <form class="shipping-address-form common-form" @submit="changePassword">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-12">
                            <fieldset>
                                <label class="label">Old password</label>
                                <input type="password" v-model="old_password" />
                            </fieldset>
                        </div>
                        <div class="col-lg-6 col-md-12 col-12">
                            <fieldset>
                                <label class="label">New password</label>
                                <input type="password" v-model="new_password" />
                            </fieldset>
                        </div>
                        
                        <div class="col-lg-6 col-md-12 col-12">
                            <div class="minicart-btn-area d-flex align-items-center justify-content-between flex-wrap" style="margin-top: 10px ">
                                <button type="submit" class="checkout-page-btn minicart-btn btn-primary">SAVE</button>
                            </div>
                        </div>
                        
                    </div>

                </form>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import Swal from 'sweetalert2';

export default {
    name: "ChangePass",
    data() {
        return {
            old_password: '',
            new_password: '',
            user_id: localStorage.getItem('user_id') ? localStorage.getItem('user_id') : null,
        }
    },
    methods: {
        async changePassword(e) {
            e.preventDefault();
            
            await axios.put(`/api/changePassword/${this.user_id}`,
            {
                old_password: this.old_password,
                new_password: this.new_password
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
                            this.old_password = '';
                            this.new_password = '';
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