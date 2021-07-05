<?php

namespace View;

session_start();

class Loader {
	public static function make() {
		$twig = new \Twig\Environment(new \Twig\Loader\FilesystemLoader(dirname(__FILE__)), array('cache' => false));
		return $twig;
	}
}
