<template>
    <div class="cart-page mt-100">
        <div class="container">
            <div class="cart-page-wrapper">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                        <!-- <div class="mb-5">
                            <button class="btn btn-success">Create User</button>
                        </div> -->
                        <table class="cart-table w-100">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Points</th>
                                    <th>Role</th>
                                    <th style="text-align: right">Actions</th>
                                </tr>
                            </thead>
                
                            <tbody>
                                <tr class="cart-item" v-for="(user, index) in this.users" :key="index">
                                    <td>
                                        {{ user.user_id }}
                                    </td>
                                    <td>
                                        {{ user.name }}                                    
                                    </td>
                                    <td >
                                        {{ user.email }}                                    
                                    </td>
                                    <td>
                                        {{ user.points }}                                    
                                    </td>
                                    <td>
                                        {{ user.role_name }}                                    
                                    </td>
                                    <td>
                                        <div class="btn-group" style="float: right;">
                                            <button class="btn btn-primary" style="margin-right: 5px;" @click="editUser(user.user_id)">
                                                Edit
                                            </button>
                                            <button class="btn btn-danger" @click="deleteUser(user.user_id)">
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
    name: 'UsersTable',
    mounted() {
        this.getUsers();
    },
    data() {
        return {
            users: []
        }
    }, 
    methods: {
        async getUsers() {
            await axios.get('/api/users', {
                headers: {
                    Authorization: `Bearer ${localStorage.getItem('token')}`
                }
            })
                .then(response => {
                    this.users = response.data.users;
                    console.log(this.users);
                })
                .catch(error => {
                    console.log(error);
                });
        },
        editUser(id) {
            this.$router.push(`/usersForm/${id}`);
        },
        async deleteUser(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.delete(`/api/users/${id}`, {
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
                        this.getUsers();
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