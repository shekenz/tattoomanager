<?php

namespace App\Form;

use Cake\Form\Form;
use Cake\Form\Schema;
use Cake\Validation\Validator;
use Cake\Mailer\Email;

class MailForm extends Form
{
	
	protected function _buildSchema(Schema $schema) {
		return $schema->addField('to', 'string')->addField('title', 'string')->addField('message', 'text');
	}
	
	protected function _buildValidator(Validator $validator) {
		$validator	->requirePresence(['to', 'message'])
					->requirePresence('title', true, 'The title needs to be present')
					->email('to', 'false', 'Must be a valid email')
					->minLength('title', 5, 'Title must be at least 5 characters long. Be creative !');
		
		return $validator;
	}
	
	protected function _execute(array $data) {
        	$email = new Email('shekenz');
			$email	->setSender('heartofoaktattoo@gmail.com')
					->setTo($data['to'])
					->setSubject($data['title'])
					->send($data['message']);
        return true;
    }
}