<template>
    <div class="login-page mt-100">
        <div class="container">
            <form action="#" class="login-form common-form mx-auto">
                <div class="section-header mb-3">
                    <h2 class="section-heading text-center">Login</h2>
                </div>
                <div class="row">
                    <div class="col-12">
                        <fieldset>
                            <label class="label">Email address</label>
                            <input type="email" />
                        </fieldset>
                    </div>
                    <div class="col-12">
                        <fieldset>
                            <label class="label">Password</label>
                            <input type="password" />
                        </fieldset>
                    </div>
                    <div class="col-12 mt-3">
                        <a href="#" class="text_14 d-block">Forgot your password?</a>
                        <button type="submit" class="btn-primary d-block mt-4 btn-signin">SIGN IN</button>
                        <router-link to="/register" class="btn-secondary mt-2 btn-signin">CREATE AN ACCOUNT</router-link>
                    </div>
                </div>
            </form>
        </div>
    </div>  
</template>

<script>
export default {
    name: 'LoginForm'
}
</script>