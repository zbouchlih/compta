<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateAnneeBudgetaireRequest;
use App\Http\Requests\UpdateAnneeBudgetaireRequest;
use App\Libraries\Repositories\AnneeBudgetaireRepository;
use Flash;
//use Mitul\Controller\AppBaseController as Controller;
use Response;
use DB;

class AnneeBudgetaireController extends Controller
{

	/** @var  AnneeBudgetaireRepository */
	private $anneeBudgetaireRepository;

	function __construct(AnneeBudgetaireRepository $anneeBudgetaireRepo)
	{
		$this->anneeBudgetaireRepository = $anneeBudgetaireRepo;
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the AnneeBudgetaire.
	 *
	 * @return Response
	 */
	public function index()
	{
		$anneeBudgetaires = $this->anneeBudgetaireRepository->paginate(7);

			$links = str_replace('/?', '?', $anneeBudgetaires->render());

        return view('anneeBudgetaires.index', compact('anneeBudgetaires', 'links'));
	}

	/**
	 * Show the form for creating a new AnneeBudgetaire.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('anneeBudgetaires.create');
	}

	/**
	 * Store a newly created AnneeBudgetaire in storage.
	 *
	 * @param CreateAnneeBudgetaireRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateAnneeBudgetaireRequest $request)
	{
		$input = $request->all();
		
		$anneeBudgetaire = $this->anneeBudgetaireRepository->create($input);
		$profiles = DB::select('select * from profiles');
		$idAnnee=DB::table('anneeBudgetaires')->max('id');
		DB::table('budgets')->insert([
				  'idTypeBudget' => 1,
				  'idAnnee' => $idAnnee,
		          'previsionnel' => 0,
		          'initial' => 0,
		          'modificatif' => 0
			]);
		DB::table('budgets')->insert([
				  'idTypeBudget' => 2,
				  'idAnnee' => $idAnnee,
		          'previsionnel' => 0,
		          'initial' => 0,
		          'modificatif' => 0
			]);
		$idBudget=DB::table('budgets')->max('id');
		$idBudgetNext=$idBudget-1;
		foreach($profiles as $profile)
		{
			DB::table('repartitions')->insert([
				  'idBudget' => $idBudget,
		          'idProfile' => $profile->id,
		          'budget' => 0
			]);
			DB::table('repartitions')->insert([
				  'idBudget' => $idBudgetNext,
		          'idProfile' => $profile->id,
		          'budget' => 0
			]);
		}

		/*DB::table('budgetInvestissements')->insert([
				  'idAnnee' => $idAnnee,
		          'previsionnel' => 0,
		          'initial' => 0,
		          'modificatif' => 0
			]);*/
		Flash::success('AnneeBudgetaire est enregistré avec succès.');

		return redirect(route('anneeBudgetaires.index'));
	}

	/**
	 * Display the specified AnneeBudgetaire.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$anneeBudgetaire = $this->anneeBudgetaireRepository->find($id);

		if(empty($anneeBudgetaire))
		{
			Flash::error('AnneeBudgetaire que vous cherchez n est pas disponible');

			return redirect(route('anneeBudgetaires.index'));
		}

		return view('anneeBudgetaires.show')->with('anneeBudgetaire', $anneeBudgetaire);
	}

	/**
	 * Show the form for editing the specified AnneeBudgetaire.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$anneeBudgetaire = $this->anneeBudgetaireRepository->find($id);

		if(empty($anneeBudgetaire))
		{
			Flash::error('AnneeBudgetaire que vous cherchez n est pas disponible');

			return redirect(route('anneeBudgetaires.index'));
		}

		return view('anneeBudgetaires.edit')->with('anneeBudgetaire', $anneeBudgetaire);
	}

	/**
	 * Update the specified AnneeBudgetaire in storage.
	 *
	 * @param  int              $id
	 * @param UpdateAnneeBudgetaireRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateAnneeBudgetaireRequest $request)
	{
		$anneeBudgetaire = $this->anneeBudgetaireRepository->find($id);

		if(empty($anneeBudgetaire))
		{
			Flash::error('AnneeBudgetaire que vous cherchez n est pas disponible');

			return redirect(route('anneeBudgetaires.index'));
		}

		$anneeBudgetaire = $this->anneeBudgetaireRepository->updateRich($request->all(), $id);

		Flash::success('AnneeBudgetaire est modifié avec succés.');

		return redirect(route('anneeBudgetaires.index'));
	}

	/**
	 * Remove the specified AnneeBudgetaire from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$anneeBudgetaire = $this->anneeBudgetaireRepository->find($id);

		if(empty($anneeBudgetaire))
		{
			Flash::error('AnneeBudgetaire que vous cherchez n est pas disponible');

			return redirect(route('anneeBudgetaires.index'));
		}

		$this->anneeBudgetaireRepository->delete($id);

		Flash::success('AnneeBudgetaire est supprimé avec succès.');

		return redirect(route('anneeBudgetaires.index'));
	}
}
