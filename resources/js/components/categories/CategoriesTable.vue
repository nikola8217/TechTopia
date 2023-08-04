<template>
    <div class="cart-page mt-100" style="margin-bottom: 100px">
        <div class="container">
            <div class="cart-page-wrapper">
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-12">
                        <div class="mb-5">
                            <button class="btn btn-success" @click="createCategory">Create Category</button>
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
                                <tr class="cart-item" v-for="(category, index) in this.categories" :key="index">
                                    <td>
                                        {{ category.id }}
                                    </td>
                                    <td>
                                        <p style="cursor: pointer" @click="navToProducts(category.id)"> {{ category.name }} </p>                                 
                                    </td>
                                    <td>
                                        <div class="btn-group" style="float: right;">
                                            <button class="btn btn-primary" style="margin-right: 5px;" @click="editCategory(category.id)">
                                                Edit
                                            </button>
                                            <button class="btn btn-danger" @click="deleteCategory(category.id)">
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
    name: "CategoriesTable",
    mounted() {
        this.getCategories();
    },
    data() {
        return {
            categories: []
        }
    },
    methods: {
        async getCategories() {
            await axios.get('/api/categories')
                .then(response => {
                    this.categories = response.data.categories;
                })
                .catch(error => {
                    console.log(error);
                });
        },

        createCategory() {
            window.location.href = '/categoriesForm';
        },

        editCategory(id) {
            window.location.href = `/categoriesForm/${id}`; 
        },

        async deleteCategory(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.delete(`/api/categories/${id}`, {
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
                        this.getCategories();
                    })
                    .catch(error => {
                        console.error(error);
                    });
                }
            });
        },

        navToProducts(id) {
            window.location.href = `/productsAdmin/${id}`; 
        },
    }
}
</script>