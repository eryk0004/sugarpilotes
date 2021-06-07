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

<head></head>

<template>
    <article>
        <div class="billedeindhold">
            <img src="" alt="" class="billede">
        </div>
        <div class="indhold">
            <h2 class="title"></h2>
            <p class="kort_beskrivelse"></p>
            <p class="lang_beskrivelse"></p>
            <img src="" alt="" class="ikoner">
            <p class="styk"></p>
            <p class="pris"></p>
            <div class="knapcenter">
                <button class="knap">View</button>
            </div>
        </div>
    </article>
</template>

<section id="primary" class="content-area">
    <main id="mainshop" class="site-main">
        <!--        <img src="shopbilleder/takeoff.png" alt="takeoff" class="ikoner">-->
        <h1 class="travelto">Travel to:</h1>
        <nav id="filtrering"></nav>
        <section id="liste">

        </section>
    </main><!-- #main -->

    <script>
        let slikkepind;

        const dbUrl = "https://piotrmunk.dk/kea/sugarpilotes/wp-json/wp/v2/slikkepind" + <?php echo get_the_ID() ?>;
        //        const catUrl = "https://piotrmunk.dk/kea/sugarpilotes/wp-json/wp/v2/categories";

        //
        async function getJson() {
            console.log("id er", <?php echo get_the_ID() ?>);
            //            const data = await fetch(dbUrl);
            //            const catdata = await fetch(catUrl);
            //            slikkepinde = await data.json();
            //            console.log("slikkepinde", slikkepinde);
            //            categories = await catdata.json();
            //            visSlikkepinde();
            //            opretknapper();
            const data = await fetch(dbUrl);
            slikkepind = await data.json();
            visSlikkepind();
        }

        function visSlikkepind() {
            document.querySelector(".billede").src = slikkepind.billede.guid;
            document.querySelector(".title").textContent = slikkepind.title.rendered;
            document.querySelector(".lang_beskrivelse").innerHTML = slikkepind.lang_beskrivelse;
            document.querySelector(".styk").innerHTML = slikkepind.styk;
            document.querySelector(".pris").innerHTML = slikkepind.pris;

        }


        //        function opretknapper() {
        //
        //            categories.forEach(cat => {
        //                document.querySelector("#filtrering").innerHTML += `<button class="filter" data-slikkepind="${cat.id}">${cat.name}</button>`;
        //            })
        //            addEventListenerToButtons();
        //        }
        //
        //        function addEventListenerToButtons() {
        //            document.querySelectorAll("#filtrering button").forEach(elm => {
        //                elm.addEventListener("click", filtrering);
        //            })
        //        };
        //
        //        function filtrering() {
        //            filterSlikkepind = this.dataset.slikkepind;
        //            console.log(filterSlikkepind);
        //
        //            visSlikkepinde();
        //        }

        //        function visSlikkepinde() {
        //            let temp = document.querySelector("template");
        //
        //            let container = document.querySelector("#liste");
        //            container.innerHTML = "";
        //            slikkepinde.forEach(slikkepind => {
        //                if (filterSlikkepind == "alle" || slikkepind.categories.includes(parseInt(filterSlikkepind))) {
        //
        //
        //                    let klon = temp.cloneNode(true).content;
        //                    klon.querySelector(".billede").src = slikkepind.billede.guid;
        //                    klon.querySelector(".title").innerHTML = slikkepind.title.rendered;
        //                    klon.querySelector(".lang_beskrivelse").innerHTML = slikkepind.lang_beskrivelse;
        //                    klon.querySelector(".styk").innerHTML = slikkepind.styk;
        //                    klon.querySelector(".pris").innerHTML = slikkepind.pris;
        //                    klon.querySelector("article").addEventListener("click", () => {
        //                        location.href = slikkepind.link;
        //                    })
        //                    container.appendChild(klon);
        //                }
        //            })
        //        }
        getJson();

    </script>
</section><!-- #primary -->


<?php get_footer();
