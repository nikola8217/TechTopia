<template>
    <div class="checkout-page mt-100" style="margin-bottom: 100px">
        <div class="container">
            <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                

                <div class="shipping-address-area">
                    <h2 class="shipping-address-heading pb-1">{{ blog_id ? 'Edit Blog' : 'Create Blog' }}</h2>
                    <div class="shipping-address-form-wrapper">
                            <form class="shipping-address-form common-form" @submit="handleSubmit">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-12">
                                    <fieldset>
                                        <label class="label">Title</label>
                                        <input type="text" v-model="title" />
                                    </fieldset>
                                </div>
                                <div class="col-lg-12 col-md-12 col-12">
                                    <fieldset>
                                        <label class="label">Image</label>
                                        <input type="text" v-model="image" />
                                    </fieldset>
                                </div>
                                <div class="col-lg-12 col-md-12 col-12 mb-5">
                                    <fieldset>
                                        <label class="label">Body</label>
                                        <textarea class="form-control" rows="10" v-model="body"></textarea>
                                    </fieldset>
                                </div>
                                <div class="col-lg-6 col-md-12 col-12">
                                    <div class="minicart-btn-area d-flex align-items-center justify-content-between flex-wrap">
                                        <a :href="$router.resolve({name: `blogsManager`}).href" class="checkout-page-btn minicart-btn btn-secondary" style="border: 1px solid black">BACK</a>
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
    name: "BlogsForm",
    mounted() {
        if (this.blog_id) this.getBlog();
    },
    data() {
        return {
            blog_id: this.$route.params.id ? this.$route.params.id : '',
            title: '',
            image: '',
            body: ''

        }
    },
    methods: {
        async createBlog(e) {
            await axios.post('/api/blogs',
            {
                title: this.title,
                img: this.image,
                body: this.body
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
                            window.location.href = '/blogsManager';
                        }
                    });
                }                   
            }).catch((error) => {
                console.log(error);
            });
        },

        async getBlog() {
            await axios.get(`/api/blogs/${this.blog_id}`)
                .then(response => {
                    this.title = response.data.blog.title;
                    this.image = response.data.blog.img;
                    this.image = this.image.replace('../images/', '');
                    this.body = response.data.blog.body;
                }).catch(error => {
                    console.log(error);
                });
        },

        async editBlog(e) {
            await axios.put(`/api/blogs/${this.blog_id}`,
            {
                title: this.title,
                img: this.image,
                body: this.body

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
                            window.location.href = '/blogsManager';
                        }
                    });
                }                   
            }).catch((error) => {
                console.log(error);
            });
        },

        handleSubmit(e) {
            e.preventDefault();

            if (this.blog_id) this.editBlog();
            else this.createBlog();
        }
    }
}
</script>