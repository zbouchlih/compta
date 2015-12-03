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


$style="<style>table, th, td, div {
   border: 1px solid black;
   padding:3px 3px 3px 3px;
}
</style>";


$pdf->SetFont('dejavusans', '',9, '', true); 
$html='<pre id="tete">      <b>UNIVERSITE CADI AYYAD <br>FACULTE DES SCIENCES ET TECHNIQUES<br>            MARRAKECH</b></pre>';
 $pdf->writeHTMLCell(0, 0, '', '', $html.$style, 0, 1, 0, true, '', true);


$html='<img src="images/tete.png"/><br>';
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);


$pdf->SetFont('dejavusans', '',9, '', true);
$html="<h1>Etat de Répartition des budgets par année</h1> <br>";
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
//on selectionne l'annee
if($deAnnee<=$versAnnee){

	$listerIntervalle=AnneeBudgetaire::listerIntervalle($deAnnee,$versAnnee);

}

else{

	$listerIntervalle=AnneeBudgetaire::listerIntervalle($versAnnee,$deAnnee);

}
	
	
	foreach ($listerIntervalle as $key => $value) {
		$pdf->SetFont('dejavusans', '',13, '', true);
		$html="<b>Annee Budgetaire : ".$value["annee"]."</b>";
		if($value["etat"]==1)
			$html.=" (encours)";
		$html.="<br>";
		$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

		$budget=Budget::selectByDate($value["id"]);
		$total=0;
	
		$html="<table> <thead><tr><td><b>Budget</b></td><td><b>Montant(DH)</b></td></tr></thead> <tbody>";


			foreach ($budget as $key => $valueBudget) {

		$html.="<tr><td>".$valueBudget["designFr"].$valueBudget['designAr']."</td><td>".$valueBudget["montant"]."</td></tr>";
		$total+=$valueBudget["montant"];

			}	

		$html.='<tr><td><b>Total</b></td><td><b>'.$total.'</b></td></tr></tbody></table> <br>';
		$pdf->SetFont('dejavusans', '',8, '', true);
		$pdf->writeHTMLCell(0, 0, '', '', $html.$style, 0, 1, 0, true, '', true);
	
	}

$pdf->Output('Repartition par Compte', 'I');

//============================================================+
// END OF FILE
//============================================================+
