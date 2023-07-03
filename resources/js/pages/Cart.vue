<template>
    <div class="cart-page mt-100" style="margin-bottom: 700px">
        <div class="container">
            <div class="cart-page-wrapper">
                <div class="row">
                    <div class="col-lg-7 col-md-12 col-12">
                        <table class="cart-table w-100">
                            <thead>
                                <tr>
                                <th class="cart-caption heading_18">Product</th>
                                <th class="cart-caption heading_18"></th>
                                <th class="cart-caption text-center heading_18 d-none d-md-table-cell">Quantity</th>
                                <th class="cart-caption text-end heading_18">Price</th>
                                </tr>
                            </thead>
                
                            <tbody v-if="products.length > 0">
                                <tr class="cart-item" v-for="(product, index) in this.products" :key="index">
                                    <td class="cart-item-media">
                                        <div class="mini-img-wrapper">
                                            <img class="mini-img" :src="product.img" alt="img">
                                        </div>                                    
                                    </td>
                                    <td class="cart-item-details">
                                        <h2 class="product-title"><a>{{ product.name }}</a></h2>                                  
                                    </td>
                                    <td class="cart-item-quantity">
                                        <div class="quantity d-flex align-items-center justify-content-between">
                                            <button class="qty-btn dec-qty" @click="decrease(product)">-</button>
                                            <input class="qty-input" type="number" name="qty1" v-model="product.quantity">
                                            <button class="qty-btn inc-qty" @click="increase(product)">+</button>
                                        </div>
                                        <a class="product-remove mt-2" @click="removeFromCart(product)">Remove</a>                           
                                    </td>
                                    <td class="cart-item-price text-end">
                                        <div class="product-price">{{ (product.quantity * product.price).toFixed(2) }} RSD</div>                           
                                    </td>                        
                                </tr>
                            </tbody>
                            <tbody v-else>
                                <tr class="cart-item">
                                    <td class="cart-item-details" colspan="4" style="text-align: center">
                                        <h2 class="product-title">No products in your cart</h2>                                  
                                    </td>                 
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-5 col-md-12 col-12" v-if="products.length > 0">
                        <div class="cart-total-area">
                            <h3 class="cart-total-title d-none d-lg-block mb-0">Cart Totals</h3>
                            <div class="cart-total-box mt-4">
                                <div class="subtotal-item discount-box">
                                    <h4 class="subtotal-title">Total quantity:</h4>
                                    <p class="subtotal-value">{{ total_quantity }} {{ total_quantity != 1 ? 'products' : 'product' }}</p>
                                </div>
                                <div class="subtotal-item discount-box">
                                    <h4 class="subtotal-title">Total price:</h4>
                                    <p class="subtotal-value">{{ total }} RSD</p>
                                </div>
                                <hr />
                                <div class="d-flex justify-content-center mt-4">
                                    <a :href="$router.resolve({name: 'checkout'}).href" class="position-relative btn-primary text-uppercase">Procced to checkout</a>
                                    <!-- <a href="checkout.html" class="position-relative btn-primary text-uppercase"> -->
                                        
                                    <!-- </a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    mounted() {
        this.calculateSubtotal();
    },
    data() {
        return {
            products: localStorage.getItem('cart') ? JSON.parse(localStorage.getItem('cart')) : [],
            total: 0,
            total_quantity: 0
        }
    },
    watch: {
        products: {
            handler: function(newProducts) {
                localStorage.setItem('cart', JSON.stringify(newProducts));
                setTimeout(() => {
                    this.calculateSubtotal();
                }, 100);
                
            },
            deep: true, 
        },
    },
    methods: {
        increase(product) {
            setTimeout(() => {
                product.quantity++;
                this.total_with_shipping = (parseFloat(this.total) + parseFloat(this.shipping)).toFixed(2);
            }, 100);
        },
        decrease(product) {
            if (product.quantity > 1) {
                setTimeout(() => {
                product.quantity--;
                this.total_with_shipping = (parseFloat(this.total) + parseFloat(this.shipping)).toFixed(2);
            }, 100); 
            } else {
                this.products = this.products.filter((p) => p.id !== product.id);
            }
        },

        calculateSubtotal() {
            if (this.products.length > 0) {
                const subtotal = this.products.reduce((total, product) => {
                    return total + product.quantity * product.price;
                }, 0);

                const qty = this.products.reduce((total, product) => {
                    return total + product.quantity;
                }, 0);

                this.total = subtotal.toFixed(2);
                this.total_quantity = qty;
            }
        },

        removeFromCart(product) {
            this.products = this.products.filter((p) => p.id !== product.id);
            localStorage.setItem("cart", JSON.stringify(this.products));
        }
    }
}
</script>