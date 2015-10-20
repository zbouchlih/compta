<?php namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\CreateCompteRequest;
use App\Http\Requests\UpdateCompteRequest;
use App\Libraries\Repositories\CompteRepository;
use Flash;
use Session;
use Response;
use DB;
use App\Models\Compte;
class CompteController extends Controller
{

	/** @var  CompteRepository */
	private $compteRepository;

	function __construct(CompteRepository $compteRepo)
	{
		$this->compteRepository = $compteRepo;
			$this->middleware('auth');
	}

	/**
	 * Display a listing of the Compte.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		extract($_GET);
		if(!isset($id))
		{
			$idTypebudget=1;
		}
//        else if($request->ajax()){
//            $idTypebudget = $_GET['idTypebudget'];
//        }

		$typebudgets = DB::table('typebudgets')->lists('type','id');
        $comptes = Compte::where('idTypebudget','=',$idTypebudget)->paginate(40);

			$links = str_replace('/?', '?', $comptes->render());
//        if($request->ajax()){
//            $data=view('comptes.table', compact('comptes', 'links' ,'typebudgets','idTypebudget'))->render();
//            return response()->json($data);
//        }
        return view('comptes.index', compact('comptes', 'links' ,'typebudgets','idTypebudget'));
		
	}
    public function indexAjax()
    {
        $idTypebudget = $_GET['idTypebudget'];
        $typebudgets = DB::table('typebudgets')->lists('type','id');
        $comptes = Compte::where('idTypebudget','=',$idTypebudget)->paginate(40);

        $links = str_replace('/?', '?', $comptes->render());

        $data=view('comptes.table', compact('comptes', 'links' ,'typebudgets','idTypebudget'))->render();
        return response()->json($data);
    }

	/**
	 * Show the form for creating a new Compte.
	 *
	 * @return Response
	 */
	public function create()
	{
		$typebudgets = DB::table('typebudgets')->lists('type','id');
		return view('comptes.create')->with('typebudgets', $typebudgets);
	}

	/**
	 * Store a newly created Compte in storage.
	 *
	 * @param CreateCompteRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateCompteRequest $request)
	{
		$input = $request->all();

		$compte = $this->compteRepository->create($input);

		Flash::success('Compte est enregistré avec succès.');

		return redirect(route('comptes.index'));
	}

	/**
	 * Display the specified Compte.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{

		$compte = $this->compteRepository->find($id);

		if(empty($compte))
		{
			Flash::error('Compte que vous cherchez n\'est pas disponible');

			return redirect(route('comptes.index'));
		}

		return view('comptes.show')->with('compte', $compte);
	}

	/**
	 * Show the form for editing the specified Compte.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{

		$typebudgets = DB::table('typebudgets')->lists('type','id');
		$compte = $this->compteRepository->find($id);

		if(empty($compte))
		{
			Flash::error('Compte que vous cherchez n\'est pas disponible');

			return redirect(route('comptes.index'));
		}

		return view('comptes.edit')->with('compte', $compte)->with('typebudgets', $typebudgets);
	}

	/**
	 * Update the specified Compte in storage.
	 *
	 * @param  int              $id
	 * @param UpdateCompteRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateCompteRequest $request)
	{

		$compte = $this->compteRepository->find($id);

		if(empty($compte))
		{
			Flash::error('Compte que vous cherchez n\'est pas disponible');

			return redirect(route('comptes.index'));
		}

		$compte = $this->compteRepository->updateRich($request->all(), $id);

		Flash::success('Compte est modifié avec succés.');

		return redirect(route('comptes.index'));
	}

	/**
	 * Remove the specified Compte from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$compte = $this->compteRepository->find($id);

		if(empty($compte))
		{
			Flash::error('Compte que vous cherchez n\'est pas disponible');

			return redirect(route('comptes.index'));
		}

		$this->compteRepository->delete($id);

		Flash::success('Compte est supprimé avec succès.');

		return redirect(route('comptes.index'));
	}
}
