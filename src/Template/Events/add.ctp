<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Listar Eventos'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="eventos form large-9 medium-8 columns content">
    <?= $this->Form->create($event) ?>
    <fieldset>
        <legend><?= __('Adicionar Evento') ?></legend>
        <?php
            echo $this->Form->input('nome_evento');
            echo $this->Form->input('tipo_evento');
            echo $this->Form->input('data_evento');
            echo $this->Form->input('hora_evento');
            $options = array('Sim' => 'Sim', 'Nao' => 'Não');
            echo $this->Form->input('validate', array(
                'type' => 'radio',
                'label' => 'Validação evento',
                'options' => $options,
                'templates' => ['radioWrapper' => '<div>{{label}}</div>'],
                'default' => 'Sim',
                'legend' => 'false'
                
            ));
            echo $this->Form->input('organizer_id',['options' => $organizers]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
