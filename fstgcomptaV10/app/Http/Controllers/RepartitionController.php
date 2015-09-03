<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateRepartitionRequest;
use App\Http\Requests\UpdateRepartitionRequest;
use App\Libraries\Repositories\RepartitionRepository;
use Flash;
use Response;
use DB;
use App\Models\Anneebudgetaire;
use App\Models\Repartition;

class RepartitionController extends Controller
{

	/** @var  RepartitionRepository */
	private $repartitionRepository;

	function __construct(RepartitionRepository $repartitionRepo)
	{
		$this->repartitionRepository = $repartitionRepo;
			$this->middleware('auth');
	}

	/**
	 * Display a listing of the Repartition.
	 *
	 * @return Response
	 */
	public function index()
	{
		extract($_GET);
		if(!isset($idAnnee))
		{
			$idAnnee=35;
		}
		$budget = Anneebudgetaire::find($idAnnee)->budgets->first();
		$budgets = Anneebudgetaire::find($idAnnee)->budgets;
		$annees = DB::table('anneebudgetaires')->lists('annee','id');
		$repartitions=Repartition::whereIn('idBudget',$budgets->lists('id'))->orderBy('idProfile', 'asc')->paginate(40);

			$links =str_replace('/?', '?', $repartitions->render());

        return view('repartitions.index', compact('repartitions', 'links' ,'annees' ,'budgets','idAnnee','budget'));
	}

	/**
	 * Show the form for creating a new Repartition.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('repartitions.create');
	}

	/**
	 * Store a newly created Repartition in storage.
	 *
	 * @param CreateRepartitionRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateRepartitionRequest $request)
	{
		$input = $request->all();

		$repartition = $this->repartitionRepository->create($input);

		Flash::success('Repartition est enregistré avec succès.');

		return redirect(route('repartitions.index'));
	}

	/**
	 * Display the specified Repartition.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$repartition = $this->repartitionRepository->find($id);

		if(empty($repartition))
		{
			Flash::error('Repartition que vous cherchez n\'est pas disponible');

			return redirect(route('repartitions.index'));
		}

		return view('repartitions.show')->with('repartition', $repartition);
	}

	/**
	 * Show the form for editing the specified Repartition.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$repartition = $this->repartitionRepository->find($id);

		if(empty($repartition))
		{
			Flash::error('Repartition que vous cherchez n\'est pas disponible');

			return redirect(route('repartitions.index'));
		}

		return view('repartitions.edit')->with('repartition', $repartition);
	}

	public function editall($idAnnee)
	{
		$budgets = Anneebudgetaire::find($idAnnee)->budgets;
		
		
		$repartitions=Repartition::whereIn('idBudget',$budgets->lists('id'))->orderBy('idProfile', 'asc')->paginate(40);

			$links =str_replace('/?', '?', $repartitions->render());

        return view('repartitions.editall', compact('repartitions', 'links' ,'budgets','idAnnee'));
	}

	/**
	 * Update the specified Repartition in storage.
	 *
	 * @param  int              $id
	 * @param UpdateRepartitionRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateRepartitionRequest $request)
	{
		$repartition = $this->repartitionRepository->find($id);
		
		if(empty($repartition))
		{
			Flash::error('Repartition que vous cherchez n\'est pas disponible');

			return redirect(route('repartitions.index'));
		}

		$repartition = $this->repartitionRepository->updateRich($request->all(), $id);

		Flash::success('Repartition est modifié avec succés.');

		return redirect(route('repartitions.index'));
	}

	public function updateall($idAnnee, UpdateRepartitionRequest $request)
	{
		$inputs=$request->all();

		for ($i=0; $i < count($inputs['id']); $i++) { 
		$input['_method']='PATCH';
		$input['_token']=$inputs['_token'];
		$input['budget']=$inputs['budget'][$i];
		$repartition = $this->repartitionRepository->find($inputs['id'][$i]);
		$repartition = $this->repartitionRepository->updateRich($input, $inputs['id'][$i]);
		
		}
	
		Flash::success('Repartition est modifié avec succés.');

		return redirect(route('repartitions.index'));
	}

	/**
	 * Remove the specified Repartition from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$repartition = $this->repartitionRepository->find($id);

		if(empty($repartition))
		{
			Flash::error('Repartition que vous cherchez n\'est pas disponible');

			return redirect(route('repartitions.index'));
		}

		$this->repartitionRepository->delete($id);

		Flash::success('Repartition est supprimé avec succès.');

		return redirect(route('repartitions.index'));
	}
}
