<div class="form large-4 large-centered medium-4 medium-centered columns content">
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Login') ?></legend>
        <?= $this->Form->control('username'); ?>
        <?= $this->Form->control('password'); ?>
    </fieldset>
    <?= $this->Form->button(__('Login')); ?>
    <?= $this->Form->end(); ?>
</div>
