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
                    <router-view :key="$route.fullPath"></router-view>
                </div>
                <footer-component></footer-component>
            </div>
                
        
       
        
        
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
        <script src="{{ mix('js/app.js') }}"></script>
        
        <script src="{{ $baseURL }}/asset/js/main.js"></script>
        <script src="{{ $baseURL }}/asset/js/vendor.js"></script>
        
    </body>
    
</html>
