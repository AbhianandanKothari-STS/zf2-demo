<?php

namespace Users\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\EventManager\EventManager;
use Zend\EventManager\EventManagerAwareInterface;
use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\SharedEventManager;
use TestClass\UserMapperTest;

class TestController extends AbstractActionController implements EventManagerAwareInterface
{

	protected $events;

	function __construct()
	{
// 		$test = new UserMapperTest();
// 		$test->listenEvent();
		$this->indexAction();
	}
	public function indexAction()
	{
		$events = new EventManager();
		$events->attach('do', function ($e) {
			$event = $e->getName();
			$params = $e->getParams();
			printf(
				'Handled event "%s", with parameters %s',
				$event,
				json_encode($params)
			);
		});

		$params = array('foo' => 'bar', 'baz' => 'bat');
		$events->trigger('do', null, $params);exit;
	}

	public function setEventManager(EventManagerInterface $events)
	{
		$this->events = $events;
	}

	public function getEventManager()
	{
		if (!$this->events) {
			$this->setEventManager(new EventManager());
		}
		return $this->events;
	}

	public function getSharedEventManager()
	{
		if (!$this->events) {
			$this->setEventManager(new EventManager(__CLASS__));
		}
		return $this->events;
	}

	public function doEvent($foo, $baz)
	{
		$params = compact('foo', 'baz');
		$this->getEventManager()->trigger(__FUNCTION__, $this, $params);
	}

	public function doSharedEvent($foo, $baz)
	{
		$params = compact('foo', 'baz');
		$this->getSharedEventManager()->trigger(__FUNCTION__, $this, $params);
	}

	public function eventAction(){
		$this->getEventManager()->attach('doEvent', function($e) {
			$event  = $e->getName();
			$target = get_class($e->getTarget());
			$params = $e->getParams();
			printf(
				'Handled event "%s" on target "%s", with parameters %s',
				$event,
				$target,
				json_encode($params)
			);
		});

		$this->doEvent('bar', 'bat');
	}

	public function sharedEventAction(){
		$sharedEvent = new SharedEventManager;
		$this->getEventManager()->attach(__CLASS__, 'doSharedEvent', function ($e) {
			$event  = $e->getName();
			$target = get_class($e->getTarget());
			$params = $e->getParams();
			printf(
				'Handled event "%s" on target "%s", with parameters %s',
				$event,
				$target,
				json_encode($params)
			);
		});

		$this->getEventManager()->setSharedManager($sharedEvent);
		$this->doSharedEvent('bar', 'bat');
	}

	/* public function simpleAction()
	{
		$userMap = new UserMapperTest;exit;
	} */


}