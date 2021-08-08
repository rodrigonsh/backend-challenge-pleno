<?php $this->extend('layout') ?>

<?php $this->section('content') ?>

<div id="header">
	<div class='container'>Retrieve</div>
</div>

<div class='container'>

    <p><a class='btn-cta' href="/admin/<?=$source?>/new">📝 Novo item</a></p>

    <table>

        <thead>
            <tr>
                <th>ID</th>
                <th>Item</th>
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