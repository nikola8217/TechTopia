<template>
    <div class="contact-form-section mt-100">
        <div class="container">
            <div class="contact-form-area">
                <div class="section-header mb-4">
                    <h2 class="section-heading">Drop us a line</h2>
                    <p class="section-subheading">We would like to hear from you.</p>
                </div>
                <div class="contact-form--wrapper">
                    <form @submit="sendEmail" class="contact-form">
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <fieldset>
                                    <input type="email" v-model="email" placeholder="Email Address" />
                                </fieldset>
                            </div>
                            <div class="col-md-6 col-12">
                                <fieldset>
                                    <input type="text" v-model="subject" placeholder="Subject" />
                                </fieldset>
                            </div>
                            <div class="col-md-12 col-12">
                                <fieldset>
                                    <textarea v-model="content" cols="20" rows="6" placeholder="Write your message here*"></textarea>
                                </fieldset>
                                <button type="submit" class="position-relative review-submit-btn contact-submit-btn">SEND MESSAGE</button>
                            </div>
                        </div>                                    
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import Swal from 'sweetalert2';

export default {
    name: "ContactForm",
    data() {
        return {
            subject: '',
            email: '',
            content: '',
        }
    },
    methods: {
        async sendEmail(e) {
            e.preventDefault();
            
            await axios.post('api/sendEmail', {
                subject: this.subject,
                email: this.email,
                content: this.content
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
                            this.email = '';
                            this.subject = '';
                            this.content = '';
                        }
                    });
                }                   
            }).catch((error) => {
                console.log(error);
            });
        }
    }
}
</script>