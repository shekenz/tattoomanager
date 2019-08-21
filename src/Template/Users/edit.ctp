<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-2 medium-3 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $user->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="users form large-10 medium-9 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Edit User') ?></legend>
        <?php
            echo $this->Form->control('username');
            echo $this->Form->control('firstname');
            echo $this->Form->control('lastname');
            echo $this->Form->control('email');
            echo $this->Form->control('password');
            echo $this->Form->control('role', [
	            'required' => true,
            	'type' => 'select',
            	'options' => ['Super Admin', 'Admin', 'User']
            ]);
            echo $this->Form->control('birthdate');
            echo $this->Form->control('creationdate');
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
