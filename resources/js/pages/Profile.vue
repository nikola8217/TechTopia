<template>
  <div>
    <div class="checkout-page mt-100" style="margin-bottom: 70px">
        <div class="container">
            <div class="checkout-page-wrapper">
                <div class="row">
                  <Card />   
                  <ChangePass />
                </div>
            </div>
        </div>
    </div> 
    <OrdersList /> 
  </div>
</template>

<script>
import Card from '../components/profile/Card.vue';
import OrdersList from '../components/profile/OrdersList.vue';
import ChangePass from '../components/profile/ChangePass.vue'

export default {
  components: {
    Card,
    OrdersList,
    ChangePass
  }
}
</script>