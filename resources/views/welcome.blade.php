<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>TechTopia</title>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <!-- fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
            rel="stylesheet">
        <!-- all css -->
        <style>
            :root {
                --primary-color: #00234D;
                --secondary-color: #F76B6A;

                --btn-primary-border-radius: 0.25rem;
                --btn-primary-color: #fff;
                --btn-primary-background-color: #00234D;
                --btn-primary-border-color: #00234D;
                --btn-primary-hover-color: #fff;
                --btn-primary-background-hover-color: #00234D;
                --btn-primary-border-hover-color: #00234D;
                --btn-primary-font-weight: 500;

                --btn-secondary-border-radius: 0.25rem;
                --btn-secondary-color: #00234D;
                --btn-secondary-background-color: transparent;
                --btn-secondary-border-color: #00234D;
                --btn-secondary-hover-color: #fff;
                --btn-secondary-background-hover-color: #00234D;
                --btn-secondary-border-hover-color: #00234D;
                --btn-secondary-font-weight: 500;

                --heading-color: #000;
                --heading-font-family: 'Poppins', sans-serif;
                --heading-font-weight: 700;

                --title-color: #000;
                --title-font-family: 'Poppins', sans-serif;
                --title-font-weight: 400;

                --body-color: #000;
                --body-background-color: #fff;
                --body-font-family: 'Poppins', sans-serif;
                --body-font-size: 14px;
                --body-font-weight: 400;

                --section-heading-color: #000;
                --section-heading-font-family: 'Poppins', sans-serif;
                --section-heading-font-size: 48px;
                --section-heading-font-weight: 600;

                --section-subheading-color: #000;
                --section-subheading-font-family: 'Poppins', sans-serif;
                --section-subheading-font-size: 16px;
                --section-subheading-font-weight: 400;
            }
        </style>
        @php
            $baseURL = url('/');
        @endphp

        <link rel="stylesheet" href="{{ $baseURL }}/asset/css/vendor.css">
        <link rel="stylesheet" href="{{ $baseURL }}/asset/css/style.css">

    </head>
    <body>
        <div class="body-wrapper">
           
            <div id="app">
                        
                <header-component></header-component>
                <div class="body-wrapper">
                    <router-view :key="$route.fullPath" style="min-height: 100vh"></router-view>
                </div>
                <footer-component></footer-component>
            </div>
                
        
       
        
        
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
        <script src="{{ mix('js/app.js') }}"></script>
        
        <script src="{{ $baseURL }}/asset/js/main.js"></script>
        <script src="{{ $baseURL }}/asset/js/vendor.js"></script>

        <script>
            $('#quickview-modal').on('shown.bs.modal', function (e) {
                $('.qv-large-slider').slick('setPosition');
                $('.qv-thumb-slider').slick('setPosition');
            });

            // common slider
            $('.common-slider').each(function () {
                var $this = $(this);
                var verticalSlide = $(this).attr('data-vertical-slider');

                if ($this.children().length > 1) {
                var selectorAppendDots = $this.parent().find('.activate-dots');
                var selectorAppendArrows = $this.parent().find('.activate-arrows');
                var selectorPrevArrow = `<span class="arrow-slider arrow-prev"><svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24" fill="none" stroke="#FEFEFE" stroke-width="0.5" stroke-linecap="round" stroke-linejoin="round" class="icon-arrow-left"><polyline points="15 18 9 12 15 6"></polyline></svg></span>`;
                var selectorNextArrow = `<span class="arrow-slider arrow-next"><svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24" fill="none" stroke="#FEFEFE" stroke-width="0.5" stroke-linecap="round" stroke-linejoin="round" class="icon-arrow-right"><polyline points="9 18 15 12 9 6"></polyline></svg></span>`;

                $($this).slick({
                    infinite: false,
                    speed: 500,
                    cssEase: 'ease',
                    swipeToSlide: true,        
                    vertical: verticalSlide ? true : false,
                    verticalSwiping: verticalSlide ? true : false,
                    appendDots: selectorAppendDots,
                    appendArrows: selectorAppendArrows,
                    prevArrow: selectorPrevArrow,
                    nextArrow: selectorNextArrow,
                    responsive: [
                        {
                            breakpoint: 768,
                            settings: {
                                vertical: false,
                                verticalSwiping: false,
                            }
                        }
                    ]
                });
                }
            });

            $('.activate-slider').each(function () {
                var $this = $(this);
                if ($this.children().length > 1) {
                var selectorAppendDots = $this.parent().find('.activate-dots');
                var selectorAppendArrows = $this.parent().find('.activate-arrows');
                var selectorPrevArrow = `<span class="arrow-slider arrow-prev"><svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24" fill="none" stroke="#000" stroke-width="0.5" stroke-linecap="round" stroke-linejoin="round" class="icon-arrow-left"><polyline points="15 18 9 12 15 6"></polyline></svg></span>`;
                var selectorNextArrow = `<span class="arrow-slider arrow-next"><svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24" fill="none" stroke="#000" stroke-width="0.5" stroke-linecap="round" stroke-linejoin="round" class="icon-arrow-right"><polyline points="9 18 15 12 9 6"></polyline></svg></span>`;

                function doAnimation() {
                    $this.find('.slick-slide').each(function () {
                    $(this).find('[data-animation]').each(function () {
                        var dataAnimation = $(this).attr('data-animation');
                        $(this).removeClass(dataAnimation);

                        if ($(this).closest('.slick-slide').is('.slick-current.slick-active')) {
                        $(this).addClass(dataAnimation);
                        }
                    })
                    })

                    return false;
                }

                $(this)
                    .on('init', function (event, slick) {
                    doAnimation();
                    })
                    .on('afterChange', function (event, slick, direction) {
                    doAnimation();
                    })
                    .slick({
                    appendDots: selectorAppendDots,
                    appendArrows: selectorAppendArrows,
                    prevArrow: selectorPrevArrow,
                    nextArrow: selectorNextArrow
                    });
                }
            })
        </script>
        
    </body>
    
</html>
