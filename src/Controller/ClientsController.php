<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;
use Session;
use App\Form\MailForm;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Core\Configure;

/**
 * Clients Controller
 *
 * @property \App\Model\Table\ClientsTable $Clients
 *
 * @method \App\Model\Entity\Client[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ClientsController extends AppController
{
	
	public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->Auth->allow('safeAdd');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()  //------------------------------------------------------------------------------------------------- INDEX
    {
	    
	    $users = TableRegistry::getTableLocator()
	    	->get('Users')
	    	->find()
	    	->select(['id', 'username'])
	    	->order(['username' => 'DESC']);
	    	
	    $userList = array();
	    foreach($users AS $user) {
		    $userList[$user['id']] = $user['username'];
	    }
	    $this->set('userList', $userList);
	    
        $clients = $this->paginate($this->Clients, [
        	'order' => [
            'Clients.creationdate' => 'desc'
        ]]);
        $this->set(compact('clients'));
    }

    /**
     * View method
     *
     * @param string|null $id Client id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)  //----------------------------------------------------------------------------------------- VIEW
    {
        $client = $this->Clients->get($id, [
            'contain' => []
        ]);

        $this->set('client', $client);
    }
    
    /**
     * CSV method
     * 
     * Save client list in CSV
     */

    public function export() //------------------------------------------------------------------------------------------------ EXPORT
    {

	    $this->viewBuilder()->setClassName('CsvView.Csv');
	    
	    $users = TableRegistry::getTableLocator()
	    	->get('Users')
	    	->find()
	    	->select(['id', 'username'])
	    	->order(['username' => 'DESC']);
	    	
	    $userList = array();
	    foreach($users AS $user) {
		    $userList[$user['id']] = $user['username'];
	    }
	    
	    $query = $this->Clients->find('all', ['fields' => ['id', 'firstname', 'name', 'phone', 'email', 'birthdate', 'gender', 'user_id']])	
					->order(['name' => 'ASC'])
					->order(['firstname' => 'ASC']);
	
	    $data = [];
	    $_serialize = 'data';
	    $_header = ['id', 'lastname', 'firstname', 'phone', 'email','bday (YYYY-MM-DD)', 'age', 'gender', 'artist'];
	    
		foreach ($query as $client) {
			if($client->gender) {
				$gender = 'M';
			} else {
				$gender = 'W';
			}
			
			if(array_key_exists($client->user_id, $userList)) {
			            $artist = $userList[$client->user_id];
		            } else {
			            $artist = 'None';
		            }
			
			// Calculating Age
			$then = \DateTime::createFromFormat("n/j/y", $client->birthdate);
			$diff = $then->diff(new \DateTime());
			$age = $diff->format("%y");
			
			array_push($data, [
				$client->id,
				$client->name,
				$client->firstname,
				$client->phone,
				$client->email,
				$then->format('Y-m-d'),
				$age,
				$gender,
				$artist
				]);
		}
		
		$this->set(compact('data', '_serialize', '_header'));
	}

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()  //----------------------------------------------------------------------------------------------------- ADD
    {	    
        $client = $this->Clients->newEntity();
        
        $users = TableRegistry::getTableLocator()
	    	->get('Users')
	    	->find()
	    	->select(['id', 'username'])
			->where(['artist =' => 1])
	    	->order(['username' => 'DESC']);
	    	
	    $userList = array();
	    foreach($users AS $user) {
		    $userList[$user['id']] = $user['username'];
	    }
		    
		$this->set('userList', $userList);
        
        if ($this->request->is('post')) {
            $client = $this->Clients->patchEntity($client, $this->request->getData());
            if ($this->Clients->save($client)) {
                $this->Flash->success(__('The client has been saved.'));

                return $this->redirect($this->request->session()->read('referer'));
            }
            if (Configure::read('debug')) {
	            $this->Flash->error(__('ERROR : '.print_r($client->errors(), true)));
	        } else {
		        $this->Flash->error(__('The client could not be saved. Please, try again.'));
			}
        } else {
	        
	        
	        
	        $this->request->session()->write('referer', $this->referer());
        }
        $this->set(compact('client'));
    }

	public function safeAdd()  //-------------------------------------------------------------------------------------------- SAFE ADD
    {
		$client = $this->Clients->newEntity();
        if ($this->request->is('post')) {
            $client = $this->Clients->patchEntity($client, $this->request->getData());
            if ($this->Clients->save($client)) {
                $this->Flash->success(__('The client has been saved.'));

                return $this->redirect($this->request->session()->read('referer'));
            }
            if (Configure::read('debug')) {
	            $this->Flash->error(__('ERROR : '.print_r($client->errors(), true)));
	        } else {
		        $this->Flash->error(__('The client could not be saved. Please, try again.'));
			}
        } else {
	        $this->request->session()->write('referer', $this->referer());
        }
        $this->set(compact('client'));
	    
	}
    /**
     * Edit method
     *
     * @param string|null $id Client id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)  //----------------------------------------------------------------------------------------- EDIT
    {
        $client = $this->Clients->get($id, [
            'contain' => []
        ]);
        
        $users = TableRegistry::getTableLocator()
	    	->get('Users')
	    	->find()
	    	->select(['id', 'username'])
			->where(['artist =' => 1])
	    	->order(['username' => 'DESC']);
	    	
	    $userList = array();
	    foreach($users AS $user) {
		    $userList[$user['id']] = $user['username'];
	    }
		    
		$this->set('userList', $userList);
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $client = $this->Clients->patchEntity($client, $this->request->getData());
            if ($this->Clients->save($client)) {
                $this->Flash->success(__('The client has been saved.'));

                return $this->redirect($this->request->session()->read('referer'));
            }
            if (Configure::read('debug')) {
	            $this->Flash->error(__('ERROR : '.print_r($client->errors(), true)));
	        } else {
		        $this->Flash->error(__('The client could not be saved. Please, try again.'));
			}
        } else {
	        $this->request->session()->write('referer', $this->referer());
        }
        
        $this->set(compact('client'));
        //$this->set('referer', $this->referer());
    }

    /**
     * Delete method
     *
     * @param string|null $id Client id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)  //------------------------------------------------------------------------------------- DELETE
    {
        $this->request->allowMethod(['post', 'delete']);
        $client = $this->Clients->get($id);
        if ($this->Clients->delete($client)) {
            $this->Flash->success(__('The client has been deleted.'));
        } else {
            $this->Flash->error(__('The client could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    public function groupMailing($id = null)  //------------------------------------------------------------------------ GROUP MAILING
    {
	    $mail = new MailForm();
	    
	    if($this->request->is('get')) {
		    if($id) {
			    $query = $this->Clients->find()->where(['Clients.id =' => $id]);
		    }
		    else {
				$query = $this->Clients->find('all', ['fields' => ['id', 'email', 'name', 'firstname']])	
					->where(['Clients.email !=' => '' ])
					->order(['firstname' => 'ASC'])
					->order(['name' => 'ASC']);
			}
	        
			$clients = $query->toArray();			
			
			$mailList = '';
			foreach($clients as $client) {		
				$mailList .= $client->email.', ';
			}
			$mailList = rtrim($mailList, ', ');
	
	        $this->set('clients', $clients);
	        $this->set('mailList', $mailList);
		}
	    
	    if($this->request->is('post')) {
		    $dataReceived = $this->request->getData();

		    // $mailList cleaning
		    $mailListArray = explode(',', $dataReceived['to']);
		    foreach($mailListArray as $index => $item) {
			    $mailListArray[$index] = trim($item);
		    }
		    while($key = array_search('', $mailListArray)) {
				unset($mailListArray[$key]);
			}
			$mailListArray = array_values($mailListArray);
			// ------------------------
		    
		    $this->set('mailList', $dataReceived['to']);
		    $dataReceived['to'] = $mailListArray;
		    
		    if($mail->execute($dataReceived)) {
			    $this->Flash->success('Mail successfully sent');
			    return $this->redirect(['action' => 'index']);
		    } else {
			    $this->Flash->error('Mail couldn\'t be sent');
		    }
		    
	    }
	$this->set('mail', $mail);
    }
}
