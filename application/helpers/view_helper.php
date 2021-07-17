<?php

if (!function_exists('asset')) {
	function asset($url): string {
		return base_url("public/assets/$url");
	}
}

if (!function_exists('upload')) {
	function upload($url): string {
		return base_url("public/uploads/$url");
	}
}

if (!function_exists('view')) {
	function view($view, $data = []) {
		$ci =& get_instance();
		$ci->load->view('components/header', $data);
		$ci->load->view('components/sidebar');
		$ci->load->view("pages/$view");
		$ci->load->view('components/footer');
	}
}

if (!function_exists('guestView')) {
	function guestView($view, $data = []) {
		$ci =& get_instance();
		$ci->load->view('guest_components/header', $data);
		$ci->load->view("pages/$view");
		$ci->load->view('guest_components/footer');
	}
}

if (!function_exists('authView')) {
	function authView($view, $data = []) {
		$ci =& get_instance();
		$ci->load->view('auth_components/header', $data);
		$ci->load->view("pages/$view");
		$ci->load->view('auth_components/footer');
	}
}

if (!function_exists('sidebar')) {
	function sidebar($active, $sidebars = []): string
	{
		return in_array($active, $sidebars) ? "active menu-open" : '';
	}
}

if (!function_exists('isInvalid')) {
	function isInvalid($name): string
	{
		return form_error($name) ? 'has-error' : '';
	}
}

if (!function_exists('validate')) {
	function validate($name): string
	{
		return "<span class='error invalid-feedback'>" . form_error($name) . "</span>";
	}
}

if (!function_exists('selected')) {
	function selected($data, $value): string
	{
		return $data == $value ? 'selected' : '';
	}
}

if (!function_exists('status')) {
	function status($data, $positive, $negative, $neutral='Menunggu'): string
	{
		$color = $data == null ? 'warning' : ($data ? 'success' : 'danger') ;
		$status = $data == null ? $neutral : ($data ? $positive : $negative) ;

		return "<span class='badge badge-{$color}'>$status</span>";
	}
}

if (!function_exists('isbn')) {
	function isbn($isbn): string
	{
		$kata = str_split($isbn);
	
		array_splice($kata, 3, 0, '-');
		array_splice($kata, 7, 0, '-');
		array_splice($kata, 13, 0, '-');
		array_splice($kata, 15, 0, '-');
	
		return implode($kata);
	}
}

