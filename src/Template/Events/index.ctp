<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Novo Evento'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Listar Organizadores'), ['controller' => 'Organizers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Listar Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="eventos index large-9 medium-8 columns content">
    <h3><?= __('Eventos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nome_evento') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tipo_evento') ?></th>
                <th scope="col"><?= $this->Paginator->sort('data_evento') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hora_evento') ?></th>
                <th scope="col"><?= $this->Paginator->sort('organizacao_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($events as $event): ?>
            <tr>
                <td><?= $this->Number->format($event->id) ?></td>
                <td><?= $event->nome_evento ?></td>
                <td><?= $event->tipo_evento ?></td>
                <td><?= date('d/m/Y',strtotime($event->data_evento)) ?></td>
                <td><?= date('H:i',strtotime($event->hora_evento)) ?></td>
                <td><?= $event->organizer->nome_organizador ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $event->id]) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $event->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $event->id], ['confirm' => __('Tem a certeza que quer eliminar # {0}?', $event->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
