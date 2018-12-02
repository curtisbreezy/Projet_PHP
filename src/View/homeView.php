<header class="masthead text-center text-white d-flex" style="background-image:url(header.jpg)">
    <div class="container my-auto">
        <div class="col-lg-10 mx-auto">
            <h1 class="text-uppercase">
              <strong>
				<?php if(isset($_SESSION['pseudo'])){ echo " Bienvenue ".$_SESSION['pseudo']; } ?>  
				Ensemble,allons plus loin.
			  </strong>
            </h1>
            <hr>
        </div>
			<div class="col-lg-8 mx-auto">
				<p class="text-faded mb-5">Mourad Kheloui- Développeur PHP</p>
				<a class="btn btn-primary btn-xl js-scroll-trigger" href="doc/CV_2018_PHP.pdf">Plus d'informations</a>
		</div>
    </div>
</header>

<?php


$content = ob_get_clean();

require('/template/DefaultView.php');
