<?php $this->extend('layout') ?>

<?php $this->section('content') ?>

<div id="header">
	<div class='container'>Login</div>
</div>

<div id="login" class="container">


	<form method="POST" action="/auth/doLogin">

		<?php if (isset($error)){ ?>

			<div class="alert error"><?= $error ?>

		<?php } ?>

		<div class='field'>
			<label>Email</label>
			<input name="email" type="email" required />
		</div>

		<div class='field'>
			<label>Senha</label>
			<input name="senha" type="password" required />
		</div>

		<button>Entrar</button>

	</form>

</div>

<?php $this->endSection() ?>

<?php $this->section('scripts') ?>
<script type="text/javascript" src="main.js"></script>
<?php $this->endSection() ?>