<?php

// Custom tattoo table by Shekenz

namespace App\Model\Table;

use Cake\ORM\Table;

class TattoosTable extends Table {
	
	public function initialize(array $config) {
		$this->setTable('tattoos'); // by default, not necessary
	}
	
}