<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $organizer->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $organizer->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Organizers'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="organizers form large-9 medium-8 columns content">
    <?= $this->Form->create($organizer) ?>
    <fieldset>
        <legend><?= __('Edit Organizer') ?></legend>
        <?php
            echo $this->Form->input('nome_organizador');
            echo $this->Form->input('nome_empresa');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>