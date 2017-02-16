<footer>
<?php
   echo $this->Form->create("locale");
   $options = ['pt_PT' => __('Português'), 'en_US' => __('Inglês'), 'it_IT' => __('Italiano'), 'es_ES' => __('Espanhol')];
   echo $this->Form->select('locale', $options, ['empty' => false]);
   echo $this->Form->button(__('submit'));
   echo $this->Form->end();
?>
</footer>