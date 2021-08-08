<?php $this->extend('layout') ?>

<?php $this->section('content') ?>

<div id="header">
	<div class='container'>Delete</div>
</div>

<div class='container'>

    <?php if (isset($error)){ ?>
    <div class="alert error"><?= $error ?></div>
    <?php } ?>
    
    <form method="post" action="/admin/<?=$source?>/delete/<?=$id?>">
    
        <h1>Tem certeza que deseja excluir este item?</h1>

        <h2><?=$item[$itemName]?></h2>


        <div class='field'>
			<label>Confirme digitando sua senha</label>
			<input name="delete_confirmation" type="password" required />
		</div>

        <div class='field'>
            <button class="btn-cta">Excluir</button>
        </div>

</div>

<?php $this->endSection() ?>


<?php $this->section('content') ?>
<style type="text/css">

form h2
{
    margin-top: 48px;
}

</style>
<?php $this->endSection() ?>