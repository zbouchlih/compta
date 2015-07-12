<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateRightRequest;
use App\Http\Requests\UpdateRightRequest;
use App\Libraries\Repositories\RightRepository;
use Flash;
//use Mitul\Controller\AppBaseController as Controller;
use Response;

class RightController extends Controller
{

	/** @var  RightRepository */
	private $rightRepository;

	function __construct(RightRepository $rightRepo)
	{
		$this->rightRepository = $rightRepo;
	}

	/**
	 * Display a listing of the Right.
	 *
	 * @return Response
	 */
	public function index()
	{
		$rights = $this->rightRepository->paginate(7);

			$links = str_replace('/?', '?', $rights->render());

        return view('rights.index', compact('rights', 'links'));
	}

	/**
	 * Show the form for creating a new Right.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('rights.create');
	}

	/**
	 * Store a newly created Right in storage.
	 *
	 * @param CreateRightRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateRightRequest $request)
	{
		$input = $request->all();

		$right = $this->rightRepository->create($input);

		Flash::success('Right est enregistré avec succès.');

		return redirect(route('rights.index'));
	}

	/**
	 * Display the specified Right.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$right = $this->rightRepository->find($id);

		if(empty($right))
		{
			Flash::error('Right que vous cherchez n est pas disponible');

			return redirect(route('rights.index'));
		}

		return view('rights.show')->with('right', $right);
	}

	/**
	 * Show the form for editing the specified Right.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$right = $this->rightRepository->find($id);

		if(empty($right))
		{
			Flash::error('Right que vous cherchez n est pas disponible');

			return redirect(route('rights.index'));
		}

		return view('rights.edit')->with('right', $right);
	}

	/**
	 * Update the specified Right in storage.
	 *
	 * @param  int              $id
	 * @param UpdateRightRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateRightRequest $request)
	{
		$right = $this->rightRepository->find($id);

		if(empty($right))
		{
			Flash::error('Right que vous cherchez n est pas disponible');

			return redirect(route('rights.index'));
		}

		$right = $this->rightRepository->updateRich($request->all(), $id);

		Flash::success('Right est modifié avec succés.');

		return redirect(route('rights.index'));
	}

	/**
	 * Remove the specified Right from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$right = $this->rightRepository->find($id);

		if(empty($right))
		{
			Flash::error('Right que vous cherchez n est pas disponible');

			return redirect(route('rights.index'));
		}

		$this->rightRepository->delete($id);

		Flash::success('Right est supprimé avec succès.');

		return redirect(route('rights.index'));
	}
}
