<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateBudgetRequest;
use App\Http\Requests\UpdateBudgetRequest;
use App\Libraries\Repositories\BudgetRepository;
use Flash;
//use Mitul\Controller\AppBaseController as Controller;
use Response;
use DB;

class BudgetController extends Controller
{

	/** @var  BudgetFonctionnementRepository */
	private $budgetRepository;

	function __construct(BudgetRepository $budgetRepo)
	{
		$this->budgetRepository = $budgetRepo;
			$this->middleware('auth');
	}

	/**
	 * Display a listing of the BudgetFonctionnement.
	 *
	 * @return Response
	 */
	public function index()
	{
		
		$budgets = DB::table('budgets')
               ->Join('typeBudgets', 'typeBudgets.id', '=', 'budgets.idTypeBudget')
               ->Join('anneeBudgetaires', 'anneeBudgetaires.id', '=', 'budgets.idAnnee')
               ->orderBy('idAnnee', 'asc')
               ->select('budgets.id','budgets.previsionnel','budgets.initial','budgets.modificatif','typeBudgets.type','anneeBudgetaires.annee','anneeBudgetaires.etat')
               ->paginate(7);

			$links = str_replace('/?', '?', $budgets->render());

        return view('budgets.index', compact('budgets', 'links'));
	}

	/**
	 * Show the form for creating a new BudgetFonctionnement.
	 *
	 * @return Response
	 */
	public function create()
	{
		$annees = DB::table('anneeBudgetaires')->lists('annee','id');
		$typeBudgets = DB::table('typeBudgets')->lists('type','id');
		return view('budgets.create', compact('annees','typeBudgets'));
	}

	/**
	 * Store a newly created BudgetFonctionnement in storage.
	 *
	 * @param CreateBudgetFonctionnementRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateBudgetRequest $request)
	{
		$input = $request->all();

		$budget = $this->budgetRepository->create($input);

		Flash::success('Budget est enregistré avec succès.');

		return redirect(route('budgets.index'));
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
		$budget = $this->budgetRepository->find($id);

		if(empty($budget))
		{
			Flash::error('Budget que vous cherchez n\'est pas disponible');

			return redirect(route('budgets.index'));
		}

		return view('budgets.show')->with('budget', $budget);
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
		$budget = $this->budgetRepository->find($id);

		$typeBudgets = DB::table('typeBudgets')->lists('type','id');
		
		$annees = DB::table('anneeBudgetaires')->lists('annee','id');
		if(empty($budget))
		{
			Flash::error('Budgetque vous cherchez n\'est pas disponible');

			return redirect(route('budgets.index'));
		}

		return view('budgets.edit')->with('budget', $budget)
												->with('annees', $annees)
												->with('typeBudgets', $typeBudgets);
	}

	/**
	 * Update the specified BudgetFonctionnement in storage.
	 *
	 * @param  int              $id
	 * @param UpdateBudgetFonctionnementRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateBudgetRequest $request)
	{
		$budget = $this->budgetRepository->find($id);

		if(empty($budget))
		{
			Flash::error('Budget que vous cherchez n\'est pas disponible');

			return redirect(route('budgets.index'));
		}

		$budget = $this->budgetRepository->updateRich($request->all(), $id);

		Flash::success('Budget est modifié avec succés.');

		return redirect(route('budgets.index'));
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
		$budget = $this->budgetRepository->find($id);

		if(empty($budget))
		{
			Flash::error('Budget que vous cherchez n\'est pas disponible');

			return redirect(route('budgets.index'));
		}

		$this->budgetRepository->delete($id);

		Flash::success('Budget est supprimé avec succès.');

		return redirect(route('budgets.index'));
	}
}
