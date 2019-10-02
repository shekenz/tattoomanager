<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Client[]|\Cake\Collection\CollectionInterface $clients
 */
 
 use Cake\I18n\Time;
 
?>
<nav class="large-2 medium-3 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Menu') ?></li>
        <li><?= $this->Html->link(__('Users'), ['controller' => 'users']) ?></li>
        <li><?= $this->Html->link(__('Group Mailing'), ['action' => 'groupMailing']) ?></li>
        <? if ($debug) {
        	echo '<li>'.$this->Html->link(__('Cake Info'), ['controller' => 'pages', 'action' => 'display', 'about']).'</li>'; }
        ?>
    </ul>
</nav>
<div class="clients index large-10 medium-9 columns content">
    <h3><?= __('Clients') ?></h3>
    
	<!-- BIRTHDAYS -->
	<? $birthdaysStr = '';
		$today = Time::now()->hour(0)->minute(0)->second(0);
	foreach($clients as $client) {
    	if ($client->birthdate == $today) {
	    	$birthdaysStr .= $this->Html->link($client->name.' '.$client->firstname, ['action' => 'view', $client->id]).', ';
    	} 	
	}
	$birthdaysStr = rtrim($birthdaysStr, ', ');
	
	if(!empty($birthdaysStr)): ?>
	<div id="birthdays">Today's birthdays :
	<?= $birthdaysStr; ?>
	</div>
	<? endif; ?>
    
    <div id="action-menu">
		<?= $this->Html->link(__('New Client'), ['action' => 'add'], ['class' => 'button']) ?>
		<?= $this->Html->link(__('Export CSV'), ['action' => 'export'], ['class' => 'button']); ?>
		</div>
    
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
                <th scope="col"><?= $this->Paginator->sort('artist') ?></th>
                <th scope="col"><?= $this->Paginator->sort('rating', 'R') ?></th>
                <th scope="col" class="actions last"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clients as $client): ?>
            <tr<?= (h($client->pending)) ? ' class="pending"' : ''?>>
                <td><?= $this->Number->format($client->id) ?></td>
<!--                 <td><?= h($client->name) ?></td> -->
                <td><?= $this->Html->link(h($client->firstname)." ".h($client->name), ['action' => 'view', $client->id]) ?></td>
                <td><?= $this->Html->link(h($client->phone), "tel:".h($client->phone), ['class' => 'obvious']) ?></td>
                <td><? if($client->email) :?>
                	<?= $this->Html->link(h($client->email), ['action' => 'groupMailing', $client->id]) ?>&nbsp;&nbsp;<?= $this->Html->link('<i class="fas fa-external-link-alt"></i>', "mailto:".h($client->email), ['escape' => false]) ?>
					<? endif; ?></td>
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
		            $user_id = $this->Number->format($client->user_id);
		            if(array_key_exists($user_id, $userList)) {
			            echo $userList[$user_id];
		            } else {
			            echo '<span class="warning">None</span>';
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
