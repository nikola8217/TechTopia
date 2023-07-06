<template>
    <div class="comment-form-area" v-if="user_id">
        <div class="form-header">
            <h4 class="form-title">Leave A Comment</h4>
        </div>
        <form class="comment-form" @submit="leaveComment">
            <div class="name-email-field d-flex justify-content-between">
                <div class="field-item name-field">
                    <span class="field-icon">
                        <svg width="16" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8 0.75C5.1084 0.75 2.75 3.1084 2.75 6C2.75 7.80762 3.67285 9.41309 5.07031 10.3594C2.39551 11.5078 0.5 14.1621 0.5 17.25H2C2 13.9277 4.67773 11.25 8 11.25C11.3223 11.25 14 13.9277 14 17.25H15.5C15.5 14.1621 13.6045 11.5078 10.9297 10.3594C12.3271 9.41309 13.25 7.80762 13.25 6C13.25 3.1084 10.8916 0.75 8 0.75ZM8 2.25C10.0801 2.25 11.75 3.91992 11.75 6C11.75 8.08008 10.0801 9.75 8 9.75C5.91992 9.75 4.25 8.08008 4.25 6C4.25 3.91992 5.91992 2.25 8 2.25Z" fill="#00234D"/>
                        </svg>                                                            
                    </span>
                    <input type="text" placeholder="Name" v-model="name" disabled />
                </div>
            </div>
            <div class="field-item textarea-field">
                <span class="field-icon">
                    <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.25 0.75V14.25H4V18.0586L8.76367 14.25H19.75V0.75H0.25ZM1.75 2.25H18.25V12.75H8.23633L5.5 14.9385V12.75H1.75V2.25ZM5.5 6C4.6709 6 4 6.6709 4 7.5C4 8.3291 4.6709 9 5.5 9C6.3291 9 7 8.3291 7 7.5C7 6.6709 6.3291 6 5.5 6ZM10 6C9.1709 6 8.5 6.6709 8.5 7.5C8.5 8.3291 9.1709 9 10 9C10.8291 9 11.5 8.3291 11.5 7.5C11.5 6.6709 10.8291 6 10 6ZM14.5 6C13.6709 6 13 6.6709 13 7.5C13 8.3291 13.6709 9 14.5 9C15.3291 9 16 8.3291 16 7.5C16 6.6709 15.3291 6 14.5 6Z" fill="#00234D"/>
                    </svg>                                                        
                </span>
                <textarea v-model="body" cols="20" rows="6" placeholder="Write your comment here........"></textarea>
            </div>
            <button type="submit" class="position-relative review-submit-btn mt-4">COMMENT</button>
        </form>
    </div>
</template>

<script>
import axios from 'axios';
import Swal from 'sweetalert2';

export default {
    name: 'CommentForm',
    mounted() {
        if (this.user_id) this.getUser();
    },
    data() {
        return {
            user_id: localStorage.getItem('user_id') ? localStorage.getItem('user_id') : null,
            name: '',
            blog_id: this.$route.params.id,
            body: '',
        }
    },
    methods: {
         async getUser() {
            await axios.get(`/api/users/${this.user_id}`, {
                headers: {
                    Authorization: `Bearer ${localStorage.getItem('token')}`
                }
            }).then(response => {
                this.name = response.data.user.name;
            }).catch(error => {
                console.log(error);
            });
        },

        async leaveComment(e) {
            e.preventDefault();
            
            await axios.post(`/api/comments/${this.blog_id}`,
            {
                body: this.body,
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
                    this.body = '';                                                          
                    this.$emit('update-comments');
                }                   
            }).catch((error) => {
                console.log(error);
            });
        },
    }
}
</script>