<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Client[]|\Cake\Collection\CollectionInterface $clients
 */
 
 use Cake\I18n\Time;
 
?>
<nav class="large-2 medium-3 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Client'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="clients index large-10 medium-9 columns content">
    <h3><?= __('Clients') ?></h3>
    <table cellpadding="0" cellspacing="0" class="table-custom">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id', 'ID') ?></th>
<!--                 <th scope="col"><?= $this->Paginator->sort('name') ?></th> -->
                <th class="fit-cell" scope="col"><?= $this->Paginator->sort('firstname', 'Name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('phone') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('gender') ?></th>
                <th scope="col"><?= $this->Paginator->sort('birthdate', 'Age') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('rating', 'R') ?></th>
                <th scope="col" class="actions last"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clients as $client): ?>
            <tr>
                <td><?= $this->Number->format($client->id) ?></td>
<!--                 <td><?= h($client->name) ?></td> -->
                <td><?= $this->Html->link(h($client->firstname)." ".h($client->name), ['action' => 'view', $client->id]) ?></td>
                <td><?= $this->Html->link(h($client->phone), "tel:".h($client->phone), ['class' => 'obvious']) ?></td>
                <td><?= $this->Html->link(h($client->email), "mailto:".h($client->email), ['class' => 'obvious']) ?></td>
                <td><?= $client->gender ? 'Man' : 'Woman'; ?></td>
                <td><?
					if ($client->birthdate) {
						$then = DateTime::createFromFormat("n/j/y", $client->birthdate);
						$diff = $then->diff(new DateTime());
						echo $diff->format("%y");
					} else {
						echo "Error";
					}
	                //= h($client->birthdate) 
	            	?></td>
	            <td><?
		            $typeList = ['Shop', 'Gil', 'Shekenz', 'Vincent', 'Cazimir', 'Bleck', 'Guest'];
		            if (isset($client->artist)) {
		            	echo $typeList[$client->artist];
		            }
		            ?></td>
		            <td><?= ($client->rating > 5) ? '<span style="color:#be140b">&#x25C9</span>' : '<span style="color:#1798A5">&#x25C9</span>'; ?></td>
                <td class="actions last">
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $client->id]) ?>
                    &nbsp|&nbsp
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $client->id], ['confirm' => __('Are you sure you want to delete # {0}?', $client->id)]) ?>
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
