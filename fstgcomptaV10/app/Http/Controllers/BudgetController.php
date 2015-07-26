<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateBudgetRequest;
use App\Http\Requests\UpdateBudgetRequest;
use App\Libraries\Repositories\BudgetRepository;
use Flash;
use Response;
use DB;
use App\Models\Budget;
use App\Models\Anneebudgetaire;

class BudgetController extends Controller
{

	/** @var  BudgetRepository */
	private $budgetRepository;

	function __construct(BudgetRepository $budgetRepo)
	{
		$this->budgetRepository = $budgetRepo;
			$this->middleware('auth');
	}

	/**
	 * Display a listing of the Budget.
	 *
	 * @return Response
	 */
	public function index()
	{
        
        $budgets = $this->budgetRepository->paginate(20);
			$links = str_replace('/?', '?', $budgets->render());

        return view('budgets.index', compact('budgets','links'));
	}

	/**
	 * Show the form for creating a new Budget.
	 *
	 * @return Response
	 */
	public function create()
	{
		/*$annees = DB::table('anneebudgetaires')->lists('annee','id');
		$typebudgets = DB::table('typebudgets')->lists('type','id');
		return view('budgets.create', compact('annees','typebudgets'));*/
	}

	/**
	 * Store a newly created Budget in storage.
	 *
	 * @param CreateBudgetRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateBudgetRequest $request)
	{
		/*$input = $request->all();

		$budget = $this->budgetRepository->create($input);

		Flash::success('Budget est enregistré avec succès.');

		return redirect(route('budgets.index'));*/
	}

	/**
	 * Display the specified Budget.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		/*$budget = $this->budgetRepository->find($id);

		if(empty($budget))
		{
			Flash::error('Budget que vous cherchez n\'est pas disponible');

			return redirect(route('budgets.index'));
		}

		return view('budgets.show')->with('budget', $budget);*/
	}

	/**
	 * Show the form for editing the specified Budget.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$budget = $this->budgetRepository->find($id);

		$typebudgets = DB::table('typebudgets')->lists('type','id');
		
		$annees = DB::table('anneebudgetaires')->lists('annee','id');
		if(empty($budget))
		{
			Flash::error('Le budget que vous cherchez n\'est pas disponible');

			return redirect(route('budgets.index'));
		}

		return view('budgets.edit')->with('budget', $budget)
												->with('annees', $annees)
												->with('typebudgets', $typebudgets);
	}

	/**
	 * Update the specified Budget in storage.
	 *
	 * @param  int              $id
	 * @param UpdateBudgetRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateBudgetRequest $request)
	{
		$budget = $this->budgetRepository->find($id);

		if(empty($budget))
		{
			Flash::error('Le budget que vous cherchez n\'est pas disponible');

			return redirect(route('budgets.index'));
		}

		$budget = $this->budgetRepository->updateRich($request->all(), $id);

		Flash::success('Le budget est modifié avec succés.');

		return redirect(route('budgets.index'));
	}

	/**
	 * Remove the specified Budget from storage.
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
			Flash::error('Le budget que vous cherchez n\'est pas disponible');

			return redirect(route('budgets.index'));
		}

		$this->budgetRepository->delete($id);

		Flash::success('le budget est supprimé avec succès.');

		return redirect(route('budgets.index'));
	}
}
