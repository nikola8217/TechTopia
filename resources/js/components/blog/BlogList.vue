<template>
    <div class="blog-page mt-100">
        <div class="blog-page-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-12" data-aos="fade-up" data-aos-duration="700" v-for="(blog, index) in this.blogs" :key="index">
                        <div class="article-card bg-transparent p-0 shadow-none">
                            <a class="article-card-img-wrapper" href="article.html">
                                <img :src="blog.img" alt="img" class="article-card-img rounded">
                            </a>
                            <p class="article-card-published text_12 d-flex align-items-center">
                                <span class="article-date d-flex align-items-center">
                                    <span class="icon-publish">
                                        <svg width="17" height="18" viewBox="0 0 17 18" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M3.46875 0.875V1.59375H0.59375V17.4063H16.4063V1.59375H13.5313V0.875H12.0938V1.59375H4.90625V0.875H3.46875ZM2.03125 3.03125H3.46875V3.75H4.90625V3.03125H12.0938V3.75H13.5313V3.03125H14.9688V4.46875H2.03125V3.03125ZM2.03125 5.90625H14.9688V15.9688H2.03125V5.90625ZM6.34375 7.34375V8.78125H7.78125V7.34375H6.34375ZM9.21875 7.34375V8.78125H10.6563V7.34375H9.21875ZM12.0938 7.34375V8.78125H13.5313V7.34375H12.0938ZM3.46875 10.2188V11.6563H4.90625V10.2188H3.46875ZM6.34375 10.2188V11.6563H7.78125V10.2188H6.34375ZM9.21875 10.2188V11.6563H10.6563V10.2188H9.21875ZM12.0938 10.2188V11.6563H13.5313V10.2188H12.0938ZM3.46875 13.0938V14.5313H4.90625V13.0938H3.46875ZM6.34375 13.0938V14.5313H7.78125V13.0938H6.34375ZM9.21875 13.0938V14.5313H10.6563V13.0938H9.21875Z"
                                                fill="#00234D" />
                                        </svg>
                                    </span>
                                    <span class="ms-2">{{ blog.created_at }}</span>
                                </span>
                            </p>
                            <h2 class="article-card-heading heading_18">
                                <a class="heading_18" @click="getDetails(blog.id)">
                                    {{ blog.title }}
                                </a>
                            </h2>
                        </div>
                    </div>
                </div>

                
            </div>
        </div>            
    </div> 
</template>

<script>
import axios from 'axios';

export default {
    name: 'BlogList',
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

        getDetails(id) {
            window.location.href = `/blogDetails/${id}`
        }
    }
}
</script>