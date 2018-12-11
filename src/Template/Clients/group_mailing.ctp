<nav class="large-1 medium-3 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Clients'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="clients form large-11 medium-9 columns content">
	<?
	debug($clients);
	echo $this->Form->create(false);
		echo $this->Form->control('to', [
			'type' => 'text'
		]);
		echo $this->Form->control('cc', [
			'type' => 'text'
		]);
		echo $this->Form->control('subject', [
			'type' => 'text'
		]);
		echo $this->Form->control('message', [
			'type' => 'textarea'
		]);
	echo $this->Form->button('Send');
    echo $this->Form->end();
?>
</div>