<div class="nomegaleria">GALERIA</div>
<section class="galeria wow animate__animated animate__fadeInUp">

    <?php for ($i = 0; $i < count($lista); $i++) : ?>
    
            <img src="<?php echo 'src/imagens/' . $lista[$i]['fotoGaleria'] ?>" alt="">

    <?php endfor; ?>

</section>





<h class="evento">VIDEOS</h>
<div class="site">


    <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">


            <div class="carousel-item active ">
                <iframe width="100%" height="600" src="https://www.youtube.com/embed/ct3xxqCuqWg" title="Adega Lounge e Tabacaria Irmandade Localizado na rua Manoel Bueno da fonseca,46" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen>

                </iframe>

            </div>
            <div class="carousel-item">
                <iframe width="100%" height="600" src="https://www.youtube.com/embed/wFP3Vte7mtY" title="Adega Lounge e Tabacaria Irmandade Localizado na rua Manoel Bueno da fonseca,46" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen>
                </iframe>
            </div>

            <div class="carousel-item ">
                <iframe width="100%" height="600" src="https://www.youtube.com/embed/Kskj9xfOCY" title=" de setembro de 03" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>


        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>