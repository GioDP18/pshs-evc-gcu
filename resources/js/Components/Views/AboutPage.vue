<template>
    <div class="we-are-block">

        <div id="about-us-section">

            <div class="about-us-image">

                <img src="../../../../public/external/Background.png" width="808" height="458" alt="Lobby Image">

            </div>

            <div class="about-us-info">

                <h2>Guidance Counseling Unit</h2>

                <a href="#staff-section" title="Staff Button">STAFF</a>

            </div>

        </div>

        <div id="history-section">

            <div class="history-image">

                <img src="../../../../public/external/Background-down.png" width="951" height="471" alt="Building Pic">

            </div>

            <div class="history-info">

                <p>The Guidance Counseling Unit is dedicated to fostering a supportive and confidential environment for
                    all individuals seeking guidance. Our team of professional counselors is committed to helping you
                    navigate life’s challenges, offering personalized advice, and empowering you to achieve personal
                    growth and well-being. Whether you’re dealing with academic stress, career decisions, or personal
                    issues, we’re here to listen and guide you towards a path of resilience and fulfillment.</p>

                <RouterLink to="/" title="Back Button">GO BACK</RouterLink>

            </div>

        </div>

        <div id="staff-section">

            <div class="staff-info">
                <h2>STAFF</h2>

                <div class="image-container">
                    <div class="image-1">
                        <img src="../../../../public/external/alona.png" alt="">
                        <p class="name">ALONA P. PELEÑO</p>
                        <p class="position">Guidance Associate I</p>
                    </div>
                    <div class="image-1">
                        <img src="../../../../public/external/reena.jpg" alt="">
                        <p class="name">REENA ROSE P. ABONALES-BERCERO</p>
                        <p class="position">Guidance Associate I</p>
                    </div>
                </div>
            </div>

        </div>

    </div>
</template>

<script>
export default {

}
</script>

<style scoped>
* {
    box-sizing: border-box;
}

body,
html {
    overflow-x: hidden;
}

body {
    margin: 0;
    width: 100%;
    font-family: "Oswald", sans-serif;
    font-size: 12pt;
    font-weight: 400;
}

h1,
h2,
h3,
h4,
h5,
h6 {
    font-family: "Bebas Neue", cursive;
}

a {
    font-weight: 600;
    text-decoration: none;
    transition: all 0.5s ease-in-out;
}

a:hover {
    transition: all 0.5s ease-in-out;
}

.we-are-block {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    flex-wrap: nowrap;
    width: 100%;
    height: 200vh;
}

@media screen and (max-width: 860px) {
    .we-are-block {
        height: 2200px;
    }
}

@media screen and (max-width: 500px) {
    .we-are-block {
        height: 2300px;
    }
}

#about-us-section {
    background: #2087E4;
    width: 100%;
    height: 50%;
    display: flex;
    flex-direction: row;
    flex-wrap: nowrap;
    align-items: center;
    justify-content: center;
    position: relative;
    padding-bottom: 10px;
}

@media screen and (max-width: 860px) {
    #about-us-section {
        flex-direction: column;
        justify-content: space-between;
    }
}

.about-us-image {
    position: absolute;
    top: 0;
    right: 0;
    height: 100%;
    overflow: hidden;
}

@media screen and (max-width: 860px) {
    .about-us-image {
        position: relative;
        width: 100%;
        height: 45%;
    }
}

@media screen and (max-width: 747px) {
    .about-us-image {
        height: 35%;
    }
}

@media screen and (max-width: 644px) {
    .about-us-image img {
        position: absolute;
        left: -220px;
    }
}

.about-us-info {
    display: flex;
    flex-direction: column;
    align-items: flex-end;
    justify-content: space-evenly;
    width: 40%;
    height: 80%;
    margin-right: 850px;
    margin-left: 12px;
    z-index: 2;
}

@media screen and (max-width: 1353px) {
    .about-us-info {
        margin-right: 400px;
        width: 60%;
        background: #2087E4;
        padding: 0px 25px 0px 0px;
    }
}

@media screen and (max-width: 1238px) {
    .about-us-info {
        margin-right: 340px;
        width: 100%;
    }
}

@media screen and (max-width: 1111px) {
    .about-us-info {
        margin-right: 270px;
    }
}

@media screen and (max-width: 910px) {
    .about-us-info {
        margin-right: 150px;
    }
}

@media screen and (max-width: 860px) {
    .about-us-info {
        margin: 0px 0px 0px 0px !important;
        padding: 0px 20px 0px 20px !important;
        width: 100%;
        height: 55%;
        align-items: center;
    }
}

@media screen and (max-width: 747px) {
    .about-us-info {
        height: 65%;
    }
}

.about-us-info h2 {
    color: white;
    font-size: 55pt;
    text-align: right;
    font-family: Montserrat, sans-serif;
}

