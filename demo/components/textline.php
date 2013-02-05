#!/usr/bin/env php
<?php

define('NCURSES_LOG', '/tmp/test.log');

require_once(__DIR__ . '/../../libs/autoloader.class.php');

use \org\octris\ncurses as ncurses;

class win extends ncurses\container\window {
	protected function setup() {
		$this->addChild(new ncurses\component\textline(
			0, 0, 16, 'test'
		));
	}
}

class test extends ncurses\app {
	protected $win;

	protected function setup() {
		$this->win = $this->addChild(new win(18, 3, 5, 5));

	}

	protected function main() {
		$this->win->show();
	}
}

test::getInstance()->run();