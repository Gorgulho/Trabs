<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Editar Evento'), ['action' => 'edit', $event->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Evento'), ['action' => 'delete', $event->id], ['confirm' => __('Tem a certeza que quer eliminar # {0}?', $event->id)]) ?> </li>
        <li><?= $this->Html->link(__('Listar Eventos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Novo Evento'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="eventos view large-9 medium-8 columns content">
    <h3><?= h($event->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nome Evento') ?></th>
            <td><?= h($event->nome_evento) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tipo Evento') ?></th>
            <td><?= h($event->tipo_evento) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Evento ID') ?></th>
            <td><?= $this->Number->format($event->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Organizacao ID') ?></th>
            <td><?= $this->Number->format($event->organizacao_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data Evento') ?></th>
            <td><?= h($event->data_evento) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hora Evento') ?></th>
            <td><?= h($event->hora_evento) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Evento validado') ?></th>
            <td><?= h($event->validate) ?></td>
        </tr>
    </table>
</div>
