<template>
    <div class="cart-page mt-100">
        <div class="container">
            <div class="cart-page-wrapper">
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-12">
                        <div class="mb-5">
                            <button class="btn btn-success" @click="createBrand">Create Brand</button>
                        </div>
                        <table class="cart-table w-100">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th style="text-align: right">Actions</th>
                                </tr>
                            </thead>
                
                            <tbody>
                                <tr class="cart-item" v-for="(brand, index) in this.brands" :key="index">
                                    <td>
                                        {{ brand.id }}
                                    </td>
                                    <td>
                                        {{ brand.name }}                                    
                                    </td>
                                    <td>
                                        <div class="btn-group" style="float: right;">
                                            <button class="btn btn-primary" style="margin-right: 5px;" @click="editBrand(brand.id)">
                                                Edit
                                            </button>
                                            <button class="btn btn-danger" @click="deleteBrand(brand.id)">
                                                Delete
                                            </button>
                                        </div>
                                    </td>                  
                                </tr>
                            </tbody>
                        </table>
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
    name: "BrandsTable",
    mounted() {
        this.getBrands();
    },
    data() {
        return {
            brands: []
        }
    },
    methods: {
        async getBrands() {
            await axios.get('/api/brands')
                .then(response => {
                    this.brands = response.data.brands;
                })
                .catch(error => {
                    console.log(error);
                });
        },

        createBrand() {
            window.location.href = '/brandsForm';
        },

        editBrand(id) {
            window.location.href = `/brandsForm/${id}`; 
        },

        async deleteBrand(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.delete(`/api/brands/${id}`, {
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
                        this.getBrands();
                    })
                    .catch(error => {
                        console.error(error);
                    });
                }
            });
        }
    }
}
</script>