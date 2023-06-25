<template>
    <!-- <div> -->
        <div class="col-lg-3 col-md-12 col-12">
            <div class="collection-filter filter-drawer">
                <div class="filter-widget d-lg-none d-flex align-items-center justify-content-between">
                    <h5 class="heading_24">Filter By</h5>
                    <button type="button" class="btn-close text-reset filter-drawer-trigger d-lg-none"></button>
                </div>

                <div class="filter-widget d-lg-none">
                    <div class="filter-header faq-heading heading_18 d-flex align-items-center justify-content-between border-bottom"
                        data-bs-toggle="collapse" data-bs-target="#filter-mobile-sort">
                        <span>
                            <span class="sorting-title me-2">Sort by:</span>
                            <span class="active-sorting">Featured</span>
                        </span>
                        <span class="faq-heading-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="#000" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="icon icon-down">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                        </span>
                    </div>
                    <div id="filter-mobile-sort" class="accordion-collapse collapse show">
                        <ul class="sorting-lists-mobile list-unstyled m-0">
                            <li><a href="#" class="text_14">Featured</a></li>
                            <li><a href="#" class="text_14">Best Selling</a></li>
                            <li><a href="#" class="text_14">Alphabetically, A-Z</a></li>
                            <li><a href="#" class="text_14">Alphabetically, Z-A</a></li>
                            <li><a href="#" class="text_14">Price, low to high</a></li>
                            <li><a href="#" class="text_14">Price, high to low</a></li>
                            <li><a href="#" class="text_14">Date, old to new</a></li>
                            <li><a href="#" class="text_14">Date, new to old</a></li>
                        </ul>
                    </div>
                </div>
                <div class="filter-widget">
                    <div class="filter-header faq-heading heading_18 d-flex align-items-center justify-content-between border-bottom"
                        data-bs-toggle="collapse" data-bs-target="#filter-collection">
                        Categories
                        <span class="faq-heading-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="#000" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="icon icon-down">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                        </span>
                    </div>
                    <div id="filter-collection" class="accordion-collapse collapse show">
                        <ul class="filter-lists list-unstyled mb-0">
                            <li class="filter-item" v-for="(category, index) in this.categories" :key="index">
                                <label class="filter-label">
                                    <input type="checkbox" :value="category.id" />
                                    <span class="filter-checkbox rounded me-2"></span>
                                    <span class="filter-text">{{ category.name }}</span>
                                </label>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="filter-widget">
                    <div class="filter-header faq-heading heading_18 d-flex align-items-center justify-content-between border-bottom"
                        data-bs-toggle="collapse" data-bs-target="#filter-price">
                        Price
                        <span class="faq-heading-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="#000" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="icon icon-down">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                        </span>
                    </div>
                    <div id="filter-price" class="accordion-collapse collapse show">
                        <div class="filter-price d-flex align-items-center justify-content-between">
                            <div class="filter-field">
                                <input class="field-input" type="number" placeholder="$0" min="0"
                                    max="2000.00">
                            </div>
                            <div class="filter-separator px-3">To</div>
                            <div class="filter-field">
                                <input class="field-input" type="number" min="0" placeholder="$595.00"
                                    max="2000.00">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="filter-widget">
                    <div class="filter-header faq-heading heading_18 d-flex align-items-center justify-content-between border-bottom"
                        data-bs-toggle="collapse" data-bs-target="#filter-brands">
                        Brands
                        <span class="faq-heading-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="#000" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="icon icon-down">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                        </span>
                    </div>
                    <div id="filter-brands" class="accordion-collapse collapse show">
                        <ul class="filter-lists list-unstyled mb-0">
                            <li class="filter-item" v-for="(brand, index) in this.brands" :key="index">
                                <label class="filter-label">
                                    <input type="checkbox" :value="brand.id" />
                                    <span class="filter-checkbox rounded me-2"></span>
                                    <span class="filter-text">{{ brand.name }}</span>
                                </label>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    <!-- </div> -->
</template>

<script>
export default {
    name: 'CategorySidebar',
    props: ['categories', 'brands']
}
</script>