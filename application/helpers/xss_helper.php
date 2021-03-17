<?php 

function cetakPDF($str)
{
	$xssFilter =  htmlentities($str, ENT_QUOTES, 'UTF-8');
	return wordwrap($xssFilter,45,"<br>\n",TRUE);
}

function cetakNamaSekolah($str)
{
	$xssFilter =  htmlentities($str, ENT_QUOTES, 'UTF-8');
	return wordwrap($xssFilter,15,"<br>\n",TRUE);
}

function cetakPekerjaan($str)
{
	$xssFilter =  htmlentities($str, ENT_QUOTES, 'UTF-8');
	return wordwrap($xssFilter,20,"<br>\n",TRUE);
}

function cetakNamaPerusahaan($str)
{
	$xssFilter =  htmlentities($str, ENT_QUOTES, 'UTF-8');
	return wordwrap($xssFilter,12,"<br>\n",TRUE);
}

function cetak($str)
{
	echo htmlentities($str, ENT_QUOTES, 'UTF-8');
}