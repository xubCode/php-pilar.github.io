<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');



/**
 * cek role pemagang dan administrator
 *
 * @access	public
 * @param	string	role id
 * @return	boolean 
 */

if (! function_exists('_cekRolePemagangAndAdm') ) {
	
	function _cekRolePemagangAndAdm($id_role)
	{
		// ambil CodeIgniter Object
		$ci = get_instance();
		
		if ($id_role == 1) {
			$data['judul'] = 'LPK MIM | 404';
			$ci->load->view('template/userHeader', $data);
			$ci->load->view('template/topbar');
			$ci->load->view('template/sidebar');
			$ci->load->view('errors/404sadmin');
			$ci->load->view('template/userFooter');
		} elseif($id_role == 2) {
			return true;
		} else {
			return true;
		} 
	}
}

/**
 * cek role superadmin dan administrator
 *
 * @access	public
 * @param	string	role id
 * @return	boolean 
 */

if (! function_exists('_cekRoleSAdminAndAdm') ) {
	
	function _cekRoleSAdminAndAdm($id_role)
	{
		// ambil CodeIgniter Object
		$ci = get_instance();
		
		if ($id_role == 1) {
			return true;
		} elseif($id_role == 2) {
			return true;
		} else {
			$data['judul'] = 'PILAR | 404';
			$ci->load->view('template/userHeader', $data);
			$ci->load->view('template/topbar');
			$ci->load->view('template/sidebar');
			$ci->load->view('errors/404anggota');
			$ci->load->view('template/userFooter');
		} 
	}
}



/**
 * cek role pemagang
 *
 * @access	public
 * @param	string	role id
 * @return	boolean 
 */

if (! function_exists('_cekRolePemagang') ) {
	
	function _cekRolePemagang($id_role)
	{
		// ambil CodeIgniter Object
		$ci = get_instance();
		
		if ($id_role == 1) {
			$data['judul'] = 'LPK MIM | 404';
			$ci->load->view('template/userHeader', $data);
			$ci->load->view('template/topbar');
			$ci->load->view('template/sidebar');
			$ci->load->view('errors/404sadmin');
			$ci->load->view('template/userFooter');
		} elseif($id_role == 2) {
			$data['judul'] = 'LPK MIM | 404';
			$ci->load->view('template/userHeader', $data);
			$ci->load->view('template/topbar');
			$ci->load->view('template/sidebar');
			$ci->load->view('errors/404adm');
			$ci->load->view('template/userFooter');
		} else {
			return true;
		} 
	}
}

/**
 * cek role ADM
 *
 * @access	public
 * @param	string	role id
 * @return	boolean 
 */

if (! function_exists('_cekRoleADM') ) {
	
	function _cekRoleADM($id_role)
	{
		// ambil CodeIgniter Object
		$ci = get_instance();
		
		if ($id_role == 1) {
			$data['judul'] = 'LPK MIM | 404';
			$ci->load->view('template/userHeader', $data);
			$ci->load->view('template/topbar');
			$ci->load->view('template/sidebar');
			$ci->load->view('errors/404sadmin');
			$ci->load->view('template/userFooter');
		} elseif($id_role == 2) {
			return true;
		} else {
			$data['judul'] = 'LPK MIM | 404';
			$ci->load->view('template/userHeader', $data);
			$ci->load->view('template/topbar');
			$ci->load->view('template/sidebar');
			$ci->load->view('errors/404pemagang');
			$ci->load->view('template/userFooter');
		} 
	}
}

/**
 * cek role SADMIN
 *
 * @access	public
 * @param	string	role id
 * @return	boolean 
 */

if (! function_exists('_cekRoleSAdmin') ) {
	
	function _cekRoleSAdmin($id_role)
	{
		// ambil CodeIgniter Object
		$ci = get_instance();
		
		if ($id_role == 1) {
			return true;
		} elseif($id_role == 2) {
			$data['judul'] = 'LPK MIM | 404';
			$ci->load->view('template/userHeader', $data);
			$ci->load->view('template/topbar');
			$ci->load->view('template/sidebar');
			$ci->load->view('errors/404adm');
			$ci->load->view('template/userFooter');
		} else {
			$data['judul'] = 'LPK MIM | 404';
			$ci->load->view('template/userHeader', $data);
			$ci->load->view('template/topbar');
			$ci->load->view('template/sidebar');
			$ci->load->view('errors/404pemagang');
			$ci->load->view('template/userFooter');
		} 
	}
}


 ?>