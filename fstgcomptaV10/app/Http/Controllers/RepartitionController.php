<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateRepartitionRequest;
use App\Http\Requests\UpdateRepartitionRequest;
use App\Libraries\Repositories\RepartitionRepository;
use Flash;
//use Mitul\Controller\AppBaseController as Controller;
use Response;
use DB;

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
		//echo $id;
		//echo $_GET['idAnnee'];
		if(!isset($idAnnee))
		{

			$idAnnee=3;
		}
		echo $idAnnee;
		//$repartitions = $this->repartitionRepository->paginate(20);
		$annees = DB::table('anneeBudgetaires')->lists('annee','id');
		$budgetFonctionnements = DB::select('select * from budgetfonctionnements where idAnnee = :idAnnee', ['idAnnee' => $idAnnee]);
		$budgetInvestissements = DB::select('select * from budgetInvestissements where idAnnee = :idAnnee', ['idAnnee' => $idAnnee]);

        $repartitions = DB::table('profiles')
               ->Join('repartitions', 'profiles.id', '=', 'repartitions.idProfile')
               ->where('idAnnee','=',$idAnnee)
               ->paginate(20);
		$profiles = DB::select('select * from profiles');

			$links = str_replace('/?', '?', $repartitions->render());

        return view('repartitions.index', compact('repartitions', 'links' ,'annees' ,'budgetFonctionnements','budgetInvestissements','profiles'));
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
