<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Client $client
 */
?>
<nav class="large-2 medium-3 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Client list'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="clients form large-10 medium-9 columns content">
    <?= $this->Form->create($client) ?>
    <fieldset>
        <legend><?= __('Add Client') ?></legend>
        <?php
	        echo $this->Form->control('firstname', [
	            'label' => 'First name'
	        ]);
            echo $this->Form->control('name', [
	            'label' => 'Last name'
	        ]);
            echo $this->Form->control('phone');
            echo $this->Form->control('email');
            echo $this->Form->control('birthdate', [
	            'label' => 'Birthday',
	            'minYear' => date('Y') - 100,
	            'maxYear' => date('Y') - 16
            ]);
            echo $this->Form->control('gender', [
	            'required' => true,
            	'type' => 'select',
            	'options' => ['Woman', 'Man']
            ]);
            echo $this->Form->control('artist', [
	            'required' => true,
            	'type' => 'select',
            	'options' => ['Shop', 'Gil', 'Shekenz', 'Vincent', 'Cazimir', 'Bleck', 'Guest']
            ]);
            //echo $this->Form->control('creationdate');
        ?>
    </fieldset>
    <?= $this->Form->button('CANCEL', array(
        'class' => 'cancel button',
        'type' => 'button',
        'onclick' => 'location.href=\''.$this->request->session()->read('referer').'\''
    )); ?>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
