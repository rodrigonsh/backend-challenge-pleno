<?php $this->extend('layout') ?>

<?php $this->section('content') ?>

<div id="header">
	<div class='container'>Admin</div>
</div>

<div id="admin" cards class="container">


	<a card href="/admin/users">
		
		<img src="/img/users.png" />

		<h3>Usuários</h3>

		<p>Quem pode logar</p>

	</a>

	<a card href="/admin/services">
		
		<img src="/img/services.png" />

		<h3>Serviços</h3>

		<p>O que oferecemos</p>

	</a>

	<a card href="/admin/clients">
		
		<img src="/img/clients.png" />

		<h3>Clientes</h3>

		<p>Eles assinam embaixo</p>

	</a>

</div>

<?php $this->endSection() ?>

<?php $this->section('scripts') ?>
<script type="text/javascript" src="main.js"></script>
<?php $this->endSection() ?>