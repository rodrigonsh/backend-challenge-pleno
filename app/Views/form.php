<?php $this->extend('layout') ?>

<?php $this->section('content') ?>

<div id="header">
	<div class='container'><?=$action?></div>
</div>

<div class='container'>

<form method="POST" action="<?=$crudAction?>">

<?php if (isset($error)){ ?>

    <div class="alert error"><?= $error ?></div>

<?php } ?>

<?php foreach( $fields as $k=>$f ): ?>
    <div class='field'>
        <label><?=$f['label']?></label>
        <input
            name="<?=$k?>" 
            type="<?=$f['type']?>" 
            value="<?php echo isset($item) ? $item[$k] : ''?>"
            autocomplete="off"
            required />
    </div>
<?php endforeach ?>

<button class='btn-cta btn-primary'>Salvar</button>

</form>
</div>

<?php $this->endSection() ?>



<?php $this->section('content') ?>

    <link rel="stylesheet" href="/forms.css" /> 

<?php $this->endSection() ?>