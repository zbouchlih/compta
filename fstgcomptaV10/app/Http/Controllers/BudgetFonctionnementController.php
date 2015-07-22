<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateBudgetFonctionnementRequest;
use App\Http\Requests\UpdateBudgetFonctionnementRequest;
use App\Libraries\Repositories\BudgetFonctionnementRepository;
use Flash;
//use Mitul\Controller\AppBaseController as Controller;
use Response;
use DB;

class BudgetFonctionnementController extends Controller
{

	/** @var  BudgetFonctionnementRepository */
	private $budgetFonctionnementRepository;

	function __construct(BudgetFonctionnementRepository $budgetFonctionnementRepo)
	{
		$this->budgetFonctionnementRepository = $budgetFonctionnementRepo;
			$this->middleware('auth');
	}

	/**
	 * Display a listing of the BudgetFonctionnement.
	 *
	 * @return Response
	 */
	public function index()
	{
		
		$budgetFonctionnements = DB::table('anneeBudgetaires')
               ->Join('budgetFonctionnements', 'anneeBudgetaires.id', '=', 'budgetFonctionnements.idAnnee')
               ->paginate(7);

			$links = str_replace('/?', '?', $budgetFonctionnements->render());

        return view('budgetFonctionnements.index', compact('budgetFonctionnements', 'links'));
	}

	/**
	 * Show the form for creating a new BudgetFonctionnement.
	 *
	 * @return Response
	 */
	public function create()
	{
		$annees = DB::table('anneeBudgetaires')->lists('annee','id');
		return view('budgetFonctionnements.create', compact('annees'));
	}

	/**
	 * Store a newly created BudgetFonctionnement in storage.
	 *
	 * @param CreateBudgetFonctionnementRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateBudgetFonctionnementRequest $request)
	{
		$input = $request->all();

		$budgetFonctionnement = $this->budgetFonctionnementRepository->create($input);

		Flash::success('BudgetFonctionnement est enregistré avec succès.');

		return redirect(route('budgetFonctionnements.index'));
	}

	/**
	 * Display the specified BudgetFonctionnement.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$budgetFonctionnement = $this->budgetFonctionnementRepository->find($id);

		if(empty($budgetFonctionnement))
		{
			Flash::error('BudgetFonctionnement que vous cherchez n\'est pas disponible');

			return redirect(route('budgetFonctionnements.index'));
		}

		return view('budgetFonctionnements.show')->with('budgetFonctionnement', $budgetFonctionnement);
	}

	/**
	 * Show the form for editing the specified BudgetFonctionnement.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$budgetFonctionnement = $this->budgetFonctionnementRepository->find($id);
		$annees = DB::table('anneeBudgetaires')->lists('annee','id');
		if(empty($budgetFonctionnement))
		{
			Flash::error('BudgetFonctionnement que vous cherchez n\'est pas disponible');

			return redirect(route('budgetFonctionnements.index'));
		}

		return view('budgetFonctionnements.edit')->with('budgetFonctionnement', $budgetFonctionnement)
												->with('annees', $annees);
	}

	/**
	 * Update the specified BudgetFonctionnement in storage.
	 *
	 * @param  int              $id
	 * @param UpdateBudgetFonctionnementRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateBudgetFonctionnementRequest $request)
	{
		$budgetFonctionnement = $this->budgetFonctionnementRepository->find($id);

		if(empty($budgetFonctionnement))
		{
			Flash::error('BudgetFonctionnement que vous cherchez n\'est pas disponible');

			return redirect(route('budgetFonctionnements.index'));
		}

		$budgetFonctionnement = $this->budgetFonctionnementRepository->updateRich($request->all(), $id);

		Flash::success('BudgetFonctionnement est modifié avec succés.');

		return redirect(route('budgetInitials.index'));
	}

	/**
	 * Remove the specified BudgetFonctionnement from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$budgetFonctionnement = $this->budgetFonctionnementRepository->find($id);

		if(empty($budgetFonctionnement))
		{
			Flash::error('BudgetFonctionnement que vous cherchez n\'est pas disponible');

			return redirect(route('budgetFonctionnements.index'));
		}

		$this->budgetFonctionnementRepository->delete($id);

		Flash::success('BudgetFonctionnement est supprimé avec succès.');

		return redirect(route('budgetFonctionnements.index'));
	}
}
