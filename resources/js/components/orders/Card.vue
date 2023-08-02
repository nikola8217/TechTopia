<template>
    <div class="checkout-page mt-100">
        <div class="container">
            <div class="checkout-page-wrapper">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                        <div class="section-header mb-3">
                            <h2 class="section-heading">Details</h2>
                        </div>

                        <div class="checkout-user-area overflow-hidden d-flex align-items-center">
                            <div class="checkout-user-details d-flex align-items-center justify-content-between w-100">
                                <div class="checkout-user-info">
                                    <h2 class="checkout-user-name">{{ name }}</h2>
                                    <p class="checkout-user-address mb-0">{{ email }}</p>
                                    <p class="checkout-user-address mb-0">{{ phone }}</p>
                                    <p class="checkout-user-address mb-0">{{ address }}, {{ zip }} {{ city }}, {{ country }}</p>
                                    <p class="checkout-user-address mb-0">{{ status }}</p>
                                </div>
                                
                                <button v-if="role_id && role_id == 3" class="edit-user btn-secondary" :disabled='isDisabled' @click="changeStatus">NEXT STEP</button>
                                <button v-else class="edit-user btn-secondary"  @click="deleteOrder()">CANCEL ORDER</button>
                            </div>
                        </div>
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
    name: 'Card',
    mounted() {
        this.getOrder();
    },
    data() {
        return {
            order_id: this.$route.params.id,
            role_id: localStorage.getItem('role_id') ? localStorage.getItem('role_id') : null,
            name: '',
            email: '',
            phone: '',
            address: '',
            zip: '',
            city: '',
            country: '',
            status_id: '',
            status: '',
            isDisabled: false
        }
    },
    methods: {
        async getOrder() {
            await axios.get(`/api/orders/${this.order_id}`)
                .then(response => {
                    this.name = response.data.order.username;
                    this.email = response.data.order.email;
                    this.phone = response.data.order.phone;
                    this.address = response.data.order.address;
                    this.zip = response.data.order.zip;
                    this.city = response.data.order.city;
                    this.country = response.data.order.country;
                    this.status_id = response.data.order.status_id;
                    this.status = response.data.order.name;
                    if (response.data.order.status_id == 4) {
                        this.isDisabled = true
                    }
                }).catch(error => {
                    console.log(error);
                });
        },

        async changeStatus() {
            await axios.put('/api/changeStatus',
            {
                id: this.order_id,
                status: this.status_id,
                email: this.email
            },
            {
                headers: {
                    Authorization: `Bearer ${localStorage.getItem('token')}`
                }
            }).then((response) => {                                                                
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: response.data.success,
                }).then(value => {
                    if(value.isConfirmed){
                        this.getOrder(this.order_id);
                    }
                });
                            
            }).catch((error) => {
                console.log(error);
            });
        },

        async deleteOrder() {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.delete(`/api/orders/${this.order_id}`, {
                        headers: {
                        Authorization: `Bearer ${localStorage.getItem('token')}`
                        }
                    })
                    .then(response => {
                        Swal.fire(
                            'Deleted!',
                            response.data.success,
                            'success'
                        );
                        window.location.href = '/profile';
                    })
                    .catch(error => {
                        console.error(error);
                    });
                }
            });
        },
    }

    
}
</script>