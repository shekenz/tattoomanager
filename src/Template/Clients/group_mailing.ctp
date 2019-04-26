<nav class="large-2 medium-3 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Clients'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="clients form large-10 medium-9 columns content">	
	<h3><?= __('Group Mailing') ?></h3>
	<? /* $this->Form->setTemplates([
		'inputContainer' => '<div class="input {{type}}{{required}} {{state}} {{float}}">{{content}}</div>'
	]); */ ?>
	<?= $this->Form->create($mail, ['type' => 'file']) ?>
	<fieldset id="filterFieldset" class="hidden">
        <legend><?= __('Recipient rule') ?></legend>
        <div class="floatWrapper">
        <?
		echo $this->Form->control('filter', [
			'id' => 'filterSelection',
			'class' => 'floatInput',
			'type' => 'select',
			'options' => ['', 'Creation date', 'Age', 'Gender', 'Rating', 'Artist'],
			'templateVars' => ['float' => 'floatContainer'],
			'disabled' => true
		]);
		echo $this->Form->control('creationDate', [
			'id' => 'creationDateSelection',
			'class' => 'floatInput',
			'type' => 'select',
			'options' => ['', 'since', 'before', 'between'],
			'templateVars' => ['state' => 'hidden', 'float' => 'floatContainer'],
			'label' => ['text' => 'Rule'],
			'disabled' => true
		]);
		echo $this->Form->control('creationDateSince', [
			'id' => 'creationDateSinceInput',
			'class' => 'floatInput',
			'type' => 'text',
			'templateVars' => ['state' => 'hidden', 'float' => 'floatContainer'],
			'label' => ['text' => 'Date (DD-MM-AAAA)'],
			'disabled' => true
		]);
		echo $this->Form->control('creationDateBefore', [
			'id' => 'creationDateBeforeInput',
			'class' => 'floatInput',
			'type' => 'text',
			'templateVars' => ['state' => 'hidden', 'float' => 'floatContainer'],
			'label' => ['text' => 'Date (DD-MM-AAAA)'],
			'disabled' => true
		]);
		echo $this->Form->control('creationDateBetweenMin', [
			'id' => 'creationDateBetweenMinInput',
			'class' => 'floatInput',
			'type' => 'text',
			'templateVars' => ['state' => 'hidden', 'float' => 'floatContainer'],
			'label' => ['text' => 'Date (DD-MM-AAAA)'],
			'disabled' => true
		]);
		echo $this->Form->control('creationDateBetweenMax', [
			'id' => 'creationDateBetweenMaxInput',
			'class' => 'floatInput',
			'type' => 'text',
			'templateVars' => ['state' => 'hidden', 'float' => 'floatContainer'],
			'label' => ['text' => 'And (DD-MM-AAAA)'],
			'disabled' => true
		]);
		echo $this->Form->control('age', [
			'id' => 'ageSelection',
			'class' => 'floatInput',
			'type' => 'select',
			'options' => ['', 'younger than', 'older than', 'between'],
			'templateVars' => ['state' => 'hidden', 'float' => 'floatContainer'],
			'label' => ['text' => 'Rule'],
			'disabled' => true
		]);
		echo $this->Form->control('ageYounger', [
			'id' => 'ageYoungerInput',
			'class' => 'floatInput',
			'type' => 'text',
			'templateVars' => ['state' => 'hidden', 'float' => 'floatContainer'],
			'label' => ['text' => 'Value'],
			'disabled' => true
		]);
		echo $this->Form->control('ageOlder', [
			'id' => 'ageOlderInput',
			'class' => 'floatInput',
			'type' => 'text',
			'templateVars' => ['state' => 'hidden', 'float' => 'floatContainer'],
			'label' => ['text' => 'Value'],
			'disabled' => true
		]);
		echo $this->Form->control('ageBetweenMin', [
			'id' => 'ageBetweenMinInput',
			'class' => 'floatInput',
			'type' => 'text',
			'templateVars' => ['state' => 'hidden', 'float' => 'floatContainer'],
			'label' => ['text' => 'Value'],
			'disabled' => true
		]);
		echo $this->Form->control('ageBetweenMax', [
			'id' => 'ageBetweenMaxInput',
			'class' => 'floatInput',
			'type' => 'text',
			'templateVars' => ['state' => 'hidden', 'float' => 'floatContainer'],
			'label' => ['text' => 'And'],
			'disabled' => true
		]);
		echo $this->Form->control('gender', [
			'id' => 'genderSelection',
			'class' => 'floatInput',
			'type' => 'select',
			'options' => ['', 'woman', 'man', 'both'],
			'templateVars' => ['state' => 'hidden', 'float' => 'floatContainer'],
			'disabled' => true
		]);
		echo $this->Form->control('rating', [
			'id' => 'ratingSelection',
			'class' => 'floatInput',
			'type' => 'select',
			'options' => ['', 'is', 'higher than', 'lower than', 'between'],
			'templateVars' => ['state' => 'hidden', 'float' => 'floatContainer'],
			'label' => ['text' => 'Rule'],
			'disabled' => true
		]);
		echo $this->Form->control('ratingEqualTo', [
			'id' => 'ratingEqualToInput',
			'class' => 'floatInput',
			'type' => 'text',
			'templateVars' => ['state' => 'hidden', 'float' => 'floatContainer'],
			'label' => ['text' => 'Value'],
			'disabled' => true
		]);
		echo $this->Form->control('ratingHigherThan', [
			'id' => 'ratingHigherThanInput',
			'class' => 'floatInput',
			'type' => 'text',
			'templateVars' => ['state' => 'hidden', 'float' => 'floatContainer'],
			'label' => ['text' => 'Value'],
			'disabled' => true
		]);
		echo $this->Form->control('ratingLowerThan', [
			'id' => 'ratingLowerThanInput',
			'class' => 'floatInput',
			'type' => 'text',
			'templateVars' => ['state' => 'hidden', 'float' => 'floatContainer'],
			'label' => ['text' => 'Value'],
			'disabled' => true
		]);
		echo $this->Form->control('ratingBetweenMin', [
			'id' => 'ratingBetweenMinInput',
			'class' => 'floatInput',
			'type' => 'text',
			'templateVars' => ['state' => 'hidden', 'float' => 'floatContainer'],
			'label' => ['text' => 'Value'],
			'disabled' => true
		]);
		echo $this->Form->control('ratingBetweenMax', [
			'id' => 'ratingBetweenMaxInput',
			'class' => 'floatInput',
			'type' => 'text',
			'templateVars' => ['state' => 'hidden', 'float' => 'floatContainer'],
			'label' => ['text' => 'And'],
			'disabled' => true
		]);
		echo $this->Form->control('artist', [
			'id' => 'artistInput',
			'class' => 'floatInput',
			'type' => 'text',
			'templateVars' => ['state' => 'hidden', 'float' => 'floatContainer'],
			'disabled' => true
		]);
		?>
        </div>
		<?= $this->Form->button('Add filter', ['id' => 'filterButton', 'type' => 'button']) ?>
		<div id='filterList'></div>
	</fieldset>
	
	<fieldset>
		<legend><?= __('Mail creation') ?></legend>
	<?= $this->Form->control('to', [
		'default' => $mailList
	]) ?>
	<?= $this->Form->control('subject') ?>
	<?= $this->Form->control('title') ?>
	<?= $this->Form->control('message') ?>
	<?= $this->Form->control('image', ['type' => 'file']) ?>
	</fieldset>
	
	<?= $this->Form->button('Send') ?>
    <?= $this->Form->end() ?>
    
    <? ( isset($toDebug) ? debug($toDebug) : '') ?>

</div>