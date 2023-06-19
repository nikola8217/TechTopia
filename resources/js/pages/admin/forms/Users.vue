<template>
  <div>
    <UsersForm />
  </div>
</template>

<script>
import UsersForm from '../../../components/users/UsersForm.vue';

export default {
  components: {
    UsersForm,
  },
  props: ['id'],
}
</script>
