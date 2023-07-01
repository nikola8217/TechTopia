<template>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="drawer-cart">
        <div class="offcanvas-header border-btm-black">
            <h5 class="cart-drawer-heading text_16">Your Cart ({{ products.length }})</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                aria-label="Close"></button>
        </div>
        <div class="offcanvas-body p-0">
            <div v-if="products.length > 0" class="cart-content-area d-flex justify-content-between flex-column">
                <div class="minicart-loop custom-scrollbar">
                    <div class="minicart-item d-flex" v-for="(product, index) in this.products" :key="index">
                        <div class="mini-img-wrapper">
                            <img class="mini-img" :src="product.img" alt="img">
                        </div>
                        <div class="product-info">
                            <h2 class="product-title"><a>{{ product.name }}</a></h2>
                            <div class="misc d-flex align-items-end justify-content-between">
                                <div class="quantity d-flex align-items-center justify-content-between">
                                    <button class="qty-btn dec-qty" @click="decrease(product)">-</button>
                                    <input class="qty-input" type="number" name="qty" v-model="product.quantity" min="0">
                                    <button class="qty-btn inc-qty" @click="increase(product)">+</button>
                                </div>
                                <div class="product-remove-area d-flex flex-column align-items-end">
                                    <div class="product-price">{{ (product.quantity * product.price).toFixed(2) }} RSD</div>
                                    <a class="product-remove" @click="removeFromCart(product)">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="minicart-footer">
                    <div class="minicart-calc-area">
                        <div class="minicart-calc d-flex align-items-center justify-content-between">
                            <span class="cart-subtotal mb-0">Subtotal</span>
                            <span class="cart-subprice">{{ total }} RSD</span>
                        </div>
                        <p class="cart-taxes text-center my-4">Taxes and shipping will be calculated at checkout.
                        </p>
                    </div>
                    <div class="minicart-btn-area d-flex align-items-center justify-content-between">
                        <a href="cart.html" class="minicart-btn btn-secondary">View Cart</a>
                        <a href="checkout.html" class="minicart-btn btn-primary">Checkout</a>
                    </div>
                </div>
            </div>
            <div v-else class="cart-empty-area text-center py-5">
                <div class="cart-empty-icon pb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"
                        >
                        <circle cx="12" cy="12" r="10"></circle>
                        <path d="M16 16s-1.5-2-4-2-4 2-4 2"></path>
                        <line x1="9" y1="9" x2="9.01" y2="9"></line>
                        <line x1="15" y1="9" x2="15.01" y2="9"></line>
                    </svg>
                </div>
                <p class="cart-empty">You have no items in your cart</p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "CartDrawer",
    mounted() {
        this.calculateSubtotal();
    },
    data() {
        return {
            products: localStorage.getItem('cart') ? JSON.parse(localStorage.getItem('cart')) : [],
            total: 0,
        }
    },
    watch: {
        products: {
            handler: function(newProducts) {
                localStorage.setItem('cart', JSON.stringify(newProducts));
            },
            deep: true, 
        },
    },
    methods: {
        increase(product) {
            product.quantity++; 
            this.calculateSubtotal();
        },
        decrease(product) {
            if (product.quantity > 1) {
                product.quantity--; 
            } else {
                this.products = this.products.filter((p) => p.id !== product.id);
                localStorage.setItem("cart", JSON.stringify(this.products));
            }
            this.calculateSubtotal();
        },

        calculateSubtotal() {
            if (this.products.length > 0) {
                const subtotal = this.products.reduce((total, product) => {
                    return total + product.quantity * product.price;
                }, 0);

                this.total = subtotal.toFixed(2);
            }
        },

        removeFromCart(product) {
            this.products = this.products.filter((p) => p.id !== product.id);
            localStorage.setItem("cart", JSON.stringify(this.products));
        }
    }
}
</script>