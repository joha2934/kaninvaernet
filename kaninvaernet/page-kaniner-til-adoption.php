<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>



<div id="primary" class="content-area">
	<?php astra_primary_content_top(); ?>
<div id="cover" class="wp-block-cover alignfull is-light">
	<span aria-hidden="true" class="has-ast-global-color-2-background-color wp-block-cover__gradient-background has-background-dim"></span>
	<img class="wp-block-cover__image-background" src="https://jsk-grafik.dk/kea/kaninvaernet.dk/wp-content/uploads/2022/05/adoption.jpg" alt="">
	<div class="wp-block-cover__inner-container">
		<h1 class="has-text-align-center">
			Kaniner til Adoption
		</h1>
	</div>
		</div>
    <main id="main" class="site-main kanin-adoption">

        <div id="main_container">
			<div id="splash_section">
				<h2>
					Kaniner der søger nyt hjem
				</h2>
			</div>
			 <section id="second_section">
               <div class="container dropdown">
				
                <nav id="filtrering">
                 <button data-kanin="alle" class="valgt filter">Alle</button>
             </nav>
				</div>
            </section>
            <section id="first_section">
                <div class="container">
                    <div id="info_loop">
                    </div>
                </div>
            </section>
			<p style="margin-top: 20px;">
				Obs. Transport til hele landet er muligt.
			</p>
        </div>
    </main><!-- #main -->
    <template>
		
        <article>
            <img src="" alt="">
			<div class="kanin-info">
				
            <h3 class="navn"></h3>
            <p class="alder"></p>
			<p class="kon"></p>
			<p class="ind-ud"></p>
			<p class="kort-beskrivelse">
					
			</p>
			<p class="lokation">
				
				</p>
				</div>
			
			<div id="kon">
			
		</div>
        </article>
		
    </template>
<?php astra_content_page_loop(); ?>
			<?php astra_primary_content_bottom(); ?>

    <script>
 


    let kaniner;
    let categories;
    let filter = "alle";

    const url = "https://jsk-grafik.dk/kea/kaninvaernet.dk/wp-json/wp/v2/kanin";
	const caturl = "https://jsk-grafik.dk/kea/kaninvaernet.dk/wp-json/wp/v2/categories/";

    console.log("kanin")

    document.addEventListener("DOMContentLoaded", start);

    function start() {
        console.log("start");

        hentData();
    }
			

    async function hentData() {
        const respons = await fetch(url);
        kaniner = await respons.json();
		const catrespons = await fetch(caturl);
                    categories = await catrespons.json();
                    console.log(kaniner);

                    opretKnapper();
        console.log(kaniner);
        visKanin();
	

	
    }


		function opretKnapper() {
                    console.log("opretKnapper")

                    categories.forEach(cat => {

						if (cat.id == 18 ||cat.id == 19 ) {
							 document.querySelector("#filtrering").innerHTML += `<button class="filter" data-kanin="${cat.id}">${cat.name}</button>`
							 addEventListenerToButton();

						}
                    });
                }


                function addEventListenerToButton() {
                    console.log("button");
                    document.querySelectorAll(".filter").forEach(knap => {
                        knap.addEventListener("click", filtrerInfo);
                    })
                }

                function filtrerInfo() {
                    filter = this.dataset.kanin;
                    console.log("filtrerInfo")
document.querySelector(".valgt").classList.remove("valgt");
                    this.classList.add("valgt");
                    visKanin();
		
					
				}
	

	

    function visKanin() {
        console.log("visKanin");

        const temp = document.querySelector("template").content;
        const dest = document.querySelector("#info_loop");

        dest.textContent = "";

        kaniner.forEach(kanin => {
            console.log(kanin.kon);
		

            if (filter == "alle" ||  kanin.categories.includes(parseInt(filter))) {

            const klon = temp.cloneNode(true);
				
            if (kanin.kon == "Hun") {
				
				console.log("den er en hun");
				
				klon.querySelector("#kon").innerHTML = `
			<img src="https://jsk-grafik.dk/kea/kaninvaernet.dk/wp-content/uploads/2022/05/venus-solid.svg">`
			
				}
				 else {
					 console.log("den er en han");

					klon.querySelector("#kon").innerHTML = `<img src="https://jsk-grafik.dk/kea/kaninvaernet.dk/wp-content/uploads/2022/05/mars-solid.svg">`
					
					
				 }
            klon.querySelector(".navn").textContent = kanin.navn;
            klon.querySelector("img").src = kanin.billede.guid;
				klon.querySelector(".kon").textContent = "Køn: "+ kanin.kon;
            klon.querySelector(".alder").textContent = "Alder: "+ kanin.alder;
			klon.querySelector(".ind-ud").textContent = "Inde/ude: "+ kanin.inde_udekanin;
				klon.querySelector(".kort-beskrivelse").textContent = kanin.kort_beskrivelse;
				klon.querySelector(".lokation").innerHTML =`<i class="fa-solid fa-location-dot"></i> ` + kanin.lokation;
				
    
			
				
			klon.querySelector("article").addEventListener("click", () => location.href = kanin.link);

            dest.appendChild(klon);
				

            }
			
			

        });}
		
		

    </script>

<?php get_footer(); ?>
