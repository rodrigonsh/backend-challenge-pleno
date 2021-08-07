<?php $this->extend('layout') ?>

<?php $this->section('content') ?>

<div id="banners" class="swiper-container">

	<div class='swiper-wrapper'>


		<div id="banner2" class="banner video swiper-slide">
			
			<video autoplay loop muted src="video.mp4"></video>

			<div class="over">

				<img style="margin-bottom: 32px" src="img/nishino.png" id="nishino" />

				<button class="btn-cta">
					<img src="img/ongaku.png" />
					Tocar Som
				</button>

			</div>

		</div>

		<div id="banner1" class="banner swiper-slide" style="background-image: url(img/banner1.jpg);">
			
			<h1>Este banner foi recriado</h1>
			
			<p>
				Que delícia esse template hein 😉
			</p>

			<div class="btn-group">

				<a href="#" class="btn-cta btn-primary">Sobre o SiteDemo</a>
				<a href="#" class="btn-cta btn-secondary">Começar</a>

			</div>

		</div>

		

		<div id="banner2" class="banner swiper-slide" style="background-image: url(img/banner3.webp);">
			
			<h1>Ahhh que bom</h1>
			
			<p>
				Agora posso consertar o chuveiro :D
			</p>

			<div class="btn-group">

				<a href="#" class="btn-cta btn-primary">Sobre o SiteDemo</a>
				<a href="#" class="btn-cta btn-secondary">Começar</a>

			</div>

		</div>
	
	</div>

	<div class="swiper-button-next"></div>
	<div class="swiper-button-prev"></div>
	

</div>


<section id="clients">

	<div class='container'>

		Carregando clientes ...

	</div>

</section>


<section id="services">

	<div class='container'>

		Carregando serviços ...

	</div>

</section>


<section id="atendimento" class="😎">

	<div class='container'>

		<h2>Atendimento ao Cliente</h2>

		<h2>User: <?= $user['email'] ?></h2>

		<p>
			Precisando entrar em contato, utilize nossos canais de atendimento
			ou consulte a documentação para mais informações
		</p>

		<div class="btn-group">

			<a href="#" class="btn-cta btn-primary">Envie um Ticket</a>
			<a href="#" class="btn-cta btn-secondary">Documentação</a>

		</div>

	</div>

</section>


<section id="newsletter" class="🌙">

	<div class='container'>

	<h2>Newsletter</h2>

	<p>Receba nossas informações por email e fique sabendo de todas as novidades</p>

	<form method="post">

		<input type="email" placeholder="Seu email" />

		<button class='btn-cta'>Salvar</button>

	</form>

	</div>

</section>

<?php $this->endSection() ?>

<?php $this->section('scripts') ?>
<script type="text/javascript" src="main.js"></script>
<?php $this->endSection() ?>