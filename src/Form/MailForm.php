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
						->addField('subject', 'string')
						->addField('title', 'string')
						->addField('message', 'text');
	}
	
	protected function _buildValidator(Validator $validator) {
		$validator	->requirePresence(['to'])
					->notEmpty(['to'])
					->requirePresence('subject', true, 'The subject needs to be present')
					->minLength('subject', 5, 'Subject must be at least 5 characters long. Be creative !');
		
		return $validator;
	}
	
	protected function _execute(array $data) {
		foreach($data['to'] as $mailAddress) {
        	$email = new Email('default');
			$email	->setTo($mailAddress)
					->template('view', 'christmas')
					->emailFormat('html')
					->attachments([
						'christmas_card.jpg' => [
							'file' => 'img/mail/christmas_card.jpg',
							'mimetype' => 'image/jpeg',
							'contentId' => 'christmascard',
							'contentDisposition' => 'inline'
							],
						'instagram-logo.png' => [
							'file' => 'img/mail/instagram-logo.png',
							'mimetype' => 'image/png',
							'contentId' => 'instalogo',
							'contentDisposition' => 'inline'
							],
						'facebook-logo.png' => [
							'file' => 'img/mail/facebook-logo.png',
							'mimetype' => 'image/png',
							'contentId' => 'fblogo',
							'contentDisposition' => 'inline'
							]
						])
					->setViewVars(['title' => $data['title']])
					->setSubject($data['subject'])
					->send($data['message']);
		}
        return true;
    }
}