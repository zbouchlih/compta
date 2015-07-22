<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateTypeBudgetRequest;
use App\Http\Requests\UpdateTypeBudgetRequest;
use App\Libraries\Repositories\TypeBudgetRepository;
use Flash;
//use Mitul\Controller\AppBaseController as Controller;
use Response;

class TypeBudgetController extends Controller
{

	/** @var  TypeBudgetRepository */
	private $typeBudgetRepository;

	function __construct(TypeBudgetRepository $typeBudgetRepo)
	{
		$this->typeBudgetRepository = $typeBudgetRepo;
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the TypeBudget.
	 *
	 * @return Response
	 */
	public function index()
	{
		$typeBudgets = $this->typeBudgetRepository->paginate(7);

			$links = str_replace('/?', '?', $typeBudgets->render());

        return view('typeBudgets.index', compact('typeBudgets', 'links'));
	}

	/**
	 * Show the form for creating a new TypeBudget.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('typeBudgets.create');
	}

	/**
	 * Store a newly created TypeBudget in storage.
	 *
	 * @param CreateTypeBudgetRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateTypeBudgetRequest $request)
	{
		$input = $request->all();

		$typeBudget = $this->typeBudgetRepository->create($input);

		Flash::success('Le type de budget est enregistré avec succès.');

		return redirect(route('typeBudgets.index'));
	}

	/**
	 * Display the specified TypeBudget.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$typeBudget = $this->typeBudgetRepository->find($id);

		if(empty($typeBudget))
		{
			Flash::error('Le Type de budget que vous cherchez n\'est pas disponible');

			return redirect(route('typeBudgets.index'));
		}

		return view('typeBudgets.show')->with('typeBudget', $typeBudget);
	}

	/**
	 * Show the form for editing the specified TypeBudget.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$typeBudget = $this->typeBudgetRepository->find($id);

		if(empty($typeBudget))
		{
			Flash::error('Le Type de budget que vous cherchez n\'est pas disponible');

			return redirect(route('typeBudgets.index'));
		}

		return view('typeBudgets.edit')->with('typeBudget', $typeBudget);
	}

	/**
	 * Update the specified TypeBudget in storage.
	 *
	 * @param  int              $id
	 * @param UpdateTypeBudgetRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateTypeBudgetRequest $request)
	{
		$typeBudget = $this->typeBudgetRepository->find($id);

		if(empty($typeBudget))
		{
			Flash::error('Le Type de Budget que vous cherchez n\'est pas disponible');

			return redirect(route('typeBudgets.index'));
		}

		$typeBudget = $this->typeBudgetRepository->updateRich($request->all(), $id);

		Flash::success('Le Type de Budget est modifié avec succés.');

		return redirect(route('typeBudgets.index'));
	}

	/**
	 * Remove the specified TypeBudget from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$typeBudget = $this->typeBudgetRepository->find($id);

		if(empty($typeBudget))
		{
			Flash::error('Le Type de Budget que vous cherchez n\'est pas disponible');

			return redirect(route('typeBudgets.index'));
		}

		$this->typeBudgetRepository->delete($id);

		Flash::success('Le Type de Budget est supprimé avec succès.');

		return redirect(route('typeBudgets.index'));
	}
}
