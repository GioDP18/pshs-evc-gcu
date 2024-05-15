<template>
    <div class="main-container">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-4 col-md-offset-4">
                    <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">
                        <h3><i class="fa fa-lock fa-3x mb-3"></i></h3>
                        <h2 class="text-center">Forgot Password?</h2>
                        <p>You can reset your password here.</p>
                        <div class="panel-body">
                            <form id="register-form" role="form" autocomplete="off" class="form" method="post">
                                <div class="form-group">
                                    <div class="input-group mb-4 mt-4">
                                        <span class="input-group-addon"><i class="fa-solid fa-envelope"></i></span>
                                        <input id="email" name="email" placeholder="Email address" class="form-control"  type="email">
                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary btn-lg btn-block">Reset Password</button>
                            </form>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>

</script>

<style scoped>
.main-container {
    background: #2087E4;
    width: 100%;
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
}

.input-group-addon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 35px;
    background: #eeeeee;
    border-top-left-radius: 5px;
    border-bottom-left-radius: 5px;
}

.panel {
    background: white;
    width: 100%;
    padding: 40px;
    border-radius: 8px;
}
</style>