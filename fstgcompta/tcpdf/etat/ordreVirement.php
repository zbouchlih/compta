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
$html=' <img width="100" src="images/ministere.png"/><pre>Marrakech le :</pre> <br>';
$pdf->writeHTMLCell(0, 0, '', '', $html.$style, 0, 1, 0, true, '', true);



$pdf->SetFont('dejavusans', '',7, '', true); 
$html='<pre>              ROYAUME DU MAROC<br>       Trésorerie Générale du Royaume<br>           Trésorerie Régionale<br>               de Marrakech</pre>';

$pdf->writeHTMLCell(0, 0, '', '', $html.$style, 0, 1, 0, true, '', true);


$pdf->SetFont('dejavusans', '',12, '', true);
$html='<pre> <br><br>                            ORDRE DE VIREMENT N°</pre><br>';
$pdf->writeHTMLCell(0, 0, '', '', $html.$style, 0, 1, 0, true, '', true);


$pdf->SetFont('dejavusans', '',7, '', true);
$html='<pre>                                                          ...............<b>DH</b></pre><br><br>';
$pdf->writeHTMLCell(0, 0, '', '', $html.$style, 0, 1, 0, true, '', true);


  
$pdf->SetFont('dejavusans', '',7, '', true);
$html='<pre><b>Compte n° :</b> 43138<br><b>Tenu à la Trésorerie Régionale de Marrakech Au nom de :</b> FACULTE DES SCIENCES ET TECHNIQUE MARRAKECH</pre><br>
<pre><b>                    Par le débit du compte sus-indiqué, veuillez virer</b></pre>';
$pdf->writeHTMLCell(0, 0, '', '', $html.$style, 0, 1, 0, true, '', true);

$pdf->SetFont('dejavusans', '',7, '', true);
$html='<pre><b>Au compte de :</b>...........<br><b>Ouvert chez :</b> ATTIJARI WAFA BANK MRK<br><b>Sous numéro :</b>................<br><b>La somme de :</b>...................<br><b>Objet du virement :</b>Ordre de paiement n°<br></pre><br>
<pre><b>                             Le Sous-Ordonnateur				            Le Fondé de Pouvoirs</b></pre>';
$pdf->writeHTMLCell(0, 0, '', '', $html.$style, 0, 1, 0, true, '', true);

$pdf->Output('ORDRE DE VIREMENT', 'I');

//============================================================+
// END OF FILE
//============================================================+