@media screen and (max-width: 860px) {
    .about-us-info h2 {
        text-align: center;
    }
}

.about-us-info p {
    color: white;
    font-size: 13.3pt;
    text-align: right;
}

@media screen and (max-width: 860px) {
    .about-us-info p {
        text-align: center;
    }
}

.about-us-info a {
    border-radius: 10px;
    background-color: white;
    color: #2087E4;
    width: 180px;
    text-align: center;
    padding: 15px 0px 15px 0px;
    font-size: 14pt;
    box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;
}

.about-us-info a:hover {
    background: #FE7575;
    color: white;
    box-shadow: #FFDDDD 0px 22px 70px 4px;
    transform: translateY(10px);
}

#history-section {
    width: 100%;
    height: 50%;
    display: flex;
    flex-direction: row;
    flex-wrap: nowrap;
    align-items: center;
    justify-content: center;
    position: relative;
}

@media screen and (max-width: 860px) {
    #history-section {
        flex-direction: column;
        justify-content: space-between;
    }
}

.history-image {
    position: absolute;
    top: 0;
    left: 0;
    max-width: 820px;
    height: 100%;
    overflow: hidden;
}

@media screen and (max-width: 860px) {
    .history-image {
        position: relative;
        width: 100%;
        height: 40%;
    }
}

@media screen and (max-width: 747px) {
    .history-image {
        height: 35%;
    }
}

@media screen and (max-width: 644px) {
    .history-image img {
        position: absolute;
        right: -220px;
    }
}

.history-info {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    justify-content: space-evenly;
    width: 40%;
    height: 80%;
    margin-left: 850px;
    margin-right: 12px;
    z-index: 2;
}

@media screen and (max-width: 1353px) {
    .history-info {
        margin-left: 400px;
        width: 60%;
        background: #ffffff99;
        padding: 0px 0px 0px 25px;
    }
}

@media screen and (max-width: 1238px) {
    .history-info {
        margin-left: 340px;
        width: 100%;
    }
}

@media screen and (max-width: 1111px) {
    .history-info {
        margin-left: 270px;
    }
}

@media screen and (max-width: 910px) {
    .history-info {
        margin-left: 150px;
    }
}

@media screen and (max-width: 860px) {
    .history-info {
        margin: 0px 0px 0px 0px !important;
        padding: 0px 40px 0px 40px !important;
        width: 100%;
        height: 60%;
        align-items: center;
    }
}

@media screen and (max-width: 747px) {
    .history-info {
        height: 65%;
    }
}

.history-info h2 {
    color: #2087E4;
    font-size: 40pt;
    text-align: left;
    font-family: Montserrat, sans-serif;
}

@media screen and (max-width: 860px) {
    .history-info h2 {
        text-align: center;
    }
}

.history-info p {
    color: #2087E4;
    font-size: 14pt;
    text-align: left;
}

@media screen and (max-width: 860px) {
    .history-info p {
        text-align: center;
    }
}

.history-info a {
    border-radius: 10px;
    background-color: #2087E4;
    color: white;
    width: 180px;
    text-align: center;
    padding: 15px 0px 15px 0px;
    font-size: 14pt;
    box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;
}

.history-info a:hover {
    background: #FE7575;
    color: white;
    box-shadow: #FFDDDD 0px 22px 70px 4px;
    transform: translateY(10px);
}

#staff-section {
    background: #2087E4;
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    padding-top: 90px;
}

.staff-info h2 {
    color: #ffffff;
    font-size: 40pt;
    font-family: Montserrat, sans-serif;
    width: 100%;
    text-align: center;
    margin-bottom: 70px;
}

.staff-info .image-container {
    width: 100%;
    height: 70%;
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 180px;
}

.image-container .image-1 {
    width: 340px;
    width: 340px;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    background-color: white;
    border-radius: 10px;
    box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;
}

.image-container img {
    width: 100%;
    border-top-right-radius: 10px;
    border-top-left-radius: 10px;
}

.image-1 .name {
    padding-top: 20px;
    color: #2087E4;
    font-family: Montserrat, sans-serif;
    text-align: center;
    font-size: 15px;
}

.image-1 .position {
    font-weight: 500;
}

@media screen and (max-width:360px) {
    .about-us-info {
        height: 100%;
    }

    .about-us-info h2 {
        font-size: 40pt;
        padding-top: 20px;
        padding-bottom: 20px;
    }

    .staff-info .image-container {
        flex-direction: column;
    }

    .staff-info h2 {
        margin-bottom: 120px;
        font-size: 40pt;
    }

    .history-info {
        padding: 10px 30px 180px 30px !important;
    }

    .history-info p {
        font-size: 20px;
    }

    #staff-section {
        margin-top: 90px;
        padding-top: 30px;
    }

    .staff-info .image-container {
        gap: 60px;
    }
}
</style>
