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



$pdf->SetFont('dejavusans', '',9, '', true);
$html="<h1>Etat de Répartition des budgets par compte</h1> <br>";
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);


// lister les donnee
//1-les annee
$listerIntervalle=AnneeBudgetaire::selectAll();
// on liste tout les services

	
	foreach ($listerIntervalle as $key => $value) {
		$pdf->SetFont('dejavusans', '',13, '', true);
		$html="<b>Annee Budgetaire : ".$value["annee"]."</b>";
		if($value["etat"]==1)
			$html.=" (en cours)";
		$html.="<br>";
		$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

		$budget=Budget::selectByDate($value["id"]);
		if(empty($budget)){
			$pdf->SetFont('dejavusans', '',9, '', true);
			$html="<b>Aucun Budget n'est disponible</b>";
			$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

		}
		else{

				foreach ($budget as $key => $value2) {
				$html=$value2['designFr']."  ".$value2['montant']." DH <br>";
				$pdf->SetFont('dejavusans', '',10, '', true);

				$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

				//Pour chaque budget on restitue la liste des service dont il ont un montant

			$listeService=RepartitionBudget::selectRepartition($value2['id']);

				// on teste si il ya une repartition service pour ce budget

					if(empty($listeService)){
					$pdf->SetFont('dejavusans', '',9, '', true);
					$html="<b>Aucune Repartition service n'est disponible</b> <br>";
					$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
					}
					else{

					foreach ($listeService as $key => $valueService) {
					$pdf->SetFont('dejavusans', '',10, '', true);
					$html=$valueService['designFr']."  <b>".$valueService['montant']." DH </b></b>";
					$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);


					//pour chaque service on affiche la liste des comptes et leurs  etat

	$html="<style>table {
	font-family:Arial, Helvetica, sans-serif;
	color:#666;
	font-size:12px;
	text-shadow: 1px 1px 0px #fff;
	background:#eaebec;
	margin:20px;
	border:#ccc 1px solid;

	-moz-border-radius:3px;
	-webkit-border-radius:3px;
	border-radius:3px;

	-moz-box-shadow: 0 1px 2px #d1d1d1;
	-webkit-box-shadow: 0 1px 2px #d1d1d1;
	box-shadow: 0 1px 2px #d1d1d1;
}
table th {
	padding:21px 25px 22px 25px;
	border-top:1px solid #fafafa;
	border-bottom:1px solid #e0e0e0;

	background: #ededed;
	background: -webkit-gradient(linear, left top, left bottom, from(#ededed), to(#ebebeb));
	background: -moz-linear-gradient(top,  #ededed,  #ebebeb);
}
table th:first-child {
	text-align: left;
	padding-left:20px;
}
table tr:first-child th:first-child {
	-moz-border-radius-topleft:3px;
	-webkit-border-top-left-radius:3px;
	border-top-left-radius:3px;
}
table tr:first-child th:last-child {
	-moz-border-radius-topright:3px;
	-webkit-border-top-right-radius:3px;
	border-top-right-radius:3px;
}
table tr {
	text-align: center;
	padding-left:20px;
}
table td:first-child {
	text-align: left;
	padding-left:20px;
	border-left: 0;
}
table td {
	padding:18px;
	border-top: 1px solid #ffffff;
	border-bottom:1px solid #e0e0e0;
	border-left: 1px solid #e0e0e0;

	background: #fafafa;
	background: -webkit-gradient(linear, left top, left bottom, from(#fbfbfb), to(#fafafa));
	background: -moz-linear-gradient(top,  #fbfbfb,  #fafafa);
}
table tr.even td {
	background: #f6f6f6;
	background: -webkit-gradient(linear, left top, left bottom, from(#f8f8f8), to(#f6f6f6));
	background: -moz-linear-gradient(top,  #f8f8f8,  #f6f6f6);
}
table tr:last-child td {
	border-bottom:0;
}
table tr:last-child td:first-child {
	-moz-border-radius-bottomleft:3px;
	-webkit-border-bottom-left-radius:3px;
	border-bottom-left-radius:3px;
}
table tr:last-child td:last-child {
	-moz-border-radius-bottomright:3px;
	-webkit-border-bottom-right-radius:3px;
	border-bottom-right-radius:3px;
}
table tr:hover td {
	background: #f2f2f2;
	background: -webkit-gradient(linear, left top, left bottom, from(#f2f2f2), to(#f0f0f0));
	background: -moz-linear-gradient(top,  #f2f2f2,  #f0f0f0);	
}</style>";




	$html.="<table> <thead><tr><td><b>Designation Compte</b></td><td><b>Montant</b></td></tr></thead> <tbody>";

		$listeCompte=RepartitionCompte::selectRepartitionCompte($valueService['id'],$value['id'],$value2['idType']);
/*
			foreach ($listeCompte as $key => $valueCompte) {
				$html.="<tr><td>".$valueCompte["designFr"]."</td><td>".$valueCompte["montant"]."</td></tr>";
			
			}
			$html.="</tbody></table> <br>";
			$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);*/

			if(!empty($listeCompte)){
				foreach ($listeCompte as $key => $valueCompte) {
				$html.="<tr><td>".$valueCompte["designFr"]."</td><td>".$valueCompte["montant"]."</td></tr>";


			}
						$html.="</tbody></table> <br>";
						$pdf->SetFont('dejavusans', '',8, '', true);
						$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

			}
			else{
				$pdf->SetFont('dejavusans', '',8, '', true);
					$html="<b>Aucune Repartition par compte n'est disponible</b> <br>";
					$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

			}

					}

					}
						$html="<br>";
					$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);



			}

		}
	}

$pdf->Output('Repartition par Compte', 'I');

//============================================================+
// END OF FILE
//============================================================+
