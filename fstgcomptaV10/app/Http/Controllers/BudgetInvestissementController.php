<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateBudgetInvestissementRequest;
use App\Http\Requests\UpdateBudgetInvestissementRequest;
use App\Libraries\Repositories\BudgetInvestissementRepository;
use Flash;
//use Mitul\Controller\AppBaseController as Controller;
use Response;
use DB;

class BudgetInvestissementController extends Controller
{

	/** @var  BudgetInvestissementRepository */
	private $budgetInvestissementRepository;

	function __construct(BudgetInvestissementRepository $budgetInvestissementRepo)
	{
		$this->budgetInvestissementRepository = $budgetInvestissementRepo;
			$this->middleware('auth');
	}

	/**
	 * Display a listing of the BudgetInvestissement.
	 *
	 * @return Response
	 */
	public function index()
	{
		
		$budgetInvestissements = DB::table('anneeBudgetaires')
               ->Join('budgetInvestissements', 'anneeBudgetaires.id', '=', 'budgetInvestissements.idAnnee')
               ->paginate(7);

			$links = str_replace('/?', '?', $budgetInvestissements->render());

        return view('budgetInvestissements.index', compact('budgetInvestissements', 'links'));
	}

	/**
	 * Show the form for creating a new BudgetInvestissement.
	 *
	 * @return Response
	 */
	public function create()
	{
		$annees = DB::table('anneeBudgetaires')->lists('annee','id');
		return view('budgetInvestissements.create', compact('annees'));
	}

	/**
	 * Store a newly created BudgetInvestissement in storage.
	 *
	 * @param CreateBudgetInvestissementRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateBudgetInvestissementRequest $request)
	{
		$input = $request->all();

		$budgetInvestissement = $this->budgetInvestissementRepository->create($input);

		Flash::success('BudgetInvestissement est enregistré avec succès.');

		return redirect(route('budgetInvestissements.index'));
	}

	/**
	 * Display the specified BudgetInvestissement.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$budgetInvestissement = $this->budgetInvestissementRepository->find($id);

		if(empty($budgetInvestissement))
		{
			Flash::error('BudgetInvestissement que vous cherchez n\'est pas disponible');

			return redirect(route('budgetInvestissements.index'));
		}

		return view('budgetInvestissements.show')->with('budgetInvestissement', $budgetInvestissement);
	}

	/**
	 * Show the form for editing the specified BudgetInvestissement.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$budgetInvestissement = $this->budgetInvestissementRepository->find($id);
		$annees = DB::table('anneeBudgetaires')->lists('annee','id');

		if(empty($budgetInvestissement))
		{
			Flash::error('BudgetInvestissement que vous cherchez n\'est pas disponible');

			return redirect(route('budgetInvestissements.index'));
		}

		return view('budgetInvestissements.edit')->with('budgetInvestissement', $budgetInvestissement)
													->with('annees', $annees);
	}

	/**
	 * Update the specified BudgetInvestissement in storage.
	 *
	 * @param  int              $id
	 * @param UpdateBudgetInvestissementRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateBudgetInvestissementRequest $request)
	{
		$budgetInvestissement = $this->budgetInvestissementRepository->find($id);

		if(empty($budgetInvestissement))
		{
			Flash::error('BudgetInvestissement que vous cherchez n\'est pas disponible');

			return redirect(route('budgetInvestissements.index'));
		}

		$budgetInvestissement = $this->budgetInvestissementRepository->updateRich($request->all(), $id);

		Flash::success('BudgetInvestissement est modifié avec succés.');

		return redirect(route('budgetInitials.index'));
	}

	/**
	 * Remove the specified BudgetInvestissement from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$budgetInvestissement = $this->budgetInvestissementRepository->find($id);

		if(empty($budgetInvestissement))
		{
			Flash::error('BudgetInvestissement que vous cherchez n\'est pas disponible');

			return redirect(route('budgetInvestissements.index'));
		}

		$this->budgetInvestissementRepository->delete($id);

		Flash::success('BudgetInvestissement est supprimé avec succès.');

		return redirect(route('budgetInvestissements.index'));
	}
}
