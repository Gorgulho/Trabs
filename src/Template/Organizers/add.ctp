<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Organizers'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="organizers form large-9 medium-8 columns content">
    <?= $this->Form->create($organizer,['enctype'=>'multipart/form-data']) ?>
    <fieldset>
        <legend><?= __('Add Organizer') ?></legend>
        <?php
            echo $this->Form->input('nome_organizador');
            echo $this->Form->input('nome_empresa');
            echo $this->Form->input('image', ['type'=>'file', 'accept' => 'image/*'])
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
