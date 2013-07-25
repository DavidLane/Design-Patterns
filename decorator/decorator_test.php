<?php

interface Pizza {
	public function bakePizza();
}

class BasicPizza implements Pizza {
	public function bakePizza() {
		return "Basic Pizza";
	}
}

abstract class PizzaDecorator implements Pizza {
	protected $_pizza;
	
	public function __construct(Pizza $newPizza) {
		$this->_pizza = $newPizza;
	}
	
	public function bakePizza() {
		return $this->_pizza->bakePizza();
	}

}

class ChickenTikkaPizza extends PizzaDecorator {
	public function __construct(Pizza $newPizza) {
		parent::__construct($newPizza);
	}
	
	public function bakePizza() {
		return $this->_pizza->bakePizza()." with Chicken Tikka topping added";
	}
}

$basicPizza = new BasicPizza();
echo $basicPizza->bakePizza()."\n";

$chickenTikkaPizza = new ChickenTikkaPizza($basicPizza);
echo $chickenTikkaPizza->bakePizza()."\n";

