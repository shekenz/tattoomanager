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

//$this->layout = 'home';
//debug($this->layout)
$this->name = 'Clients';
$this->assign('title', $this->name);

?>

<div class="index large-12 medium-12 columns content">
	<?= $this->Html->link('<i class="fas fa-plus-circle"></i>', ['controller' => 'clients', 'action' => 'add'], ['class' =>' bigass incenter', 'escape' => false]) ?>
	<br />
	<?= $this->Html->link('Go to client list', ['controller' => 'clients', 'action' => 'index'], ['class' => 'incenter']) ?>
</div>