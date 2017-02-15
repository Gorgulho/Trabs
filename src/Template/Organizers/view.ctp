<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Novo Organizador'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('Edit Organizador'), ['action' => 'edit', $organizer->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Organizador'), ['action' => 'delete', $organizer->id], ['confirm' => __('Tem a certeza que quer eleminar # {0}?', $organizer->id)]) ?> </li>
    </ul>
</nav>
<div class="organizers view large-9 medium-8 columns content">
    <h3><?= h($organizer->nome_organizador) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nome Organizador') ?></th>
            <td><?= h($organizer->nome_organizador) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nome Empresa') ?></th>
            <td><?= h($organizer->nome_empresa) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($organizer->id) ?></td>
        </tr>
        <th scope="row"><?= __('Image') ?></th>
            <td><?= $this->Html->image($organizer->image, array('alt' => 'imagem de perfil', "width" => "100" ,"height" => "100" )); ?></td>
    </table>
    <div class="related">
        <h4><?= __('Related Events') ?></h4>
        <?php if (!empty($organizer->events)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Nome Evento') ?></th>
                <th scope="col"><?= __('Tipo Evento') ?></th>
                <th scope="col"><?= __('Data Evento') ?></th>
                <th scope="col"><?= __('Hora Evento') ?></th>
                <th scope="col"><?= __('Validate') ?></th>
                <th scope="col"><?= __('Organizer Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($organizer->events as $events): ?>
            <tr>
                <td><?= h($events->id) ?></td>
                <td><?= h($events->nome_evento) ?></td>
                <td><?= h($events->tipo_evento) ?></td>
                <td><?= h($events->data_evento) ?></td>
                <td><?= h($events->hora_evento) ?></td>
                <td><?= h($events->validate) ?></td>
                <td><?= h($events->organizer_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Events', 'action' => 'view', $events->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Events', 'action' => 'edit', $events->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Events', 'action' => 'delete', $events->id], ['confirm' => __('Are you sure you want to delete # {0}?', $events->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
