<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package OceanWP WordPress theme
 */

get_header(); ?>

<template>
    <article id="loopviewslikkepind">
        <div class="billedeindhold">
            <img src="" alt="" class="billede">
        </div>
        <div class="indhold">
            <h2 class="title"></h2>
            <p class="kort_beskrivelse"></p>
            <!--
            <p class="lang_beskrivelse"></p>
            <img src="" alt="" class="ikoner">
-->
            <p class="styk"></p>
            <p class="pris"></p>
            <div class="knapcenter">
                <button class="knap">VIEW</button>
            </div>
        </div>
    </article>
</template>

<section id="primary" class="content-area">
    <main id="mainshop" class="site-main">
        <svg id="svgtakeoff" xmlns="http://www.w3.org/2000/svg" width="150" height="150" viewBox="0 0 500 500">
            <path id="takeoff" d="M18.112,446.2H486.555V503.57H18.112Zm482.5-268.5c-5.177-22.949-25.641-36.718-45.365-30.407L324.326,188.022,154.207,3.57,106.623,18.2,208.694,223.88,86.16,262.032,37.59,217.856,1.84,229.043l44.872,90.648L65.7,357.844l39.448-12.335,130.917-40.734L343.31,271.5l130.917-40.734c19.97-6.6,31.558-30.12,26.381-53.069Z" transform="translate(-1.84 -3.57)" fill="#95d3ff" />
        </svg>
        <h1 class="travelto">Travel to:</h1>
        <nav id="filtrering"></nav>
        <section id="liste">

        </section>
    </main><!-- #main -->

    <script>
        "use strict"
        console.log("hejbassemand");
        let slikkepinde;
        let categories;
        let filterSlikkepind = "alle";

        const dbUrl = "https://piotrmunk.dk/kea/sugarpilotes/wp-json/wp/v2/slikkepind?per_page=100";
        const catUrl = "https://piotrmunk.dk/kea/sugarpilotes/wp-json/wp/v2/categories";

        //
        async function getJson() {
            const data = await fetch(dbUrl);
            const catdata = await fetch(catUrl);
            slikkepinde = await data.json();
            console.log("slikkepinde", slikkepinde);
            categories = await catdata.json();
            visSlikkepinde();
            opretknapper();
        }

        function opretknapper() {

            categories.forEach(cat => {
                document.querySelector("#filtrering").innerHTML += `<button class="filter" data-slikkepind="${cat.id}">${cat.name}</button>`;
            })
            addEventListenerToButtons();
        }

        function addEventListenerToButtons() {
            document.querySelectorAll("#filtrering button").forEach(elm => {
                elm.addEventListener("click", filtrering);
            })
        };

        function filtrering() {
            filterSlikkepind = this.dataset.slikkepind;
            console.log(filterSlikkepind);

            visSlikkepinde();
        }

        function visSlikkepinde() {
            let temp = document.querySelector("template");

            let container = document.querySelector("#liste");
            container.innerHTML = "";
            slikkepinde.forEach(slikkepind => {
                if (filterSlikkepind == "alle" || slikkepind.categories.includes(parseInt(filterSlikkepind))) {


                    let klon = temp.cloneNode(true).content;
                    klon.querySelector(".billede").src = slikkepind.billede.guid;
                    klon.querySelector(".title").innerHTML = slikkepind.title.rendered;
                    klon.querySelector(".kort_beskrivelse").innerHTML = slikkepind.kort_beskrivelse;
                    klon.querySelector(".styk").innerHTML = slikkepind.styk;
                    klon.querySelector(".pris").innerHTML = slikkepind.pris;
                    klon.querySelector("article").addEventListener("click", () => {
                        location.href = slikkepind.link;
                    })
                    container.appendChild(klon);
                }
            })
        }
        getJson();

    </script>
</section><!-- #primary -->


<?php get_footer();
