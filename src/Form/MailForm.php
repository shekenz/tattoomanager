<?php

namespace App\Form;

use Cake\Form\Form;
use Cake\Form\Schema;
use Cake\Validation\Validator;
use Cake\Mailer\Email;

class MailForm extends Form
{
	
	protected function _buildSchema(Schema $schema) {
		return $schema	->addField('to', 'string')
						->addField('title', 'string')
						->addField('message', 'text');
	}
	
	protected function _buildValidator(Validator $validator) {
		$validator	->requirePresence(['message', 'to'])
					->notEmpty(['to'])
					->requirePresence('title', true, 'The title needs to be present')
					->minLength('title', 5, 'Title must be at least 5 characters long. Be creative !');
		
		return $validator;
	}
	
	protected function _execute(array $data) {
		foreach($data['to'] as $mailAddress) {
        	$email = new Email('default');
			$email	->setTo($mailAddress)
					->setSubject($data['title'])
					->send($data['message']);
		}
        return true;
    }
}