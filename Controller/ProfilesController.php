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
                $lastInsertId =  $this->Profile->getLastInsertID();
            	return $this->redirect(array('controller' => 'profiles', 'action' => 'create', 
            	                       '?' => array('lastId' => $lastInsertId)));
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
        
        $duplicateProfiles = array();
        $profiles = array();
        $returnedProfiles = array();
        
        $phoneNumberDuplicates = $this->Profile->query("
            SELECT Profile.profile_id, Profile.first_name, Profile.last_name, Profile.address_1, 
                   Profile.phone_number, Profile.email
            FROM profiles Profile
            INNER JOIN (
                SELECT phone_number, COUNT(*)
                FROM profiles
                GROUP BY phone_number
                HAVING COUNT(*) > 1) temp 
                ON temp.phone_number =  Profile.phone_number
                ORDER BY phone_number
            ");
   
       
        $profileDuplicates = $this->Profile->query("
            SELECT Profile.profile_id, Profile.first_name, Profile.last_name, Profile.address_1, 
                   Profile.phone_number, Profile.email
            FROM profiles Profile
            INNER JOIN (
                SELECT first_name, last_name, address_1, COUNT(*)
                FROM profiles
                GROUP BY first_name, last_name, address_1, city, state
                HAVING COUNT(*) > 1) temp 
                ON temp.first_name =  Profile.first_name
                AND temp.last_name = Profile.last_name
                AND temp.address_1 = Profile.address_1
                ORDER BY first_name, last_name, address_1
            ");
   
        $duplicateProfiles = array_merge($phoneNumberDuplicates, $profileDuplicates);
        
        ## From the two queries ran above filter out 
        ## dupliate profile_id's
        $profileIds = array();
        foreach($duplicateProfiles as $key => $profiles) {
            foreach ($profiles as $profile) {
                $profileId = $profile['profile_id'];
                if(in_array($profileId, $profileIds)) {
                    continue;
                } else {    
                    $profileIds[] = $profile['profile_id'];
                    $returnedProfiles[]['Profile'] = $profile;
                }
            }
        }
        
        $this->set('profiles', $returnedProfiles);
      
    }     
}
    