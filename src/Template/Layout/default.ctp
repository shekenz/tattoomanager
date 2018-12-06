<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'Heart Of Oak Tattoo Manager';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

	<?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('style.css') ?>
	
    <?= $this->Html->css('https://use.fontawesome.com/releases/v5.3.1/css/solid.css', [
		'integrity' => 'sha384-VGP9aw4WtGH/uPAOseYxZ+Vz/vaTb1ehm1bwx92Fm8dTrE+3boLfF1SpAtB1z7HW',
		'crossorigin' => 'anonymous'
	]) ?>
	<?= $this->Html->css('https://use.fontawesome.com/releases/v5.3.1/css/fontawesome.css', [
		'integrity' => 'sha384-1rquJLNOM3ijoueaaeS5m+McXPJCGdr5HcA03/VHXxcp2kX2sUrQDmFc3jR5i/C7',
		'crossorigin' => 'anonymous'
	]) ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    
</head>
<body>
	<? if (!$nonav) :?>
    <nav class="top-bar expanded" data-topbar role="navigation">
        <div class="title-area large-2 medium-3 columns menu-title">
	        <h3><?//= $this->Html->link('<i class="fas fa-bars"></i>', [], ['escape' => false]); ?>
	                <?= $this->Html->link($this->fetch('title'), [
	                'controller' => $this->name, 'action' => 'index'
	            ]) ?>
	        </h3>
        </div>
        <div class="top-bar-section">
            <?= $cakeDescription ?>
        </div>
    </nav>
    <? endif; ?>
    <? //debug($this); ?>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
	
	<?= $this->Html->script('foundation/vendor/what-input.js', [ 'type' => 'text/javascript']) ?>
	<?= $this->Html->script('foundation/vendor/foundation.js', [ 'type' => 'text/javascript']) ?>
	<?= $this->Html->script('foundation/app.js', [ 'type' => 'text/javascript']) ?>
    <?= $this->Html->script('main.js', [ 'type' => 'text/javascript']) ?>
    

</body>
</html>
