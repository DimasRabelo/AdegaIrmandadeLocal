<?php

session_start();

// Verifica se o usuário está logado
if (isset($_SESSION['nomeUsuario']) && isset($_SESSION['fotoUsuario'])) {
	$nomeUsuario = $_SESSION['nomeUsuario'];
	$fotoUsuario = $_SESSION['fotoUsuario'];
}

?>


<header>

	
		<nav  class="menu wow animate__animated animate__fadeInUp">
			<ul>
				<li class="menuliuser">
					<a href="index.php"><img class="btnpadding" src="src/imagens/botaoadega.png" alt=""></a>
				</li>
				<li class="menuliuser">
					<a href="bebidas.php"><img class="btnpadding" src="src/imagens/botaocerveja.png" alt=""></a>
				</li>
				<li class="menuliuser">
					<a href="tabacaria.php"><img class="btnpadding" src="src/imagens/botaonarguile.png" alt=""></a>
				</li>
				<li class="menuliuser">
					<a href="galeria.php"><img class="btnpadding" src="src/imagens/botao galeria.png" alt=""></a>
				</li>
				<li class="menuliuser">
					<a href="contato.php"><img class="btncontato" src="src/imagens/botaocontato.png" alt=""></a>
				</li>
				<li>
				<?php if (isset($nomeUsuario) && isset($fotoUsuario)) { ?>
					
						<img class="btnfotologado" src="./admin/img/<?php echo $fotoUsuario; ?>" alt="Foto do usuário">
						<h2 class="nomelogin"><?php echo $nomeUsuario; ?></h2>
						
					
				<h2 class="desco"><a  href="desconectar.php">Desconectar</a></h2>	
				<?php } else { ?>
					<a href="usuariologin.php">
						<img class="btnpadding" src="src/imagens/botaouser.png" alt="">
					</a>
				<?php } ?>
				
			</li>
			</ul>
		</nav>
	
</header>


<!-- class="btnusuario"-->