<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Client $client
 */
?>
<nav class="large-2 medium-3 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Client'), ['action' => 'edit', $client->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Client'), ['action' => 'delete', $client->id], ['confirm' => __('Are you sure you want to delete # {0}?', $client->id)]) ?> </li>
        <li><?= $this->Html->link(__('New Client'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('Client list'), ['action' => 'index']) ?> </li>
    </ul>
</nav>
<div class="clients view large-10 medium-9 columns content">
    <h3><?= h($client->firstname)."&nbsp".h($client->name)."&nbsp(".$this->Number->format($client->id).")" ?></h3>
    <table class="vertical-table">
        <!--
<tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($client->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Firstname') ?></th>
            <td><?= h($client->firstname) ?></td>
        </tr>
-->
		<tr>
            <th scope="row"><?= __('Mail') ?></th>
            <td class="last"><?= $this->Html->link(h($client->email), "mailto:".h($client->email), ['class' => 'obvious']) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone') ?></th>
            <td class="last"><?= $this->Html->link(h($client->phone), "tel:".h($client->phone), ['class' => 'obvious']) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Birthday') ?></th>
            <td class="last"><? echo h($this->Time->format($client->birthdate, 'dd/MM/yyyy'));
	            $then = DateTime::createFromFormat("n/j/y", $client->birthdate);
				$diff = $then->diff(new DateTime());
				echo " (".$diff->format("%y")." y.o.)";
			?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Gender') ?></th>
            <td class="last"><?= $client->gender ? __('Man') : __('Woman'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td class="last"><?
	            $typeList = ['Shop', 'Gil', 'Shekenz', 'Vincent', 'Cazimir', 'Bleck', 'Guest'];
		            if (isset($client->type)) {
		            	echo $typeList[$client->type];
		            }
		        ?>
		    </td>
        </tr>
        <tr>
            <th scope="row"><?= __('Creation date') ?></th>
            <td class="last"><?= h($this->Time->format($client->creationdate, 'dd/MM/yyyy HH:mm')) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rating') ?></th>
            <td class="last"><?
	            //echo "(".$client->rating.") ";
	            if($client->rating <= 5) {
	            	for($i = 1; $i <= $client->rating; $i++) {
		            	echo "&#x2605";
	            	}
	            	for($i = 1; $i <= 5-$client->rating; $i++) {
		            	echo "&#x2606";
	            	}
	            } else {
		            echo '<span style="color:#be140b">Not rated</span>';
	            }
	        ?></td>
        </tr>
    </table>

</div>
