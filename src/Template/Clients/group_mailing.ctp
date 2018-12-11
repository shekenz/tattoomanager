<nav class="large-1 medium-3 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Clients'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="clients form large-11 medium-9 columns content">
	<?
	$mailList = ['' => ''];
	foreach($clients as $client) {		
		$clientName = ltrim(rtrim($client->firstname.' '.$client->name));
		$mailList[$client->email] = $clientName;
	}
	echo $this->Form->create($mail); ?>
	<fieldset>
        <legend><?= 'Group Mailing' ?></legend>
        <?
		echo $this->Form->control('to', [
            	'type' => 'select',
            	'options' => $mailList
            ]);
		echo $this->Form->control('title');
		echo $this->Form->control('message');
		?>
	</fieldset>
	<?
	echo $this->Form->button('Send');
    echo $this->Form->end();
?>
</div>