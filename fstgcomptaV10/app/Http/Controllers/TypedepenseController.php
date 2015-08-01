<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateTypedepenseRequest;
use App\Http\Requests\UpdateTypedepenseRequest;
use App\Libraries\Repositories\TypedepenseRepository;
use Flash;
//use Mitul\Controller\AppBaseController as Controller;
use Response;

class TypedepenseController extends Controller
{

	/** @var  TypedepenseRepository */
	private $typedepenseRepository;

	function __construct(TypedepenseRepository $typedepenseRepo)
	{
		$this->typedepenseRepository = $typedepenseRepo;
			$this->middleware('auth');
	}

	/**
	 * Display a listing of the Typedepense.
	 *
	 * @return Response
	 */
	public function index()
	{
		$typedepenses = $this->typedepenseRepository->paginate(7);

			$links = str_replace('/?', '?', $typedepenses->render());

        return view('typedepenses.index', compact('typedepenses', 'links'));
	}

	/**
	 * Show the form for creating a new Typedepense.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('typedepenses.create');
	}

	/**
	 * Store a newly created Typedepense in storage.
	 *
	 * @param CreateTypedepenseRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateTypedepenseRequest $request)
	{
		$input = $request->all();

		$typedepense = $this->typedepenseRepository->create($input);

		Flash::success('Typedepense est enregistré avec succès.');

		return redirect(route('typedepenses.index'));
	}

	/**
	 * Display the specified Typedepense.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$typedepense = $this->typedepenseRepository->find($id);

		if(empty($typedepense))
		{
			Flash::error('Typedepense que vous cherchez n\'est pas disponible');

			return redirect(route('typedepenses.index'));
		}

		return view('typedepenses.show')->with('typedepense', $typedepense);
	}

	/**
	 * Show the form for editing the specified Typedepense.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$typedepense = $this->typedepenseRepository->find($id);

		if(empty($typedepense))
		{
			Flash::error('Typedepense que vous cherchez n\'est pas disponible');

			return redirect(route('typedepenses.index'));
		}

		return view('typedepenses.edit')->with('typedepense', $typedepense);
	}

	/**
	 * Update the specified Typedepense in storage.
	 *
	 * @param  int              $id
	 * @param UpdateTypedepenseRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateTypedepenseRequest $request)
	{
		$typedepense = $this->typedepenseRepository->find($id);

		if(empty($typedepense))
		{
			Flash::error('Typedepense que vous cherchez n\'est pas disponible');

			return redirect(route('typedepenses.index'));
		}

		$typedepense = $this->typedepenseRepository->updateRich($request->all(), $id);

		Flash::success('Typedepense est modifié avec succés.');

		return redirect(route('typedepenses.index'));
	}

	/**
	 * Remove the specified Typedepense from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$typedepense = $this->typedepenseRepository->find($id);

		if(empty($typedepense))
		{
			Flash::error('Typedepense que vous cherchez n\'est pas disponible');

			return redirect(route('typedepenses.index'));
		}

		$this->typedepenseRepository->delete($id);

		Flash::success('Typedepense est supprimé avec succès.');

		return redirect(route('typedepenses.index'));
	}
}
