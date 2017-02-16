<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $organizer->id],
                ['confirm' => __('Tem a certeza que quer eleminar # {0}?', $organizer->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('Listar Organizadores'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Listar Eventos'), ['controller' => 'Events', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="organizers form large-9 medium-8 columns content">
    <?= $this->Form->create($organizer,['enctype'=>'multipart/form-data']) ?>
    <fieldset>
        <legend><?= __('Editar Organizador') ?></legend>
        <?php
            echo $this->Form->input('nome_organizador');
            echo $this->Form->input('nome_empresa');
            echo $this->Form->input('image', ['type'=>'file', 'accept' => 'image/*'])//input para as imagens

        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
    <?php
        echo $this->element('footer'); //a chmar um element
    ?>
</div>
