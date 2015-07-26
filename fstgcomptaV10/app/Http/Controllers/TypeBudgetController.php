<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateTypebudgetRequest;
use App\Http\Requests\UpdateTypebudgetRequest;
use App\Libraries\Repositories\TypebudgetRepository;
use Flash;
use App\Models\Typebudget;
use Response;

class TypebudgetController extends Controller
{

	/** @var  TypebudgetRepository */
	private $typebudgetRepository;

	function __construct(TypebudgetRepository $typebudgetRepo)
	{
		$this->typebudgetRepository = $typebudgetRepo;
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the Typebudget.
	 *
	 * @return Response
	 */
	public function index()
	{
		$typebudgets = $this->typebudgetRepository->paginate(7);

			$links = str_replace('/?', '?', $typebudgets->render());

        return view('typebudgets.index', compact('typebudgets', 'links'));
	}

	/**
	 * Show the form for creating a new Typebudget.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('typebudgets.create');
	}

	/**
	 * Store a newly created Typebudget in storage.
	 *
	 * @param CreateTypebudgetRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateTypebudgetRequest $request)
	{
		$input = $request->all();

		$typebudget = $this->typebudgetRepository->create($input);

		Flash::success('Le type de budget est enregistré avec succès.');

		return redirect(route('typebudgets.index'));
	}

	/**
	 * Display the specified Typebudget.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$typebudget = $this->typebudgetRepository->find($id);

		if(empty($typebudget))
		{
			Flash::error('Le Type de budget que vous cherchez n\'est pas disponible');

			return redirect(route('typebudgets.index'));
		}

		return view('typebudgets.show')->with('typebudget', $typebudget);
	}

	/**
	 * Show the form for editing the specified Typebudget.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$typebudget = $this->typebudgetRepository->find($id);

		if(empty($typebudget))
		{
			Flash::error('Le Type de budget que vous cherchez n\'est pas disponible');

			return redirect(route('typebudgets.index'));
		}

		return view('typebudgets.edit')->with('typebudget', $typebudget);
	}

	/**
	 * Update the specified Typebudget in storage.
	 *
	 * @param  int              $id
	 * @param UpdateTypebudgetRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateTypebudgetRequest $request)
	{
		$typebudget = $this->typebudgetRepository->find($id);

		if(empty($typebudget))
		{
			Flash::error('Le Type de budget que vous cherchez n\'est pas disponible');

			return redirect(route('typebudgets.index'));
		}

		$typebudget = $this->typebudgetRepository->updateRich($request->all(), $id);

		Flash::success('Le Type de budget est modifié avec succés.');

		return redirect(route('typebudgets.index'));
	}

	/**
	 * Remove the specified Typebudget from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$typebudget = $this->typebudgetRepository->find($id);

		if(empty($typebudget))
		{
			Flash::error('Le Type de budget que vous cherchez n\'est pas disponible');

			return redirect(route('typebudgets.index'));
		}

		$this->typebudgetRepository->delete($id);

		Flash::success('Le Type de budget est supprimé avec succès.');

		return redirect(route('typebudgets.index'));
	}
}
