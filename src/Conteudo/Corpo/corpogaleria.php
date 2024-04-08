<div class="nomegaleria">GALERIA</div>
<section class="galeria wow animate__animated animate__fadeInUp">

    <?php for ($i = 0; $i < count($lista); $i++) : ?>

        <img src="<?php echo 'src/imagens/' . $lista[$i]['fotoGaleria'] ?>" alt="">

    <?php endfor; ?>

</section>





<h2 class="evento">VIDEOS</h2>
<div class="site">
    <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">
            <div class="carousel-item active">            
                <iframe class="video" width="100%" height="600" src="<?php echo $listaUrl[0]['urlVideo'];?>?enablejsapi=1&rel=0" title="Video 1" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
            <div class="carousel-item">
                <iframe class="video" width="100%" height="600" src=<?php echo $listaUrl[1]['urlVideo'];?>?enablejsapi=1&rel=0" title="Video 2" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
            <div class="carousel-item">
                <iframe class="video" width="100%" height="600" src="<?php echo $listaUrl[2]['urlVideo'];?>?enablejsapi=1&rel=0" title="Adega Lounge e Tabacaria Irmandade Localizado na rua Manoel Bueno da fonseca,46" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
            <div class="carousel-item">
            <iframe class="video"   width="100%" height="600" src="<?php echo $listaUrl[3]['urlVideo'];?>?enablejsapi=1&rel=0" title="22 de setembro de 2023" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
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

<script>
    var videos = document.querySelectorAll('.video');

    function stopVideos() {
        videos.forEach(function(video) {
            video.contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', '*');
        });
    }

    var carousel = document.getElementById('carouselExample');
    carousel.addEventListener('slid.bs.carousel', stopVideos);
</script>