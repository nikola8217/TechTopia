<template>
    <div class="error-page mt-100">
        <div class="container">
            <div class="error-content text-center">
                <p class="error-subtitle">Page Not Found</p>
                <a :href="$router.resolve({name: 'home'}).href" class="btn-primary mt-4">BACK TO HOMEPAGE</a>
            </div>
        </div>
    </div>    
</template>