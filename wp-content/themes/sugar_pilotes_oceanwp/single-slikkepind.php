<?php
/**
 * The template for displaying front page
 */

get_header();
?>

<head>
</head>
<div id="primary" class="single-area">

    <main id="main" class="single_view">

        <article id="singleviewslikkepind">
            <div class="billedeindhold">
                <img src="" alt="" class="billede">
            </div>
            <div class="indholdsingle">
                <h2 class="title"></h2>
                <p class="lang_beskrivelse"></p>
                <img src="" alt="ikoner" class="ikoner">
                <p class="styk"></p>
                <p class="pris"></p>
                <div class="knapcenter">
                    <button class="knap">ADD TO BASKET</button>
                    <button class="tilbageknap">BACK</button>
                </div>
            </div>
        </article>



        <section id="liste">

            <!--
                <article id="hojre">
                    <div>
                        <p class="dato"></p>
                        <h2></h2>
                        <p class="kort_tekst"></p>
                        <button class="epsiode_knap" href="">Lyt her</button>
                    </div>
                </article>
-->

        </section>
    </main><!-- #main -->

    <script>
        /* Her opstilles variabler*/
        let slikkepind;

        /* denne variabel er nødvendig for at kunne opstille et single-view for den aktuelle podcast og dens tilhørende episoder*/
        /*den henter sloggens id (som er et tal) ved hjælp af php*/

        let aktuelslikkepind = <?php echo get_the_ID() ?>;


        /*Her laver vi vores eget endpoint, hvor der peges på en podcast + dens tal*/
        const dbUrl = "https://piotrmunk.dk/kea/sugarpilotes/wp-json/wp/v2/slikkepind/" + aktuelslikkepind;


        async function getJson() {
            /*Her fetcher vi den aktuelle podcast */
            const data = await fetch(dbUrl);
            slikkepind = await data.json();

            /*Her kaldes funktionerne */
            visSlikkepind();
        }

        /*Her udskrives informationerne til den aktuelle podcast i article */
        function visSlikkepind() {
            document.querySelector(".billede").src = slikkepind.billede.guid;
            document.querySelector(".title").innerHTML = slikkepind.title.rendered;
            document.querySelector(".lang_beskrivelse").innerHTML = slikkepind.lang_beskrivelse;
            document.querySelector(".styk").textContent = slikkepind.styk;
            document.querySelector(".pris").textContent = slikkepind.pris;
            document.querySelector(".ikoner").src = slikkepind.ikoner.guid;
            document.querySelector(".tilbageknap").addEventListener("click", tilbageTilSlikkepind);

        }

        function tilbageTilSlikkepind() {
            console.log("hej", tilbageTilSlikkepind);
            history.back();
        }

        getJson();

    </script>
</div><!-- #primary -->

<?php
get_footer();
