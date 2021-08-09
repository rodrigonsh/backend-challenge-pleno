<?php $this->extend('layout') ?>

<?php $this->section('content') ?>

<div id="header">
	<div class='container'>#<?=$moduleName?></div>
</div>

<div class='container'>

    <a id="newBtn" class='btn-cta' href="/admin/<?=$source?>/new">📝 Novo item</a>
    
    <?php if( isset($fk_parent) ): ?>
    <a href="/admin/<?=$fk_parent?>">Voltar</a>
    <?php endif; ?>

    <table>

        <thead>
            <tr>
                <th>ID</th>
                <th>Item</th>

                <?php if ( method_exists($model, 'cols') ) : ?>
                <?php foreach($model->cols() as $col): ?>
                <th><?=$col['label']?></th>
                <?php endforeach ?>
                <?php endif ?>

                <th>❌ Excluir</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach($items as $i): ?>
            <tr>
                <td><?=$i['id']?></td>
                <td>
                    <a href="/admin/<?=$source?>/<?=$i['id']?>">
                        <?=$i[$itemName]?>
                    </a>
                </td>

                <?php if ( method_exists($model, 'cols') ) : ?>
                <?php foreach($model->cols() as $k=>$col): ?>
                <td>
                    <a href="/admin/<?=$source?>/foreign/<?=$k?>/<?=$i['id']?>">
                        <?=$col['label']?>
                    </a>
                </td>
                <?php endforeach ?>
                <?php endif ?>

                <td>
                    <a href="/admin/<?=$source?>/delete/<?=$i['id']?>">
                        ❌ Excluir
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>

    </table>

</div>

<?php $this->endSection() ?>


<?php $this->section('content') ?>
<style type="text/css">

#newBtn
{
    position: absolute;
    right: 0px;
    top: -56px;
}

table{ width: 100%; }
table th, table td
{
    padding: 16px;
    border-bottom: 1px solid lightgray;
    text-align: left;
}

table a
{
    text-decoration: none;
    color: blue;
}

</style>
<?php $this->endSection() ?>