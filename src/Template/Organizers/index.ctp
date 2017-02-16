<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Novo Organizador'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="organizers index large-9 medium-8 columns content">
    <h3><?= __('Organizadores') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nome_organizador') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nome_empresa') ?></th>
                <th scope="col"><?= $this->Paginator->sort('image') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($organizers as $organizer): ?>
            <tr>
                <td><?= $this->Number->format($organizer->id) ?></td>
                <td><?= $organizer->nome_organizador ?></td>
                <td><?= $organizer->nome_empresa ?></td>
                <td><?= $this->Html->image($organizer->image, array('alt' => 'imagem de perfil', "width" => "50" ,"height" => "50" )); ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $organizer->id]) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $organizer->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $organizer->id], ['confirm' => __('Tem a certeza de que quer eleminar # {0}?', $organizer->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
        <?php echo $this->element('paginate'); // a chmar o elemento do paginate?>
    <br>
    <?php
        echo $this->element('footer'); // a chamar o elemente com as traduções
    ?>
</div>
