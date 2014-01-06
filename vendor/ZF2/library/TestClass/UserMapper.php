<?php
namespace TestClass;

use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\EventManager;
use Zend\EventManager\EventManagerAwareInterface;

class UserMapper implements EventManagerAwareInterface {
	public function setEventManager(EventManagerInterface $events) {
		/* ... */
		$this->events = $events;
	}

	public function getEventManager() {
		/* ... */
		if (!$this->events) {
			$this->setEventManager(new EventManager());
		}
		return $this->events;
	}

	public function register() {
		$this->getEventManager()->trigger(__function__ . '.pre', $this, array(‘user’ => 'user1'));
	}
}
