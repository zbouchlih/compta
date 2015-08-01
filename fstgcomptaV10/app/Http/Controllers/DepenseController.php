<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateDepenseRequest;
use App\Http\Requests\UpdateDepenseRequest;
use App\Libraries\Repositories\DepenseRepository;
use Flash;
use App\Models\Depense;
use App\Models\Compterepartition;
use Response;
use DB;

class DepenseController extends Controller
{

	/** @var  DepenseRepository */
	private $depenseRepository;

	function __construct(DepenseRepository $depenseRepo)
	{
		$this->depenseRepository = $depenseRepo;
			$this->middleware('auth');
	}

	/**
	 * Display a listing of the Depense.
	 *
	 * @return Response
	 */
	public function index($idCompterepartition)
	{
		$depenses=Depense::where('idCompterepartition',$idCompterepartition)->paginate(20);
		//$depenses = $this->depenseRepository->paginate(20);
		$compte=Compterepartition::find($idCompterepartition)->comptes->compte;
			$links = str_replace('/?', '?', $depenses->render());

        return view('depenses.index', compact('depenses', 'links'))->with('idCompterepartition',$idCompterepartition)->with('compte',$compte);
	}

	/**
	 * Show the form for creating a new Depense.
	 *
	 * @return Response
	 */
	public function create($idCompterepartition)
	{
		
		$typedepenses = DB::table('typedepenses')->lists('type','id');
		return view('depenses.create')->with('typedepenses',$typedepenses)->with('idCompterepartition',$idCompterepartition);
	}

	/**
	 * Store a newly created Depense in storage.
	 *
	 * @param CreateDepenseRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateDepenseRequest $request)
	{
		$input = $request->all();

		$depense = $this->depenseRepository->create($input);
		$idCompterepartition=$input['idCompterepartition'];
		Flash::success('Depense est enregistré avec succès.');

		return redirect(route('depenses.index',$idCompterepartition));
	}

	/**
	 * Display the specified Depense.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$depense = $this->depenseRepository->find($id);

		if(empty($depense))
		{
			Flash::error('Depense que vous cherchez n\'est pas disponible');

			return redirect(route('depenses.index'));
		}

		return view('depenses.show')->with('depense', $depense);
	}

	/**
	 * Show the form for editing the specified Depense.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$depense = $this->depenseRepository->find($id);
		$typedepenses = DB::table('typedepenses')->lists('type','id');
		if(empty($depense))
		{
			Flash::error('Depense que vous cherchez n\'est pas disponible');

			return redirect(route('depenses.index'));
		}
		$idCompterepartition=$depense->idCompterepartition;
		return view('depenses.edit')->with('depense', $depense)->with('idCompterepartition',$idCompterepartition)->with('typedepenses',$typedepenses);
	}

	/**
	 * Update the specified Depense in storage.
	 *
	 * @param  int              $id
	 * @param UpdateDepenseRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateDepenseRequest $request)
	{
		$depense = $this->depenseRepository->find($id);
		$idCompterepartition=$depense->idCompterepartition;
		if(empty($depense))
		{
			Flash::error('Depense que vous cherchez n\'est pas disponible');

			return redirect(route('depenses.index'));
		}

		$depense = $this->depenseRepository->updateRich($request->all(), $id);
		 
		Flash::success('Depense est modifié avec succés.');

		return redirect(route('depenses.index',$idCompterepartition));
	}

	/**
	 * Remove the specified Depense from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$depense = $this->depenseRepository->find($id);
		$idCompterepartition=$depense->idCompterepartition;
		if(empty($depense))
		{
			Flash::error('Depense que vous cherchez n\'est pas disponible');

			return redirect(route('depenses.index'));
		}

		$this->depenseRepository->delete($id);

		Flash::success('Depense est supprimé avec succès.');

			return redirect(route('depenses.index',$idCompterepartition));
	}
}
