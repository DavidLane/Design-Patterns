<?php

class Mediator {
    protected $events = array();
    public function attach($eventName, $callback) {
        if (!isset($this->events[$eventName])) {
            $this->events[$eventName] = array();
        }
        $this->events[$eventName][] = $callback;
    }
    public function trigger($eventName, $data = null) {
        foreach ($this->events[$eventName] as $callback) {
            $callback($eventName, $data);
        }
    }
}
$mediator = new Mediator;
$mediator->attach('load', function() { echo "Loading\n"; });
$mediator->attach('stop', function() { echo "Stopping\n"; });
$mediator->attach('stop', function() { echo "Stopped\n"; });
$mediator->trigger('load');
$mediator->trigger('stop');