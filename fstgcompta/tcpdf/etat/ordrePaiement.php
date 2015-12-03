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
$html="<table><tr><td><pre>      UNIVERSITE CADI AYYAD <br>FACULTE DES SCIENCES ET TECHNIQUES </center><br><center>             MARRAKECH</center></pre> 
</td><td>Ordre de paiement<br>N°<br>Budget :</td><td><pre>EXERCICE 2013 <br>Année d'origine de la créance : 2013  COMPTE N° 43 138 <br>OUVERT  A LA  TRESORERIE REGIONALE  DE MARRAKECH  
</pre></td></tr></table><br><br>";

$pdf->SetFont('dejavusans', '',7, '', true);
$pdf->writeHTMLCell(0, 0, '', '', $html.$style, 0, 1, 0, true, '', true);

$html="<div><pre>BENEFICIAIRE :  ,,,,,,,,,,,,,,,,,,,,,,,           
              
DOMICILIATION:  COMPTE N°     ,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,        
ATTIJARI WAFA BANK MRK            
</pre></div><br><br>";
$pdf->SetFont('dejavusans', '',7, '', true);
$pdf->writeHTMLCell(0, 0, '', '', $html.$style, 0, 1, 0, true, '', true);


$html='<table><tr><th  width="185"><pre>PIECES JUSTIFICATIVES</pre></th><th  width="20"><pre>art</pre></th><th width="20"><pre>Q</pre></th><th  width="20"><pre>Lig</pre></th><th width="200"><pre>NATURE DES OPERATIONS</pre></th><th><pre>MONTANTS</pre></th></tr>
<tr><td><pre>Facture N° :<br>BON DE COMMANDE N°:<br>BON DE RECEPTION <br>3 LETTRES DE CONSULTATION <br>3 DEVIS CONTRATDICTOIRS</pre></td><td>11</td><td>10</td><td>33</td><td>ACHAT DE FOURNITURE DE BUREAU<br><br>DE PAPETERIE ET D\'IMPRIMEE<br><br>N° DE COMPTE<br>,,,,,,,,,,,,,,,,,,,,,<br><br><b>Liquidation et Certification<br>par le Service d\'Intendance</b></td><td>3520 0545 5887</td></tr>
<tr><td colspan="5">ARRETE LE PRESENT ORDRE DE PAIEMENT A LA SOMME :</td><td>.............</td></tr></table><br><br>';
$pdf->writeHTMLCell(0, 0, '', '', $html.$style, 0, 1, 0, true, '', true);

$html='<table><tr><td><pre>LE SOUS-ORDONNATEUR</pre></td><td><pre>LE FONDE DE POUVOIRS</pre></td></tr>
<tr><td><pre>        TRANSMIS AU FONDE DE POUVOIRS <br>LE : <br><br>        SIGNATURE DU SOUS-ORDONNATEUR</pre></td><td><pre>                  MODE DE REGLEMENT:<br>CHEQUE N°:<br>ORDRE DE VIREMENT N°:<br>               VISA DU FONDE DE POUVOIRS   </pre></td> </tr></table><br><br>';
$pdf->writeHTMLCell(0, 0, '', '', $html.$style, 0, 1, 0, true, '', true);

$pdf->Output('Ordre de paiement', 'I');

//============================================================+
// END OF FILE
//============================================================+
