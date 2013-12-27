<?php
use Zend\EventManager\EventManager;

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
$events->trigger('do', null, $params);