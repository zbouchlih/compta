<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateDepenseRequest;
use App\Http\Requests\UpdateDepenseRequest;
use App\Libraries\Repositories\DepenseRepository;
use Flash;
use App\Models\Depense;
use App\Models\Compterepartition;
use Response;
use DB;
use PDF;

class DepenseController extends Controller
{

	/** @var  DepenseRepository */
	private $depenseRepository;

	function __construct(DepenseRepository $depenseRepo)
	{
		$this->depenseRepository = $depenseRepo;
			$this->middleware('auth');
	}

	/**
	 * Display a listing of the Depense.
	 *
	 * @return Response
	 */
	public function index($idCompterepartition,$etat)
	{
		$depenses=Depense::where('idCompterepartition',$idCompterepartition)->paginate(20);
		//$depenses = $this->depenseRepository->paginate(20);
		$compte=Compterepartition::find($idCompterepartition)->comptes->compte;
        $depensesSum=Depense::where('idCompterepartition',$idCompterepartition)->sum('valeur');
        $compterepartition=Compterepartition::find($idCompterepartition);

			$links = str_replace('/?', '?', $depenses->render());

        return view('depenses.index', compact('depenses','depensesSum', 'links','etat','compterepartition'))->with('idCompterepartition',$idCompterepartition)->with('compte',$compte);
	}

	/**
	 * Show the form for creating a new Depense.
	 *
	 * @return Response
	 */
	public function create($idCompterepartition)
	{
		
		return view('depenses.create')->with('idCompterepartition',$idCompterepartition);
	}

	/**
	 * Store a newly created Depense in storage.
	 *
	 * @param CreateDepenseRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateDepenseRequest $request)
	{
		$input = $request->all();

		$depense = $this->depenseRepository->create($input);
		$idCompterepartition=$input['idCompterepartition'];
		Flash::success('Depense est enregistré avec succès.');
		return redirect(route('depenses.index',[$idCompterepartition,1]));
	}

	/**
	 * Display the specified Depense.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$depense = $this->depenseRepository->find($id);

		if(empty($depense))
		{
			Flash::error('Depense que vous cherchez n\'est pas disponible');

			return redirect(route('depenses.index'));
		}

		return view('depenses.show')->with('depense', $depense);
	}

	/**
	 * Show the form for editing the specified Depense.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$depense = $this->depenseRepository->find($id);
		
		if(empty($depense))
		{
			Flash::error('Depense que vous cherchez n\'est pas disponible');

			return redirect(route('depenses.index'));
		}
		$idCompterepartition=$depense->idCompterepartition;
		return view('depenses.edit')->with('depense', $depense)->with('idCompterepartition',$idCompterepartition);
	}

	/**
	 * Update the specified Depense in storage.
	 *
	 * @param  int              $id
	 * @param UpdateDepenseRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateDepenseRequest $request)
	{
		$depense = $this->depenseRepository->find($id);
		$idCompterepartition=$depense->idCompterepartition;
		if(empty($depense))
		{
			Flash::error('Depense que vous cherchez n\'est pas disponible');

			return redirect(route('depenses.index'));
		}

		$depense = $this->depenseRepository->updateRich($request->all(), $id);
		 
		Flash::success('Depense est modifié avec succés.');

		return redirect(route('depenses.index',[$idCompterepartition,1]));
	}
	public function valider($id)
	{
		$depense = $this->depenseRepository->find($id);
		$idCompterepartition=$depense->idCompterepartition;
		if(empty($depense))
		{
			Flash::error('Depense que vous cherchez n\'est pas disponible');

			return redirect(route('depenses.index'));
		}
		$depense->update(['etat' =>'1']);
		//$depense = $this->depenseRepository->updateRich($request->all(), $id);
		 
		Flash::success('Depense est modifiée avec succés.');

		return redirect(route('depenses.index',[$idCompterepartition,1]));
	}
//impression de devis
	public function devis($idCompterepartition)
	{
 $depenses=Depense::where('idCompterepartition',$idCompterepartition)->paginate(20);

		$html="<h1>Objet: demande d'articles</h1> <br>
Prière de nous faire parvenir dans les meilleurs délais votre offre concernant les articles cités dans le tableau  ci-joint.
    Dans l’attente de votre réponse, recevez mes meilleures salutations. ";


$html.="<h1>Devis Estimatif</h1> <br>";

			$html.="<style>table {
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
			$html.="<table> <thead>
			<tr><td><b>Référence</b></td>
			<td><b>Désignation</b></td>
			<td><b>Unité</b></td>
			<td><b>Quantité</b></td></tr>
			</thead> <tbody>";

	
 		foreach($depenses as $depense)
 		{
			$html.="<tr><td></td><td>". $depense->details."</td><td></td><td>".$depense->quantite."</td></tr>";
		}
			
			
			$html.="</tbody></table> <br>";
		$pdf = PDF::loadHTML($html);
        return $pdf->stream();

		
	}

	/**
	 * Remove the specified Depense from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$depense = $this->depenseRepository->find($id);
		$idCompterepartition=$depense->idCompterepartition;
		if(empty($depense))
		{
			Flash::error('Depense que vous cherchez n\'est pas disponible');

			return redirect(route('depenses.index'));
		}

		$this->depenseRepository->delete($id);

		Flash::success('Depense est supprimé avec succès.');
			return redirect(route('depenses.index',[$idCompterepartition,1]));
	}
}
