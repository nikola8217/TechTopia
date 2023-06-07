<template>
  <div>
    <ContactBox />
    <ContactForm />
  </div>
</template>

<script>
import ContactBox from '../components/contact/ContactBox.vue';
import ContactForm from '../components/contact/ContactForm.vue';

export default {
  components: {
    ContactBox,
    ContactForm
  }
}
</script>