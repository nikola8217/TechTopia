<template>
    <div class="contact-form-section mt-100">
        <div class="container">
            <div class="contact-form-area">
                <div class="section-header mb-4">
                    <h2 class="section-heading">Drop us a line</h2>
                    <p class="section-subheading">We would like to hear from you.</p>
                </div>
                <div class="contact-form--wrapper">
                    <form action="#" class="contact-form">
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <fieldset>
                                    <input type="text" placeholder="Full name" />
                                </fieldset>
                            </div>
                            <div class="col-md-6 col-12">
                                <fieldset>
                                    <input type="email" placeholder="Email Address*" />
                                </fieldset>
                            </div>
                            <div class="col-md-6 col-12">
                                <fieldset>
                                    <input type="text" placeholder="Type a subject" />
                                </fieldset>
                            </div>
                            <div class="col-md-6 col-12">
                                <fieldset>
                                    <input type="text" placeholder="Phone Number" />
                                </fieldset>
                            </div>
                            <div class="col-md-12 col-12">
                                <fieldset>
                                    <textarea cols="20" rows="6" placeholder="Write your message here*"></textarea>
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
export default {
    name: "ContactForm"
}
</script>