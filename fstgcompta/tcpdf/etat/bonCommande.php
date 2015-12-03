<?php
 /* Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Default Header and Footer
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');
include_once '../../class/AnneeBudgetaire.class.php'; 
include_once '../../class/Budget.class.php'; 
include_once '../../class/Service.class.php'; 
include_once '../../class/RepartitionCompte.class.php'; 
include_once '../../class/SousCompte.class.php'; 
include_once '../../class/RepartitionBudget.class.php';
include_once '../../class/Fournisseur.class.php';
include_once '../../class/Proposition.class.php';
include_once '../../class/Depense.class.php';


date_default_timezone_set('UTC');

extract($_GET);

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set default header data
$pdf->setFooterData(array(0,64,0), array(0,64,128));

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

$pdf->SetPrintHeader(false);
$pdf->SetPrintFooter(false);
// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

$pdf->setFontSubsetting(true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();









					//pour chaque service on affiche la liste des comptes et leurs  etat
$style="<style>table, th, td, div {
   border: 1px solid black;
   padding:3px 3px 3px 3px;
}</style>";

$pdf->SetFont('dejavusans', '',7, '', true);
$html='<pre>       UNIVERSITE CADI AYYAD<br>FACULTE DES SCIENCES ET TECHNIQUES<br>            MARRAKECH</pre>';

$pdf->writeHTMLCell(0, 0, '', '', $html.$style, 0, 1, 0, true, '', true);


$pdf->SetFont('dejavusans', '',12, '', true);
$html='<pre> <br><br>                            BON DE COMMANANDE</pre><br><br>';
$pdf->writeHTMLCell(0, 0, '', '', $html.$style, 0, 1, 0, true, '', true);


$pdf->SetFont('dejavusans', '',7, '', true);

$html='<pre><b>BC N°:</b><br><b>DATE:</b><br><b> Depense:</b><br><b>Compte:</b><br><b>FOURNISSEUR	:</b><br><b>ADRESSE	:</b></pre><br><br><br>';
$pdf->writeHTMLCell(0, 0, '', '', $html.$style, 0, 1, 0, true, '', true);


$html='<table><tr><th><pre>ART</pre></th><th  width="200"><pre>DESIGNATION</pre></th><th width="20"><pre>QTE</pre></th><th  width="80"><pre>PRIX UNITAIRE</pre></th><th>TVA (%)</th><th width="50"><pre>PRIX TOTAL HT</pre></th><th width="50"><pre>PRIX TOTAL TTC</pre></th></tr>';


$html.='<tr><td></td><td width="200"></td><td width="20"></td><td></td><td></td><td></td><td width="50"></td></tr>';


$html.='<tr><td colspan="5"></td><td colspan="1">TOTAL HT</td><td></td></tr>
<tr><td colspan="5"></td><td colspan="1">TOTAL TTC</td><td></td></tr></table><br><br>';
$pdf->writeHTMLCell(0, 0, '', '', $html.$style, 0, 1, 0, true, '', true);

$pdf->Output('BON DE COMMANANDE', 'I');

//============================================================+
// END OF FILE
//============================================================+
