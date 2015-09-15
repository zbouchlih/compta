<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateTraitementRequest;
use App\Http\Requests\UpdateTraitementRequest;
use App\Libraries\Repositories\TraitementRepository;
use App\Libraries\Repositories\ProfileRepository;
use Flash;
//use Mitul\Controller\AppBaseController as Controller;
use Response;
use DB;
use App\Models\Repartition;
use App\Models\Compterepartition;
use App\Models\Anneebudgetaire;

class TraitementController extends Controller
{

	/** @var  TraitementRepository */
	private $traitementRepository;

	function __construct(TraitementRepository $traitementRepo)
	{
		$this->traitementRepository = $traitementRepo;
			$this->middleware('auth');
	}

	/**
	 * Display a listing of the Traitement.
	 *
	 * @return Response
	 */
	public function index()
	{
        $annees = DB::table('anneebudgetaires')->lists('annee','id');
        $annee = DB::table('anneebudgetaires')->first()->id;
        $profiles = DB::table('profiles')->paginate(20);
        $links = str_replace('/?', '?', $profiles->render());

        return view('traitements.index', compact('profiles', 'links','annees','annee'));
	}


//    ***************************
	public function indexajax()
	{
        $annee=$_GET['idAnnee'];
        $annees = DB::table('anneebudgetaires')->lists('annee','id');
        $profiles = DB::table('profiles')->paginate(20);
        $links = str_replace('/?', '?', $profiles->render());
        $data=view('traitements.table', compact('profiles', 'links','annees','annee'))->render();

        return response()->json($data);
	}

	/**
	 * Show the form for creating a new Traitement.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('traitements.create');
	}

	/**
	 * Store a newly created Traitement in storage.
	 *
	 * @param CreateTraitementRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateTraitementRequest $request)
	{
		$input = $request->all();

		$traitement = $this->traitementRepository->create($input);

		Flash::success('Traitement est enregistré avec succès.');

		return redirect(route('traitements.index'));
	}

	/**
	 * Display the specified Traitement.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$traitement = $this->traitementRepository->find($id);

		if(empty($traitement))
		{
			Flash::error('Traitement que vous cherchez n\'est pas disponible');

			return redirect(route('traitements.index'));
		}

		return view('traitements.show')->with('traitement', $traitement);
	}

	/**
	 * Show the form for editing the specified Traitement.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($idProfile,$idAnnee)
	{
        $repartitions=Repartition::whereIn('idBudget',Anneebudgetaire::find($idAnnee)->budgets->lists('id'))->where('idProfile',$idProfile)->paginate(40);
        $compterepartitions = Compterepartition::whereIn('repartition_id',$repartitions->lists('id'))->paginate(7);

		return view('traitements.edit')->with('compterepartitions', $compterepartitions)->with('repartitions', $repartitions);;
	}

	/**
	 * Update the specified Traitement in storage.
	 *
	 * @param  int              $id
	 * @param UpdateTraitementRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateTraitementRequest $request)
	{
		$traitement = $this->traitementRepository->find($id);

		if(empty($traitement))
		{
			Flash::error('Traitement que vous cherchez n\'est pas disponible');

			return redirect(route('traitements.index'));
		}

		$traitement = $this->traitementRepository->updateRich($request->all(), $id);

		Flash::success('Traitement est modifié avec succés.');

		return redirect(route('traitements.index'));
	}

	/**
	 * Remove the specified Traitement from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$traitement = $this->traitementRepository->find($id);

		if(empty($traitement))
		{
			Flash::error('Traitement que vous cherchez n\'est pas disponible');

			return redirect(route('traitements.index'));
		}

		$this->traitementRepository->delete($id);

		Flash::success('Traitement est supprimé avec succès.');

		return redirect(route('traitements.index'));
	}
}
