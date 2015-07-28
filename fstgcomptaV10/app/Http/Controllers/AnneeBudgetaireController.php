<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateAnneebudgetaireRequest;
use App\Http\Requests\UpdateAnneebudgetaireRequest;
use App\Libraries\Repositories\AnneebudgetaireRepository;
use Flash;
use Response;
use DB;
use App\Models\Anneebudgetaire;

class AnneebudgetaireController extends Controller
{

	/** @var  AnneebudgetaireRepository */
	private $anneebudgetaireRepository;

	function __construct(AnneebudgetaireRepository $anneebudgetaireRepo)
	{
		$this->anneebudgetaireRepository = $anneebudgetaireRepo;
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the Anneebudgetaire.
	 *
	 * @return Response
	 */
	public function index()
	{
		$anneebudgetaires = $this->anneebudgetaireRepository->paginate(20);

			$links = str_replace('/?', '?', $anneebudgetaires->render());

        return view('anneebudgetaires.index', compact('anneebudgetaires', 'links'));
	}

	/**
	 * Show the form for creating a new Anneebudgetaire.
	 *
	 * @return Response
	 */
	public function create()
	{
		$input= array();
		$annee=DB::table('anneebudgetaires')->max('annee')+1;
		$input['annee']=$annee;
		$input['etat']=0;
		//return view('anneebudgetaires.create');
	}

	/**
	 * Store a newly created Anneebudgetaire in storage.
	 *
	 * @param CreateAnneebudgetaireRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateAnneebudgetaireRequest $request)
	{
		$input = $request->all();
		
		$anneebudgetaire = $this->anneebudgetaireRepository->create($input);

		
		$this->anneebudgetaireRepository->createbudgets();
		$this->anneebudgetaireRepository->createrepartitions();

		Flash::success('La nouvelle année budgétaire est créée avec succès.');

		return redirect(route('anneebudgetaires.index'));
	}

	/**
	 * Display the specified Anneebudgetaire.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$anneebudgetaire = $this->anneebudgetaireRepository->find($id);

		if(empty($anneebudgetaire))
		{
			Flash::error('L\'année budgétaire que vous cherchez n\'est pas disponible');

			return redirect(route('anneebudgetaires.index'));
		}

		return view('anneebudgetaires.show')->with('anneebudgetaire', $anneebudgetaire);
	}

	/**
	 * Show the form for editing the specified Anneebudgetaire.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$anneebudgetaire = $this->anneebudgetaireRepository->find($id);

		if(empty($anneebudgetaire))
		{
			Flash::error('L\'année budgétaire que vous cherchez n\'est pas disponible');

			return redirect(route('anneebudgetaires.index'));
		}

		return view('anneebudgetaires.edit')->with('anneebudgetaire', $anneebudgetaire);
	}

	/**
	 * Update the specified Anneebudgetaire in storage.
	 *
	 * @param  int              $id
	 * @param UpdateAnneebudgetaireRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateAnneebudgetaireRequest $request)
	{
		$anneebudgetaire = $this->anneebudgetaireRepository->find($id);

		if(empty($anneebudgetaire))
		{
			Flash::error('L\'année budgétaire que vous cherchez n\'est pas disponible');

			return redirect(route('anneebudgetaires.index'));
		}

		$anneebudgetaire = $this->anneebudgetaireRepository->updateRich($request->all(), $id);

		Flash::success('L\'année budgétaire est modifiée avec succés.');

		return redirect(route('anneebudgetaires.index'));
	}

	/**
	 * Remove the specified Anneebudgetaire from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$anneebudgetaire = $this->anneebudgetaireRepository->find($id);

		if(empty($anneebudgetaire))
		{
			Flash::error('L\'année budgétaire que vous cherchez n\'est pas disponible');

			return redirect(route('anneebudgetaires.index'));
		}

		$this->anneebudgetaireRepository->delete($id);

		Flash::success('L\'année budgétaire est supprimée avec succès.');

		return redirect(route('anneebudgetaires.index'));
	}
}
