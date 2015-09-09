<?php namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Requests\CreateRepartitionRequest;
use App\Http\Requests\UpdateRepartitionRequest;
use App\Libraries\Repositories\RepartitionRepository;
use Flash;
use Response;
use DB;
use App\Models\Anneebudgetaire;
use App\Models\Repartition;
use App\Models\Budget;
class RepartitionController extends Controller
{
	/** @var  RepartitionRepository */
	private $repartitionRepository;
	function __construct(RepartitionRepository $repartitionRepo)
	{
		$this->repartitionRepository = $repartitionRepo;
			$this->middleware('auth');
	}
	/**
	 * Display a listing of the Repartition.
	 *
	 * @return Response
	 */
	public function index()
	{
		extract($_GET);
		if(!isset($idAnnee))
		{
			$idAnnee=35;
		}
        $budgets = Anneebudgetaire::find($idAnnee)->budgets;
        if($budgets->where('idTypebudget',1)->first()->modificatif!=0)
            {
                $actuelFon=$budgets->where('idTypebudget',1)->first()->modificatif;
            }
            else if($budgets->where('idTypebudget',1)->first()->initial!=0)
            {
                $actuelFon=$budgets->where('idTypebudget',1)->first()->initial;
            }
            else{
                $actuelFon=$budgets->where('idTypebudget',1)->first()->previsionnel;
            }
            if($budgets->where('idTypebudget',2)->first()->modificatif!=0)
            {
                $actuelInv=$budgets->where('idTypebudget',2)->first()->modificatif;
            }
            else if($budgets->where('idTypebudget',2)->first()->initial!=0)
            {
                $actuelInv=$budgets->where('idTypebudget',2)->first()->initial;
            }
            else{
                $actuelInv=$budgets->where('idTypebudget',2)->first()->previsionnel;
            }
            $annees = DB::table('anneebudgetaires')->lists('annee','id');
            $repartitions=Repartition::whereIn('idBudget',$budgets->lists('id'))->orderBy('idProfile', 'asc')->paginate(40);
            $repFon=Repartition::whereIn('idBudget',$budgets->lists('id'))->whereIn('idBudget',Budget::where('idTypeBudget',1)->lists('id'))->sum('budget');
            $repInv=Repartition::whereIn('idBudget',$budgets->lists('id'))->whereIn('idBudget',Budget::where('idTypeBudget',2)->lists('id'))->sum('budget');
			$restFon=$actuelFon-$repFon;
			$restInv=$actuelInv-$repInv;
            $etat = Anneebudgetaire::find($idAnnee)->etat;
            $links =str_replace('/?', '?', $repartitions->render());
        return view('repartitions.index', compact('repartitions', 'links' ,'etat','annees' ,'budgets','idAnnee','actuelFon','actuelInv','restFon','restInv'));
	}
    public function indexajax()
    {
        extract($_GET);
        if(!isset($idAnnee))
        {
            $idAnnee=35;
        }
        $budgets = Anneebudgetaire::find($idAnnee)->budgets;
        if($budgets->where('idTypebudget',1)->first()->modificatif!=0)
        {
            $actuelFon=$budgets->where('idTypebudget',1)->first()->modificatif;
        }
        else if($budgets->where('idTypebudget',1)->first()->initial!=0)
        {
            $actuelFon=$budgets->where('idTypebudget',1)->first()->initial;
        }
        else{
            $actuelFon=$budgets->where('idTypebudget',1)->first()->previsionnel;
        }
        if($budgets->where('idTypebudget',2)->first()->modificatif!=0)
        {
            $actuelInv=$budgets->where('idTypebudget',2)->first()->modificatif;
        }
        else if($budgets->where('idTypebudget',2)->first()->initial!=0)
        {
            $actuelInv=$budgets->where('idTypebudget',2)->first()->initial;
        }
        else{
            $actuelInv=$budgets->where('idTypebudget',2)->first()->previsionnel;
        }
        $annees = DB::table('anneebudgetaires')->lists('annee','id');
        $repartitions=Repartition::whereIn('idBudget',$budgets->lists('id'))->orderBy('idProfile', 'asc')->paginate(40);
        $repFon=Repartition::whereIn('idBudget',$budgets->lists('id'))->whereIn('idBudget',Budget::where('idTypeBudget',1)->lists('id'))->sum('budget');
        $repInv=Repartition::whereIn('idBudget',$budgets->lists('id'))->whereIn('idBudget',Budget::where('idTypeBudget',2)->lists('id'))->sum('budget');
        $restFon=$actuelFon-$repFon;
        $restInv=$actuelInv-$repInv;
        $etat = Anneebudgetaire::find($idAnnee)->etat;
        $links =str_replace('/?', '?', $repartitions->render());
        $data=view('repartitions.table', compact('repartitions', 'links' ,'etat','annees' ,'budgets','idAnnee','actuelFon','actuelInv','restFon','restInv'))->render();
        return response()->json($data);
    }
	/**
	 * Show the form for creating a new Repartition.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('repartitions.create');
	}
	/**
	 * Store a newly created Repartition in storage.
	 *
	 * @param CreateRepartitionRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateRepartitionRequest $request)
	{
		$input = $request->all();
		$repartition = $this->repartitionRepository->create($input);
		Flash::success('Repartition est enregistré avec succès.');
		return redirect(route('repartitions.index'));
	}
	/**
	 * Display the specified Repartition.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$repartition = $this->repartitionRepository->find($id);
		if(empty($repartition))
		{
			Flash::error('Repartition que vous cherchez n\'est pas disponible');
			return redirect(route('repartitions.index'));
		}
		return view('repartitions.show')->with('repartition', $repartition);
	}
	/**
	 * Show the form for editing the specified Repartition.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$repartition = $this->repartitionRepository->find($id);
		if(empty($repartition))
		{
			Flash::error('Repartition que vous cherchez n\'est pas disponible');
			return redirect(route('repartitions.index'));
		}
		return view('repartitions.edit')->with('repartition', $repartition);
	}
	public function editall($idAnnee)
	{
		$budgets = Anneebudgetaire::find($idAnnee)->budgets;
		
		$repartitions=Repartition::whereIn('idBudget',$budgets->lists('id'))->orderBy('idProfile', 'asc')->paginate(40);
			$links =str_replace('/?', '?', $repartitions->render());
        return view('repartitions.editall', compact('repartitions', 'links' ,'budgets','idAnnee'));
	}
	/**
	 * Update the specified Repartition in storage.
	 *
	 * @param  int              $id
	 * @param UpdateRepartitionRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateRepartitionRequest $request)
	{
		$repartition = $this->repartitionRepository->find($id);
		
		if(empty($repartition))
		{
			Flash::error('Repartition que vous cherchez n\'est pas disponible');
			return redirect(route('repartitions.index'));
		}
		$repartition = $this->repartitionRepository->updateRich($request->all(), $id);
		Flash::success('Repartition est modifié avec succés.');
		return redirect(route('repartitions.index'));
	}
	public function updateall($idAnnee, UpdateRepartitionRequest $request)
	{
		$inputs=$request->all();
		for ($i=0; $i < count($inputs['id']); $i++) { 
		$input['_method']='PATCH';
		$input['_token']=$inputs['_token'];
		$input['budget']=$inputs['budget'][$i];
		$repartition = $this->repartitionRepository->find($inputs['id'][$i]);
		$repartition = $this->repartitionRepository->updateRich($input, $inputs['id'][$i]);
		
		}
	
		Flash::success('Repartition est modifié avec succés.');
		return redirect(route('repartitions.index'));
	}
	/**
	 * Remove the specified Repartition from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$repartition = $this->repartitionRepository->find($id);
		if(empty($repartition))
		{
			Flash::error('Repartition que vous cherchez n\'est pas disponible');
			return redirect(route('repartitions.index'));
		}
		$this->repartitionRepository->delete($id);
		Flash::success('Repartition est supprimé avec succès.');
		return redirect(route('repartitions.index'));
	}
}