<template>
       <div class="col-lg-9 col-md-12 col-12">
            <div class="filter-sort-wrapper d-flex justify-content-between flex-wrap">
                <div class="collection-title-wrap d-flex align-items-end">
                    <h2 class="collection-title heading_24 mb-0">All products</h2>
                    <p class="collection-counter text_16 mb-0 ms-2">({{ product_count }} {{ product_count === 1 ? 'item' : 'items' }})</p>
                </div>
                <div class="filter-sorting">
                    <div class="collection-sorting position-relative d-none d-lg-block">
                        <div
                            class="sorting-header text_16 d-flex align-items-center justify-content-end">
                            <span class="sorting-title me-2">Sort by:</span>
                            <span class="active-sorting">Featured</span>
                            <span class="sorting-icon">
                                <svg class="icon icon-down feather feather-chevron-down" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <polyline points="6 9 12 15 18 9"></polyline>
                                </svg>
                            </span>
                        </div>
                        <ul class="sorting-lists list-unstyled m-0">
                            <li><a href="#" class="text_14">Featured</a></li>
                            <li><a href="#" class="text_14">Alphabetically, A-Z</a></li>
                            <li><a href="#" class="text_14">Alphabetically, Z-A</a></li>
                            <li><a href="#" class="text_14">Price, low to high</a></li>
                            <li><a href="#" class="text_14">Price, high to low</a></li>
                            <li><a href="#" class="text_14">Date, old to new</a></li>
                            <li><a href="#" class="text_14">Date, new to old</a></li>
                        </ul>
                    </div>
                    <div class="filter-drawer-trigger mobile-filter d-flex align-items-center d-lg-none">
                        <span class="mobile-filter-icon me-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="icon icon-filter">
                                <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon>
                            </svg>
                        </span>
                        <span class="mobile-filter-heading">Filter and Sorting</span>
                    </div>
                </div>
            </div>
            <div class="collection-product-container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-6" data-aos="fade-up" data-aos-duration="700" v-for="(product, index) in this.products" :key="index">
                        <div class="product-card">
                            <div class="product-card-img">
                                <a class="hover-switch" >
                                    <img class="secondary-img" :src="product.second_img"
                                        alt="product-img">
                                    <img class="primary-img" :src="product.first_img"
                                        alt="product-img">
                                </a>

                                <div class="product-badge">
                                    <span v-if="product.discount > 0" class="badge-label badge-percentage rounded">-{{ product.discount }}%</span>
                                </div>

                            </div>
                            <div class="product-card-details">
                                <h3 class="product-card-title">
                                    <a :href="$router.resolve({name: `productDetails`, params: { id: product.id } }).href">{{ product.name }}</a>
                                </h3>
                                <div v-if="product.discount > 0" class="product-card-price">
                                    <span class="card-price-regular">{{ product.price_with_discount }} RSD</span>
                                    <span
                                        class="card-price-compare text-decoration-line-through">{{ product.price }} RSD</span>
                                </div>
                                <div v-else class="product-card-price">
                                    <span class="card-price-regular">{{ product.price }} RSD</span>
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
    name: 'ProductList',
    props: ['products']

}
</script>