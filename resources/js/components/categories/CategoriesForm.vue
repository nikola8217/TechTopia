<template>
    <div class="checkout-page mt-100" style="margin-bottom: 100px">
        <div class="container">
            <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                

                <div class="shipping-address-area">
                    <h2 class="shipping-address-heading pb-1">{{ category_id ? 'Edit Category' : 'Create Category' }}</h2>
                    <div class="shipping-address-form-wrapper">
                            <form class="shipping-address-form common-form" @submit="handleSubmit">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-12 mb-5">
                                    <fieldset>
                                        <label class="label">Name</label>
                                        <input type="text" v-model="name" />
                                    </fieldset>
                                </div>
                                <div class="col-lg-6 col-md-12 col-12">
                                    <div class="minicart-btn-area d-flex align-items-center justify-content-between flex-wrap">
                                        <a :href="$router.resolve({name: 'categories'}).href" class="checkout-page-btn minicart-btn btn-secondary" style="border: 1px solid black">BACK</a>
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
    name: "CategoriesForm",
    mounted() {
        if (this.category_id) this.getCategory();
    },
    data() {
        return {
            category_id: this.$route.params.id ? this.$route.params.id : '',
            name: ''
        }
    },
    methods: {
        async createCategory(e) {
            await axios.post('/api/categories',
            {
                name: this.name,
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
                            window.location.href = '/categories';
                        }
                    });
                }                   
            }).catch((error) => {
                console.log(error);
            });
        },

        async getCategory() {
            await axios.get(`/api/categories/${this.category_id}`)
            .then(response => {
                this.name = response.data.category.name;
            }).catch(error => {
                console.log(error);
            });
        },

        async editCategory(e) {
            await axios.put(`/api/categories/${this.category_id}`,
            {
                name: this.name,

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
                            window.location.href = '/categories';
                        }
                    });
                }                   
            }).catch((error) => {
                console.log(error);
            });
        },

        handleSubmit(e) {
            e.preventDefault();

            if (this.category_id) this.editCategory();
            else this.createCategory();
        }
    }
}
</script>