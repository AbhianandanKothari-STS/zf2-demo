<?php
namespace TestClass;

use Zend\EventManager\EventManager;
use Zend\EventManager\EventInterface;
use TestClass\UserMapper;

class UserMapperTest
{
	public function listenEvent()
	{
		$user_mapper = new UserMapper();
		$user_mapper->setEventManager(new EventManager());

		$user_mapper->getEventManager()->attach('register.pre', function($event) {
			echo "here";exit;
		// 	$logger = new Zend\Log\Logger();
		// 	$logger->addWriter(new Zend\Log\Writer\Stream('php://output'));

		// 	$logger->log(Zend\Log\Logger::INFO, 'A user with the ID: ' . $event->getParam('user')->getUserID() . ' has registered');
			echo "A user with the ID: ".$event->getParams()." has registered";
		});
	}
}
