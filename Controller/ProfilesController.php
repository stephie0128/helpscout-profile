<?php

class ProfilesController extends AppController {
    
    public function beforeFilter() {
       parent::beforeFilter();
       $this->Profile->primaryKey = "profile_id";
    }
    
    public function index() {
        $this->layout = 'datatables';
		$profiles = $this->Profile->find('all');
		$this->set('profiles', $profiles);
    }
 
 
 	public function create() {
 		$this->layout = 'admin';
		if ($this->request->is('post')) {
        	if ($this->Profile->save($this->request->data)) {
            	$this->Session->setFlash(1);
            	return $this->redirect(array('controller' => 'profiles', 'action' => 'create'));
			}
		}
 	} 
	
	public function update($profileId) {
	    
		$this->layout = 'admin';
        
        if(!empty($profileId)) {
            if ($this->request->is('post')) {
                $data = $this->request->data;
                if ($this->Profile->save($data)) {
                    $this->Session->setFlash(1);
                }
            }
            $profile = $this->Profile->find('first', array(
            'conditions' => array('profile_id' => $profileId)));
            $this->set('profile', $profile);
        }
		
	}
    
    public function delete($profileId) {
        
        if(!empty($profileId)) {
            $this->Profile->delete($profileId);
            $this->Session->setFlash('1');
            return $this->redirect(array('controller' => 'profiles', 'action' => 'index'));
        }
    }
    
    public function similar() {
        $this->layout = 'datatables';
        //$profiles = $this->Profile->find('all');
        //$this->set('profiles', $profiles);
        $profileNames = $this->Profile->query("
              SELECT profile_id, first_name, last_name,
              COUNT(first_name) AS numOccurences
              FROM profiles
              GROUP BY first_name,last_name
              HAVING ( COUNT(first_name) > 1 )");
        var_dump($profileNames);      
        $profileNumbers = $this->Profile->query("
            SELECT profile_id, phone_number,
            COUNT(phone_number) as numOccurences
            FROM profiles
            GROUP BY phone_number
            HAVING ( COUNT(phone_number) > 1)");
        
        var_dump($profileNumbers);
        exit();
    }     
}
    