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

$pdf->SetFont('dejavusans', '',11, '', true);
$html="<h4>GESTION FINANCIERE :Etat de Répartition des budgets par service</h4><br>";
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);


// lister les donnee
//1-les annee
$listerIntervalle=AnneeBudgetaire::listerIntervalle($deAnnee,$versAnnee);
// on liste tout les services

	
	foreach ($listerIntervalle as $key => $value) {
		$pdf->SetFont('dejavusans', '',10, '', true);
		$html="<b>Annee Budgetaire : ".$value["annee"]."</b>";
		if($value["etat"]==1)
			$html.=" (en cours)";
		$html.="<br>";
		$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

		$pdf->SetFont('dejavusans', '',9, '', true);
		// on recupere les budget de chaque annee qui sont repartie
		$listeBudget=Budget::selectBudget($value["id"]);
		foreach ($listeBudget as $key => $valueBudget) {

			$html="<b>".$valueBudget["designFr"]."-".$valueBudget["designAr"]."</b><br>";
			$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
			//on recupere la repartition de chaque budget
			$Repartition=RepartitionBudget::selectRepartition($valueBudget["id"]);
			//on parcours la liste repartition pour afficher la table
			

	$totale=0;
	$prcTotale=0;

			$html="<table> <thead><tr><td><b>Service</b></td><td><b>Repartition(%)</b></td><td><b>Montant(DH)</b></td></tr></thead> <tbody>";
			foreach ($Repartition as $key => $valueRepartition) {
				$pourcentage=round(($valueRepartition["montant"]/$valueBudget["montant"])*100,2);
				$html.="<tr><td>".$valueRepartition["designFr"]."</td><td>".$pourcentage."</td><td>".$valueRepartition["montant"]."</td></tr>";
				$totale+=$valueRepartition["montant"];
				$prcTotale+=$pourcentage;

			
			}
			$html.="<tr><td><b>Totale</b></td><td><b>".$prcTotale."</b></td><td><b>".$totale."</b></td></tr></tbody></table> <br>";
			$pdf->writeHTMLCell(0, 0, '', '', $html.$style, 0, 1, 0, true, '', true);

		}
		

		
	}


$pdf->Output('Repartition par service', 'I');

//============================================================+
// END OF FILE
//============================================================+
