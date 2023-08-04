<template>
     <div class="banner-section mt-100 overflow-hidden">
        <div class="banner-section-inner">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-6 col-12" data-aos="fade-right" data-aos-duration="1200">
                        <a class="banner-item position-relative rounded" :href="$router.resolve({name: 'products'}).href">
                            <img class="banner-img" src="images/promotion1.avif" alt="banner-1" style="width: 100%; height: 307px">
                            <div class="content-absolute content-slide">
                                <div class="container height-inherit d-flex align-items-center">
                                    <div class="content-box banner-content p-4">
                                        <p class="heading_18 mb-3 text-white">Apple</p>
                                        <h2 class="heading_34 text-white">15% off for <br>Apple products</h2>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12" data-aos="fade-left" data-aos-duration="1200">
                        <a class="banner-item position-relative rounded" :href="$router.resolve({name: 'products'}).href">
                            <img class="banner-img" src="images/promotion3.avif" alt="banner-2" style="width: 100% height: 100px">
                            <div class="content-absolute content-slide">
                                <div class="container height-inherit d-flex align-items-center">
                                    <div class="content-box banner-content p-4">
                                        <p class="heading_18 mb-3 text-white">Playstation</p>
                                        <h2 class="heading_34 text-white">25% off for <br>Playstation products</h2>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Promotions',
}
</script>