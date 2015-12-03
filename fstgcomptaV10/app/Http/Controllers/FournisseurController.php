<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateFournisseurRequest;
use App\Http\Requests\UpdateFournisseurRequest;
use App\Libraries\Repositories\FournisseurRepository;
use Flash;
//use Mitul\Controller\AppBaseController as Controller;
use Response;

class FournisseurController extends Controller
{

	/** @var  FournisseurRepository */
	private $fournisseurRepository;

	function __construct(FournisseurRepository $fournisseurRepo)
	{
		$this->fournisseurRepository = $fournisseurRepo;
			$this->middleware('auth');
	}

	/**
	 * Display a listing of the Fournisseur.
	 *
	 * @return Response
	 */
	public function index()
	{
		$fournisseurs = $this->fournisseurRepository->paginate(7);

			$links = str_replace('/?', '?', $fournisseurs->render());

        return view('fournisseurs.index', compact('fournisseurs', 'links'));
	}

	/**
	 * Show the form for creating a new Fournisseur.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('fournisseurs.create');
	}

	/**
	 * Store a newly created Fournisseur in storage.
	 *
	 * @param CreateFournisseurRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateFournisseurRequest $request)
	{
		$input = $request->all();

		$fournisseur = $this->fournisseurRepository->create($input);

		Flash::success('Fournisseur est enregistré avec succès.');

		return redirect(route('fournisseurs.index'));
	}

	/**
	 * Display the specified Fournisseur.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$fournisseur = $this->fournisseurRepository->find($id);

		if(empty($fournisseur))
		{
			Flash::error('Fournisseur que vous cherchez n\'est pas disponible');

			return redirect(route('fournisseurs.index'));
		}

		return view('fournisseurs.show')->with('fournisseur', $fournisseur);
	}

	/**
	 * Show the form for editing the specified Fournisseur.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$fournisseur = $this->fournisseurRepository->find($id);

		if(empty($fournisseur))
		{
			Flash::error('Fournisseur que vous cherchez n\'est pas disponible');

			return redirect(route('fournisseurs.index'));
		}

		return view('fournisseurs.edit')->with('fournisseur', $fournisseur);
	}

	/**
	 * Update the specified Fournisseur in storage.
	 *
	 * @param  int              $id
	 * @param UpdateFournisseurRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateFournisseurRequest $request)
	{
		$fournisseur = $this->fournisseurRepository->find($id);

		if(empty($fournisseur))
		{
			Flash::error('Fournisseur que vous cherchez n\'est pas disponible');

			return redirect(route('fournisseurs.index'));
		}

		$fournisseur = $this->fournisseurRepository->updateRich($request->all(), $id);

		Flash::success('Fournisseur est modifié avec succés.');

		return redirect(route('fournisseurs.index'));
	}

	/**
	 * Remove the specified Fournisseur from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$fournisseur = $this->fournisseurRepository->find($id);

		if(empty($fournisseur))
		{
			Flash::error('Fournisseur que vous cherchez n\'est pas disponible');

			return redirect(route('fournisseurs.index'));
		}

		$this->fournisseurRepository->delete($id);

		Flash::success('Fournisseur est supprimé avec succès.');

		return redirect(route('fournisseurs.index'));
	}
}
