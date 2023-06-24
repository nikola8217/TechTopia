<template>
    <div class="cart-page mt-100">
        <div class="container">
            <div class="cart-page-wrapper">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="mb-5">
                            <button class="btn btn-success" @click="createBlog">Create Blog</button>
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
                                <tr class="cart-item" v-for="(blog, index) in this.blogs" :key="index">
                                    <td>
                                        {{ blog.id }}
                                    </td>
                                    <td>
                                        {{ blog.title }}                                    
                                    </td>
                                    <td>
                                        <div class="btn-group" style="float: right;">
                                            <button class="btn btn-primary" style="margin-right: 5px;" @click="editBlog(blog.id)">
                                                Edit
                                            </button>
                                            <button class="btn btn-danger" @click="deleteBlog(blog.id)">
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
    name: "BlogsTable",
    mounted() {
        this.getBlogs();
    },
    data() {
        return {
            blogs: []
        }
    },
    methods: {
        async getBlogs() {
            await axios.get('/api/blogs')
                .then(response => {
                    this.blogs = response.data.blogs;
                })
                .catch(error => {
                    console.log(error);
                });
        },

        createBlog() {
            window.location.href = '/blogsForm';
        },

        editBlog(id) {
            window.location.href = `/blogsForm/${id}`; 
        },

        async deleteBlog(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.delete(`/api/blogs/${id}`, {
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
                        this.getBlogs();
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