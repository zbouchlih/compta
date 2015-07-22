<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateBudgetInitialRequest;
use App\Http\Requests\UpdateBudgetInitialRequest;
use App\Libraries\Repositories\BudgetInitialRepository;
use Flash;
//use Mitul\Controller\AppBaseController as Controller;
use Response;
use DB;

class BudgetInitialController extends Controller
{

	/** @var  BudgetInitialRepository */
	private $budgetInitialRepository;

	function __construct(BudgetInitialRepository $budgetInitialRepo)
	{
		$this->budgetInitialRepository = $budgetInitialRepo;
	}

	/**
	 * Display a listing of the BudgetInitial.
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
		$annees = DB::table('anneeBudgetaires')->lists('annee','id');
		$budgetFonctionnements = DB::select('select * from budgetfonctionnements where idAnnee = :idAnnee', ['idAnnee' => $idAnnee]);
		$budgetInvestissements = DB::select('select * from budgetInvestissements where idAnnee = :idAnnee', ['idAnnee' => $idAnnee]);
		$budgetInitials = $this->budgetInitialRepository->paginate(7);

			$links = str_replace('/?', '?', $budgetInitials->render());

        return view('budgetInitials.index', compact('budgetInitials', 'links', 'annees', 'budgetFonctionnements', 'budgetInvestissements'));
	}

	/**
	 * Show the form for creating a new BudgetInitial.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('budgetInitials.create');
	}

	/**
	 * Store a newly created BudgetInitial in storage.
	 *
	 * @param CreateBudgetInitialRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateBudgetInitialRequest $request)
	{
		$input = $request->all();

		$budgetInitial = $this->budgetInitialRepository->create($input);

		Flash::success('BudgetInitial est enregistré avec succès.');

		return redirect(route('budgetInitials.index'));
	}

	/**
	 * Display the specified BudgetInitial.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$budgetInitial = $this->budgetInitialRepository->find($id);

		if(empty($budgetInitial))
		{
			Flash::error('BudgetInitial que vous cherchez n est pas disponible');

			return redirect(route('budgetInitials.index'));
		}

		return view('budgetInitials.show')->with('budgetInitial', $budgetInitial);
	}

	/**
	 * Show the form for editing the specified BudgetInitial.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$budgetInitial = $this->budgetInitialRepository->find($id);

		if(empty($budgetInitial))
		{
			Flash::error('BudgetInitial que vous cherchez n est pas disponible');

			return redirect(route('budgetInitials.index'));
		}

		return view('budgetInitials.edit')->with('budgetInitial', $budgetInitial);
	}

	/**
	 * Update the specified BudgetInitial in storage.
	 *
	 * @param  int              $id
	 * @param UpdateBudgetInitialRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateBudgetInitialRequest $request)
	{
		$budgetInitial = $this->budgetInitialRepository->find($id);

		if(empty($budgetInitial))
		{
			Flash::error('BudgetInitial que vous cherchez n est pas disponible');

			return redirect(route('budgetInitials.index'));
		}

		$budgetInitial = $this->budgetInitialRepository->updateRich($request->all(), $id);

		Flash::success('BudgetInitial est modifié avec succés.');

		return redirect(route('budgetInitials.index'));
	}

	/**
	 * Remove the specified BudgetInitial from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$budgetInitial = $this->budgetInitialRepository->find($id);

		if(empty($budgetInitial))
		{
			Flash::error('BudgetInitial que vous cherchez n est pas disponible');

			return redirect(route('budgetInitials.index'));
		}

		$this->budgetInitialRepository->delete($id);

		Flash::success('BudgetInitial est supprimé avec succès.');

		return redirect(route('budgetInitials.index'));
	}
}
