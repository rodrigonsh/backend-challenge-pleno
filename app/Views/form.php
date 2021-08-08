<?php $this->extend('layout') ?>

<?php $this->section('content') ?>

<div id="header">
	<div class='container'><?=$action?></div>
</div>

<div class='container'>

<form method="POST" action="/admin/<?=$source?>/new">

<?php if (isset($error)){ ?>

    <div class="alert error"><?= $error ?></div>

<?php } ?>

fields here

<button class='btn-cta btn-primary'>Entrar</button>

</form>
</div>

<?php $this->endSection() ?>



<?php $this->section('content') ?>

    <link rel="stylesheet" href="/forms.css" /> 

<?php $this->endSection() ?>