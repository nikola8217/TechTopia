<template>
    <div class="comments-section mt-100 home-section overflow-hidden">
        <div class="section-header" v-if="comments.length > 0">
            <h4 class="section-heading">Comments - {{ comments.length }}</h4>
        </div>
        <div class="comments-area" v-if="comments.length > 0">
            <div class="d-flex comments-item" v-for="(comment, index) in this.comments" :key="index">
                <div class="comments-main">
                    <div class="comments-main-content">
                        <div class="comments-meta">
                            <h4 class="commentator-name">{{ comment.name }}</h4>
                            <div class="comments-date article-date d-flex align-items-center">
                                <span class="icon-publish">
                                    <svg width="17" height="18" viewBox="0 0 17 18" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M3.46875 0.875V1.59375H0.59375V17.4063H16.4063V1.59375H13.5313V0.875H12.0938V1.59375H4.90625V0.875H3.46875ZM2.03125 3.03125H3.46875V3.75H4.90625V3.03125H12.0938V3.75H13.5313V3.03125H14.9688V4.46875H2.03125V3.03125ZM2.03125 5.90625H14.9688V15.9688H2.03125V5.90625ZM6.34375 7.34375V8.78125H7.78125V7.34375H6.34375ZM9.21875 7.34375V8.78125H10.6563V7.34375H9.21875ZM12.0938 7.34375V8.78125H13.5313V7.34375H12.0938ZM3.46875 10.2188V11.6563H4.90625V10.2188H3.46875ZM6.34375 10.2188V11.6563H7.78125V10.2188H6.34375ZM9.21875 10.2188V11.6563H10.6563V10.2188H9.21875ZM12.0938 10.2188V11.6563H13.5313V10.2188H12.0938ZM3.46875 13.0938V14.5313H4.90625V13.0938H3.46875ZM6.34375 13.0938V14.5313H7.78125V13.0938H6.34375ZM9.21875 13.0938V14.5313H10.6563V13.0938H9.21875Z"
                                            fill="#00234D" />
                                    </svg>
                                </span>
                                <span class="ms-2">{{ comment.date }}</span>
                            </div>
                            <p class="comments">{{ comment.body }}</p>
                        </div>
                        <button v-if="user_id && user_id == comment.user_id" type="button" @click="deleteComment(comment.comment_id)" class="btn-reply bg-transparent d-flex align-items-center">
                            <span class="btn-reply-text">Delete</span>
                        </button>
                    </div>
                </div>
            </div>
           
        </div>
        <CommentForm @update-comments="getComments" />
    </div>
</template>

<script>
import CommentForm from './CommentForm.vue';
import axios from 'axios';
import moment from 'moment';

export default {
    name: 'CommentList',
    components: {
        CommentForm
    },
    mounted() {
        this.getComments();
    },
    data() {
        return {
            blog_id: this.$route.params.id,
            user_id: localStorage.getItem('user_id') ? localStorage.getItem('user_id') : null,
            role_id: localStorage.getItem('role_id') ? localStorage.getItem('role_id') : null,
            comments: []
        }
    },
    methods: {
        async getComments() {
            await axios.get(`/api/comments/${this.blog_id}`)
                .then(response => {
                    this.comments = response.data.comments.map(comment => ({
                        ...comment,
                        date: moment(comment.date).format('D MMMM, YYYY')
                    }));
                }).catch(error => {
                    console.log(error);
                });
        },

        async deleteComment(id) {
            await axios.delete(`/api/comments/${id}`, {
                headers: {
                Authorization: `Bearer ${localStorage.getItem('token')}`
                }
            })
            .then(response => {
                this.getComments();
            })
            .catch(error => {
                console.error(error);
            });
        }

        
    }
}
</script>