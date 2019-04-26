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
						->addField('message', 'text')
						->addField('image', ['type' => 'file']); //options doesn't work, had to put it also in the view. Cakephp bug ?
	}
	
	protected function _buildValidator(Validator $validator) {
		$validator	->requirePresence(['to'])
					->notEmpty(['to'])
					->requirePresence('subject', true, 'The subject needs to be present')
					->minLength('subject', 5, 'Subject must be at least 5 characters long. Be creative !');
		
		return $validator;
	}
	
	protected function _execute(array $data) {
		$attachments = [
			'hoot_logo_mark_500.jpg' => [
				'file' => 'img/mail/hoot_logo_mark_500.jpg',
				'mimetype' => 'image/jpeg',
				'contentId' => 'hootlogo',
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
			];
		
		if($data['image']['error'] == 0) {
			move_uploaded_file($data['image']['tmp_name'], WWW_ROOT.'/img/mail/'.$data['image']['name']);
			$attachments['attachedimage'] = [
				'file' => 'img/mail/'.$data['image']['name'],
				'mimetype' => $data['image']['type'],
				'contentId' => 'attachedimage',
				'contentDisposition' => 'inline'
			];
		}
		foreach($data['to'] as $mailAddress) {
        	$email = new Email('default');
			$email	->setTo($mailAddress)
					->template('view', 'image')
					->emailFormat('html')
					->attachments($attachments);
			
			if($data['image']['error'] == 0) {
				$email->viewVars(['attachedimage' => true]);
			} else {
				$email->viewVars(['attachedimage' => false]);
			}
						
			$email  ->setViewVars(['title' => $data['title']])
					->setSubject($data['subject'])
					->send($data['message']);
		}
        return true;
    }
}