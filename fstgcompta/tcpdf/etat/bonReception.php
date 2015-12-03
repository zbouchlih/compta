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
$html='<pre> <br><br>                            BON DE RECEPTION</pre><br><br>';
$pdf->writeHTMLCell(0, 0, '', '', $html.$style, 0, 1, 0, true, '', true);


$pdf->SetFont('dejavusans', '',7, '', true);
$html='<pre><b>BC N°:</b><br><b>DATE:</b><br><b>ART	:</b>	II<br><b>PARAGRAPHE	:</b>	10<br><b>LIGNE	:</b>	33<br><b>RUBRIQUE:</b>	ACHAT DE FOURNITURE DE BUREAU DE PAPETERIE ET D\'IMPRIMEE<br><b>FOURNISSEUR	:</b>SMS MEDIA<br><b>ADRESSE	:</b>	N 71 BLOC 5 QUARTIER YOUSSEF BEN TACHFINE, ZITOUNE 2 MARRAKECH</pre><br><br><br>';
$pdf->writeHTMLCell(0, 0, '', '', $html.$style, 0, 1, 0, true, '', true);


$html='<table><tr><th><pre>ART</pre></th><th  width="200"><pre>DESIGNATION</pre></th><th width="20"><pre>QTE</pre></th><th  width="80"><pre>PRIX UNITAIRE</pre></th><th width="50"><pre>PRIX TOTAL</pre></th></tr>
<tr><td></td><td></td><td></td><td></td><td></td></tr>
<tr><td></td><td></td><td></td><td></td><td></td></tr>
<tr><td colspan="2"></td><td colspan="2">TOTAL HT</td><td></td></tr>
<tr><td colspan="2"></td><td colspan="2">TVA 20%</td><td></td></tr>
<tr><td colspan="2"></td><td colspan="2">TOTAL TTC</td><td></td></tr></table><br><br>';
$pdf->writeHTMLCell(0, 0, '', '', $html.$style, 0, 1, 0, true, '', true);

$html='<pre>ARRETE LE PRESENT BON DE RECEPTION A LA SOMME DE : <b>20000 dh</b></pre>';
$pdf->writeHTMLCell(0, 0, '', '', $html.$style, 0, 1, 0, true, '', true);

$pdf->Output('BON DE COMMANANDE', 'I');

//============================================================+
// END OF FILE
//============================================================+
