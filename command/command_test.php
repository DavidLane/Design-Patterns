<?php

interface Command {
  public function execute();
}

class CommandConcrete {
	public function execute() {
		
	}
}

abstract class Retreiver {
	public function Open() {
		echo "Document Opened\n";
	}
	
	public function Save() {
		echo "Document Saved\n";		
	}
}