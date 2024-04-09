<template>
    <div>
        <div id="container">
            <div id="header">
                <div id="logo">
                    <img src="../../../../public/external/logo.png" alt="">
                </div>
            </div>
            <div id="main">
                <div id="banner"></div>
                <div id="info">
                    <div class="big_title">Email Confirmation</div>
                    <p>Hey Sara! you're almost ready to start using GRASS. Simple click the button below to verify your
                        email address.</p>
                </div>
                <div id="verify">
                    <a href="#">Resend Confirmation Email</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>

</script>

<style scoped>
#container {
    margin: auto;
    width: 50%;
}

#header {
    padding: 10px 0;
}

#logo {
    width: 100%;
    display: flex;
    justify-content: center;
}

#logo img {
    width: 180px;
}

#main {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    -webkit-box-pack: justify;
    -ms-flex-pack: justify;
    justify-content: space-between;
    margin: auto;
    background: var(--foreground);
    width: 100%;
    height: 85vh;
    border-radius: 5px;
    overflow: auto;
    -webkit-box-shadow: 0 5px 5px rgba(0, 0, 0, 0.1);
    box-shadow: 0 5px 5px rgba(0, 0, 0, 0.1);
}

#banner {
    background: var(--primary) url(https://as1.ftcdn.net/jpg/01/32/16/98/500_F_132169801_mmYyhUtc0HU3LbYNOc7xwnfv9zaXCdvp.jpg);
    background-position: center;
    background-repeat: no-repeat;
    -webkit-box-flex: 3;
    -ms-flex: 3;
    flex: 3;
}

#info {
    padding: 10px;
    color: gray;
    text-align: center;
    -webkit-box-flex: 2;
    -ms-flex: 2;
    flex: 2;
}

#info p {
    font-size: 16px;
    line-height: 1.5;
}

.big_title {
    color: var(--primary);
    font-size: 30px;
    margin: 10px 0;
}

#verify {
    -webkit-box-flex: 1;
    -ms-flex: 1;
    flex: 1;
    text-align: center;
}

#verify a {
    text-decoration: none;
    font-size: 18px;
    color: var(--primary);
    letter-spacing: 1px;
    padding: 20px;
    border: 2px solid var(--primary);
    border-radius: 10px;
}

#verify a:hover {
    background: var(--primary);
    color: white;
    border: 2px solid var(--primary);
}

@media screen and (max-width: 1000px) {
    #container {
        width: 60%;
    }
}

@media screen and (max-width: 650px) {
    #container {
        width: 90%;
    }
}

@media screen and (max-width: 420px) {
    #info {
        text-align: left;
    }

    #verify {
        text-align: left;
        margin: 10px;
    }

    #verify a {
        padding: 15px;
    }
}

#container {
    margin: auto;
    width: 50%;
}

#header {
    padding: 10px 0;
}

#logo {
    color: var(--primary);
    font-size: 30px;
}

#main {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    margin: auto;
    background: var(--foreground);
    width: 100%;
    height: 85vh;
    border-radius: 5px;
    overflow: auto;
    box-shadow: 0 5px 5px rgba(0, 0, 0, 0.1);
}

#banner {
    background: var(--primary) url(https://as1.ftcdn.net/jpg/01/32/16/98/500_F_132169801_mmYyhUtc0HU3LbYNOc7xwnfv9zaXCdvp.jpg);
    background-position: center;
    background-repeat: no-repeat;
    flex: 3;
}

#info {
    padding: 10px;
    color: gray;
    text-align: center;
    flex: 2;
}

#info p {
    font-size: 16px;
    line-height: 1.5;
}

.big_title {
    color: var(--primary);
    font-size: 30px;
    margin: 10px 0;
}

#verify {
    flex: 1;
    text-align: center;
}

#verify a {
    text-decoration: none;
    font-size: 18px;
    color: var(--primary);
    letter-spacing: 1px;
    padding: 20px;
    border: 2px solid var(--primary);
    border-radius: 10px;
}

#verify a:hover {
    background: var(--primary);
    color: white;
    border: 2px solid var(--primary);
}

@media screen and (max-width: 1000px) {
    #container {
        width: 60%;
    }
}

@media screen and (max-width: 650px) {
    #container {
        width: 90%;
    }
}

@media screen and (max-width: 420px) {
    #info {
        text-align: left;
    }

    #verify {
        text-align: left;
        margin: 10px;
    }

    #verify a {
        padding: 15px;
    }
}
</style>
