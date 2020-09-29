

<?php

class EventDispatcher implements SplSubject{

	private $observers, $value;
        public $id  ; 
	
	public function __construct(){
		$this->observers = array();
	}
	
	public function attach(SplObserver $observer){
		$this->observers[] = $observer;
	}
	
	public function detach(SplObserver $observer){
		if($idx = array_search($observer, $this->observers, true)){
			unset($this->observers[$idx]);
		}
	}
	
	public function notify(){
		foreach($this->observers as $observer){
			$observer->update($this);
		}
	}
	
	public function setValue($value){
		$this->value = $value;
		$this->notify();
	}
	
	public function getValue(){
		return $this->value;
	}

        public function createUser() {
		$this->id = rand(0,10000) ;  
                $this->notify();
	}
}



class Listenner implements SplObserver {

    public function __construct()
    {
        print "Add new Event ".rand(0,1000)."\n" ;
    }

    public function update(SplSubject $subject){
		//echo 'This is the value :- '. $subject->getValue();
		print "Listtener for id :".$subject->id  ; 
	}
	
}

$subject = new EventDispatcher();  
$observer1 = new Listenner();
$subject->attach($observer1);
$subject->createUser() ; 

  
?> 

