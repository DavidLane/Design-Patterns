<?php

abstract class Character {
	protected $_weapon_behavior;
	protected $_title;
	
	public function __construct($title) {
		$this->_title = $title;
	}
	
	public function fight() {
		echo $this->getTitle()." says: ".$this->getWeapon()->useWeapon();
	}
	
	protected function setWeapon(WeaponBehavior $weapon_behavior) {
		$this->_weapon_behavior = $weapon_behavior;
	}
	
	protected function getWeapon() {
		return $this->_weapon_behavior;
	}
	
	protected function getTitle() {
		return $this->_title;
	}
}

interface WeaponBehavior {
	public function useWeapon();
}

class KnifeBehavior implements WeaponBehavior {
	public function useWeapon() {
		return "Fear the blade of my knife!\n";
	}
}

class SwordBehavior implements WeaponBehavior {
	public function useWeapon() {
		return "My sword hath cut down many a foe, and you shall be next!\n";
	}
}

class LanceBehavior implements WeaponBehavior {
	public function useWeapon() {
		return "Lances4lyf!\n";
	}
}

class King extends Character {
	public function __construct() {
		parent::__construct("King Arthur");
		$this->setWeapon(new SwordBehavior());
	}
}

class Queen extends Character {
	public function __construct() {
		parent::__construct("Queen Elizabeth I");		
		$this->setWeapon(new KnifeBehavior());
	}
}

class Knight extends Character {
	public function __construct() {
		parent::__construct("Sir Lancelot");		
		$this->setWeapon(new LanceBehavior());
	}
}

$queen = new Queen();
$king = new King();
$knight = new Knight();

$queen->fight();
$king->fight();
$knight->fight();