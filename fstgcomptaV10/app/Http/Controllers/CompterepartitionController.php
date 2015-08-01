<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateCompterepartitionRequest;
use App\Http\Requests\UpdateCompterepartitionRequest;
use App\Libraries\Repositories\CompterepartitionRepository;
use Flash;
use App\Models\Repartition; 
use App\Models\Compterepartition; 
use App\Models\Anneebudgetaire;
use App\Models\Budget;
use Response;
use Illuminate\Support\Facades\Session;
use DB;
class CompterepartitionController extends Controller
{

	/** @var  CompterepartitionRepository */
	private $compterepartitionRepository;

	function __construct(CompterepartitionRepository $compterepartitionRepo)
	{
		$this->compterepartitionRepository = $compterepartitionRepo;
			$this->middleware('auth');
	}

	/**
	 * Display a listing of the Compterepartition.
	 *
	 * @return Response
	 */

	public function index($annee)
	{
		extract($_POST);
		if(!isset($idAnnee))
		{
			$idAnnee=Anneebudgetaire::where('annee',$annee)->first()->id;
		}
		//$annee=Anneebudgetaire::find($idAnnee)->annee;
		$annees = DB::table('anneebudgetaires')->lists('annee','id');
		$repartitions=Repartition::whereIn('idBudget',Anneebudgetaire::find($idAnnee)->budgets->lists('id'))->where('idProfile',Session::get('user')->idProfile)->paginate(40);
		$compterepartitions = Compterepartition::whereIn('repartition_id',$repartitions->lists('id'))->paginate(7);
		
		$links = str_replace('/?', '?', $compterepartitions->render());

        return view('compterepartitions.index', compact('compterepartitions', 'links','annees','repartitions','idAnnee','annee'));
	}

	/**
	 * Show the form for creating a new Compterepartition.
	 *
	 * @return Response
	 */
	public function create($annee)
	{
		$idAnnee=Anneebudgetaire::where('annee',$annee)->first()->id;
		$comptes = DB::table('comptes')->lists('compte','id');
		$typebudgets = DB::table('typebudgets')->lists('type','id');
		return view('compterepartitions.create')->with('comptes', $comptes)->with('idAnnee', $idAnnee)->with('typebudgets', $typebudgets);
	}

	/**
	 * Store a newly created Compterepartition in storage.
	 *
	 * @param CreateCompterepartitionRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateCompterepartitionRequest $request)
	{
		$input = $request->all();
		
		
		$idBudget=Budget::where('idAnnee',$input['idAnnee'])->where('idTypebudget',$input['idTypebudget'])->first()->id;
	
		$repartition=Repartition::where('idBudget',$idBudget)->where('idProfile',Session::get('user')->idProfile)->first();
		$annee=Anneebudgetaire::find($input['idAnnee'])->annee;

        $repartition->comptes()->attach($input['compte_id'],['credit_ouvert' => $input['credit_ouvert'],'engagement'=> $input['engagement'], 'paiement'=>$input['paiement']]);

		Flash::success('Compterepartition est enregistré avec succès.');

		return redirect(route('compterepartitions.index',$annee))->with('idAnnee', $input['idAnnee']);
	}

	/**
	 * Display the specified Compterepartition.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$compterepartition = $this->compterepartitionRepository->find($id);

		if(empty($compterepartition))
		{
			Flash::error('Compterepartition que vous cherchez n\'est pas disponible');

			return redirect(route('compterepartitions.index'));
		}

		return view('compterepartitions.show')->with('compterepartition', $compterepartition);
	}

	/**
	 * Show the form for editing the specified Compterepartition.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$compterepartition = $this->compterepartitionRepository->find($id);

		if(empty($compterepartition))
		{
			Flash::error('Compterepartition que vous cherchez n\'est pas disponible');

			return redirect(route('compterepartitions.index'));
		}

		return view('compterepartitions.edit')->with('compterepartition', $compterepartition);
	}

	/**
	 * Update the specified Compterepartition in storage.
	 *
	 * @param  int              $id
	 * @param UpdateCompterepartitionRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateCompterepartitionRequest $request)
	{
		$compterepartition = $this->compterepartitionRepository->find($id);
		$annee=$compterepartition->repartitions->budgett->anneebudgetaire->annee;
		if(empty($compterepartition))
		{
			Flash::error('Compterepartition que vous cherchez n\'est pas disponible');

			return redirect(route('compterepartitions.index'));
		}

		$compterepartition = $this->compterepartitionRepository->updateRich($request->all(), $id);

		Flash::success('Compterepartition est modifié avec succés.');

		return redirect(route('compterepartitions.index',$annee));
	}

	/**
	 * Remove the specified Compterepartition from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$compterepartition = $this->compterepartitionRepository->find($id);
		$annee=$compterepartition->repartitions->budgett->anneebudgetaire->annee;
		if(empty($compterepartition))
		{
			Flash::error('Compterepartition que vous cherchez n\'est pas disponible');

			return redirect(route('compterepartitions.index'));
		}

		//$repartition->comptes()->detach($compte_id);
$this->compterepartitionRepository->delete($id);

		Flash::success('Compterepartition est supprimé avec succès.');

		return redirect(route('compterepartitions.index',$annee));
	}
}
