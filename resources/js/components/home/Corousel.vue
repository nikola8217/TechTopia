<template>
    <div>
        <!-- slideshow start -->
            <div class="slideshow-section position-relative" >
                <div class="slideshow-active activate-slider" data-slick='{
                    "slidesToShow": 1, 
                    "slidesToScroll": 1, 
                    "dots": true,
                    "arrows": true,
                    "responsive": [
                        {
                        "breakpoint": 768,
                        "settings": {
                            "arrows": false
                        }
                        }
                    ]
                }'>
                    <div class="slide-item slide-item-bag position-relative">
                        <img class="slide-img d-none d-md-block" src="images/slide6.avif" style="width: 100%; height: 900px;" alt="slide-1">
                        <img class="slide-img d-md-none" src="images/slide6.avif" style="width: 100%; height: auto;" alt="slide-1">
                        <div class="content-absolute content-slide">
                            <div class="container height-inherit d-flex align-items-center">
                                <div class="content-box slide-content py-4">
                                    <h3 class="slide-heading heading_72 animate__animated animate__fadeInUp"
                                        data-animation="animate__animated animate__fadeInUp">
                                        Tech Vision
                                    </h3>
                                    <p class="slide-subheading heading_18 animate__animated animate__fadeInUp"
                                        data-animation="animate__animated animate__fadeInUp">
                                        Experience innovation and endless possibilities.
                                    </p>
                                    <a class="btn-primary slide-btn animate__animated animate__fadeInUp"
                                        :href="$router.resolve({name: 'products'}).href"
                                        data-animation="animate__animated animate__fadeInUp">SHOP
                                        NOW</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slide-item slide-item-bag position-relative">
                        <img class="slide-img d-none d-md-block" src="images/slide16.webp" style="width: 100%; height: 900px;" alt="slide-2">
                        <img class="slide-img d-md-none" src="images/slide16.webp" style="width: 100%; height: auto;" alt="slide-2">
                        <div class="content-absolute content-slide">
                            <div class="container height-inherit d-flex align-items-center">
                                <div class="content-box slide-content py-4">
                                    <h3 class="slide-heading heading_72 animate__animated animate__fadeInUp"
                                        data-animation="animate__animated animate__fadeInUp">
                                        Explore Our Phones
                                    </h3>
                                    <p class="slide-subheading heading_18 animate__animated animate__fadeInUp"
                                        data-animation="animate__animated animate__fadeInUp">
                                        Sleek designs, powerful performance.
                                    </p>
                                    <a class="btn-primary slide-btn animate__animated animate__fadeInUp"
                                        :href="$router.resolve({name: 'products'}).href"
                                        data-animation="animate__animated animate__fadeInUp">SHOP
                                        NOW</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slide-item slide-item-bag position-relative">
                        <img class="slide-img d-none d-md-block" src="images/slide13.webp" style="width: 100%; height: 900px;" alt="slide-3">
                        <img class="slide-img d-md-none" src="images/slide13.webp" style="width: 100%; height: auto;" alt="slide-3">
                        <div class="content-absolute content-slide">
                            <div class="container height-inherit d-flex align-items-center">
                                <div class="content-box slide-content py-4">
                                    <h3 class="slide-heading heading_72 animate__animated animate__fadeInUp"
                                        data-animation="animate__animated animate__fadeInUp">
                                        Experience Gaming Magic
                                    </h3>
                                    <p class="slide-subheading heading_18 animate__animated animate__fadeInUp"
                                        data-animation="animate__animated animate__fadeInUp">
                                        Discover the world of excitement with PlayStation.
                                    </p>
                                    <a class="btn-primary slide-btn animate__animated animate__fadeInUp"
                                        :href="$router.resolve({name: 'products'}).href"
                                        data-animation="animate__animated animate__fadeInUp">SHOP
                                        NOW</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="activate-arrows"></div>
                <div class="activate-dots dot-tools"></div>
            </div>
            <!-- slideshow end -->
    </div>
</template>

<script>
export default {
    name: 'Corousel'
}
</script>