<?php

session_start();

// Verifica se o usuário está logado
if (isset($_SESSION['nomeUsuario']) && isset($_SESSION['fotoUsuario'])) {
	$nomeUsuario = $_SESSION['nomeUsuario'];
	$fotoUsuario = $_SESSION['fotoUsuario'];
}

?>





<header>

	<nav class="menu animate__animated animate__fadeInUp" <?php echo (isset($nomeUsuario) && isset($fotoUsuario)) ? 'logado' : 'deslogado'; ?>>

		<ul>
			<li>
				<a href="index.php"><img class="btnadega" src="src/imagens/botaoadega.png" alt=" tela de inicio da adega"></a>
			</li>

			<li>
				<a href="bebidas.php"><img class="btnbebida" src="src/imagens/botaocerveja.png" alt=" tela de produtos bebidas"></a>
			</li>
			<li>
				<a href="tabacaria.php"><img class="btnpadding " src="src/imagens/botaonarguile.png" alt=" tela de tabacaria"></a>

			</li>

			<li>
				<a href="galeria.php"><img class="btnpadding " src="src/imagens/botao galeria.png" alt=" tela Galeria de fotos e videos"></a>
			</li>

			<li>
				<a href="contato.php"><img class="btnpadding " src="src/imagens/botaocontato.png" alt=" tela de Contatos"></a>
			</li>

			<li>
				<?php if (isset($nomeUsuario) && isset($fotoUsuario)) { ?>

					<img class="btnfotologado" src="./admin/img/<?php echo $fotoUsuario; ?>" alt="Foto do usuário">
					<h2 class="nomelogin"><?php echo $nomeUsuario; ?></h2>


					<h2 class="desco"><a href="desconectar.php">Desconectar</a></h2>
				<?php } else { ?>
					<a href="usuariologin.php">
						<img class="btnpadding" src="src/imagens/botaouser.png" alt="">
					</a>
				<?php } ?>

			</li>



		</ul>


	</nav>




</header>