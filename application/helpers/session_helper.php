<?php

if (!function_exists('setSession')) {
	function setSession($key, $value) {
		$_SESSION[$key] = $value;
	}
}

if (!function_exists('hasSession')) {
	function hasSession($key): bool
	{
		return isset($_SESSION[$key]);
	}
}

if (!function_exists('getSession')) {
	function getSession($key)
	{
		if (isset($_SESSION[$key])) {
			$value = $_SESSION[$key];
			unset($_SESSION[$key]);
			return $value;
		}
		return null;
	}
}

if (!function_exists('hasMessage')) {
	function hasMessage(): bool {
		return hasSession('message');
	}
}

if (!function_exists('setMessage')) {
	function setMessage($message) {
		setSession('message', $message);
	}
}

if (!function_exists('getMessage')) {
	function getMessage() {
		return getSession('message');
	}
}

if (!function_exists('isLogin')) {
	function isLogin() {
		return hasSession('email');
	}
}

if (!function_exists('logout')) {
	function logout() {
		unset($_SESSION['nama']);
		unset($_SESSION['email']);
	}
}


