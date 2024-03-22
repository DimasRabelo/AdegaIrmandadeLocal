<style>

</style>



<div class="nomebebidas">
    <h2>PRODUTOS</h2>
</div>
<ul class="sample-menu">
    <li data-tab="product1">Cervejas</li>
    <li data-tab="product2">Refrigerantes</li>
    <li data-tab="product3">Destilados</li>
</ul>

<div class="sample-content active" id="product1">
    <div class="site">
        <section class="brejas wow animate__animated animate__fadeInUp">

            <div class="Cervejas">
                <div>
                    <a href="src/imagens/bebidas/cerveja220/skol269.png" data-lightbox="gallery" data-title="Skol 269ML">
                        <img src="src/imagens/bebidas/cerveja220/skol269.png" alt="">
                    </a>
                    <p>Skol 269ML</p>
                </div>

                <div>
                    <a href="src/imagens/bebidas/cerveja220/Amstel269ml.png" data-lightbox="gallery" data-title="Amstel 269ML">
                        <img src="src/imagens/bebidas/cerveja220/Amstel269ml.png" alt="">
                    </a>
                    <p>Amstel 269ML</p>
                </div>

                <div>
                    <img src="src/imagens/bebidas/cerveja220/brahmaduplomalte269ml.png" alt="">
                    <p>Brahma Duplo Malte 269ML</p>
                </div>

                <div>
                    <img src="src/imagens/bebidas/cerveja220/coronalongneck.png" alt="">
                    <p>Corona Long Neck 330ML</p>
                </div>


                <div>
                    <img src="src/imagens/bebidas/cerveja220/heinekenlongneck.png" alt="">
                    <p>Heineken Long Neck 330ML</p>
                </div>

                <div>
                    <img src="src/imagens/bebidas/cerveja220/itaipava269ml.png" alt="">
                    <p>Itaipava 269ML</p>
                </div>

                <div>
                    <img src="src/imagens/bebidas/cerveja220/original269ml.png" alt="">
                    <p>Original 269ML</p>
                </div>

                <div>
                    <img src="src/imagens/bebidas/cerveja220/spaten269.png" alt="">
                    <p>Spaten 269ML</p>
                </div>

            </div>
            <div class="banner">

                <?php if (!empty($lista)) : ?>
                    <div class="bannerBreja">
                        <img src="<?php echo 'src/imagens/' . $lista[0]['fotoBanner']; ?>" alt="<?php echo $lista[0]['altBanner']; ?>">
                    </div>
                <?php endif; ?>

            </div>
        </section>
    </div>
</div>










<div class="sample-content" id="product2">
    <div class="site">
        <div class="Refrigerantes">



            <section>
                <div>
                    <img src="src/imagens/bebidas/refrigerantes220/bally.png" alt="">
                    <p>Energético Bally 2 Litros</p>
                </div>

                <div>
                    <img src="src/imagens/bebidas/refrigerantes220/coca-cola-2-litros.png" alt="">
                    <p>Coca Cola 2 Litros</p>
                </div>

                <div>
                    <img src="src/imagens/bebidas/refrigerantes220/cocacola350ml.png" alt="">
                    <p>Coca Lata 350ML</p>
                </div>


                <div>
                    <img src="src/imagens/bebidas/refrigerantes220/dolly.png" alt="">
                    <p>Dolly 2 Litros</p>
                </div>


                <div>
                    <img src="src/imagens/bebidas/refrigerantes220/fanta2litros.png" alt="">
                    <p>Fanta 2 litros</p>
                </div>
            </section>




            <section>
                <div>
                    <img src="src/imagens/bebidas/refrigerantes220/fanta350ml.png" alt="">
                    <p>Fanta Lata 350ML</p>
                </div>

                <div>
                    <img src="src/imagens/bebidas/refrigerantes220/gatorade.png" alt="">
                    <p>Gatorade 500ML</p>
                </div>

                <div>
                    <img src="src/imagens/bebidas/refrigerantes220/gelodecoco.png" alt="">
                    <p>Gelo de Coco</p>
                </div>

                <div>
                    <img src="src/imagens/bebidas/refrigerantes220/gelodesabormelancia.png" alt="">
                    <p>Gelo Sabor Melancia</p>
                </div>

                <div>
                    <img src="src/imagens/bebidas/refrigerantes220/guaraviton.png" alt="">
                    <p>Guaraviton 500ML</p>
                </div>
            </section>


            <section>
                <div>
                    <img src="src/imagens/bebidas/refrigerantes220/h20.png" alt="">
                    <p>H2O 500ML</p>
                </div>

                <div>
                    <img src="src/imagens/bebidas/refrigerantes220/images.png" alt="">
                    <p>Chop de Vinho 600ML</p>
                </div>

                <div>
                    <img src="src/imagens/bebidas/refrigerantes220/redbul.png" alt="">
                    <p>Red Bull 250ML </p>
                </div>

                <div>
                    <img src="src/imagens/bebidas/refrigerantes220/vibe.png" alt="">
                    <p>Energético Vibe 2 Litros</p>
                </div>

                <div>
                    <img src="src/imagens/bebidas/refrigerantes220/pepsi.png" alt="">
                    <p>Pepsi 2 Litros</p>
                </div>
            </section>
        </div>

    </div>


</div>









<div class="sample-content" id="product3">
    <div class="site">


        <div class="Destilados">

            <div>
                <img src="src/imagens/bebidas/fortes220/ballantines.png" alt="">
                <p>Ballantines</p>
            </div>

            <div>
                <img src="src/imagens/bebidas/fortes220/black label.png" alt="">
                <p>Black Label</p>
            </div>

            <div>
                <img src="src/imagens/bebidas/fortes220/gin rocks.png" alt="">
                <p>Gin Rocks</p>
            </div>

            <div>
                <img src="src/imagens/bebidas/fortes220/gininvictus.png" alt="">
                <p>Gin Invictus</p>
            </div>

        </div>

    </div>

    <div class="bannerDestilado">
        <?php if (!empty($lista)) : ?>
            <div>
                <img src="<?php echo 'src/imagens/' . $lista[1]['fotoBanner']; ?>" alt="<?php echo $lista[1]['altBanner']; ?>">
            </div>
        <?php endif; ?>
    </div>
    <div class="site">
        <div class="Destilados2">

            <div>
                <img src="src/imagens/bebidas/fortes220/jackdaniels.png" alt="">
                <p>Jack Daniels</p>
            </div>

            <div>
                <img src="src/imagens/bebidas/fortes220/redlabel.png" alt="">
                <p>Red Label</p>
            </div>

            <div>
                <img src="src/imagens/bebidas/fortes220/whitehorse.png" alt="">
                <p>White Horse</p>
            </div>

            <div>
                <img src="src/imagens/bebidas/fortes220/taquery.png" alt="">
                <p>Taquery</p>

            </div>

        </div>

    </div>








</div>
</div>