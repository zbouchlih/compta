<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Libraries\Repositories\ProfileRepository;
use Flash;
//use Mitul\Controller\AppBaseController as Controller;
use Response;
use DB;

class ProfileController extends Controller
{

	/** @var  ProfileRepository */
	private $profileRepository;

	function __construct(ProfileRepository $profileRepo)
	{
		$this->profileRepository = $profileRepo;
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the profile.
	 *
	 * @return Response
	 */
	public function index()
	{

		//$test = DB::table('roles')->select('id', 'name as role')->get();
		$profiles = DB::table('roles')
               ->Join('profiles', 'roles.id', '=', 'profiles.idRole')
               ->paginate(7);

               //var_dump($test);

			$links = str_replace('/?', '?', $profiles->render());

        return view('profiles.index', compact('profiles', 'links'));

         

       
	}

	/**
	 * Show the form for creating a new profile.
	 *
	 * @return Response
	 */
	public function create()
	{
		$roles = DB::table('roles')->lists('role','id');
		return view('profiles.create', compact('roles'));
	}

	/**
	 * Store a newly created profile in storage.
	 *
	 * @param CreateprofileRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateProfileRequest $request)
	{
		$input = $request->all();

		$profile = $this->profileRepository->create($input);
		$budgets = DB::select('select * from budgets');
		
		foreach($budgets as $budget)
		{
			DB::table('repartitions')->insert([
				  'idBudget' => $budget->id,
		          'idProfile' => $profile['id'],
		          'budget' => 0
			]);
		}

		Flash::success('profile est enregistré avec succès.');

		return redirect(route('profiles.index'));
	}

	/**
	 * Display the specified profile.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		//$profile = $this->profileRepository->find($id);
		$profile = DB::table('roles')
               ->Join('profiles', 'profiles.idRole', '=', 'roles.id')->where('profiles.id','=',$id)->first();
		if(empty($profile))
		{
			Flash::error('profile que vous cherchez n est pas disponible');

			return redirect(route('profiles.index'));
		}

		return view('profiles.show')->with('profile', $profile);
	}

	/**
	 * Show the form for editing the specified profile.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$profile = $this->profileRepository->find($id);
		$roles = DB::table('roles')->lists('role','id');

		if(empty($profile))
		{
			Flash::error('profile que vous cherchez n est pas disponible');

			return redirect(route('profiles.index'));
		}

		return view('profiles.edit')->with('profile', $profile)->with('roles',$roles);
	}

	/**
	 * Update the specified profile in storage.
	 *
	 * @param  int              $id
	 * @param UpdateprofileRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateProfileRequest $request)
	{
		$profile = $this->profileRepository->find($id);

		if(empty($profile))
		{
			Flash::error('profile que vous cherchez n est pas disponible');

			return redirect(route('profiles.index'));
		}

		$profile = $this->profileRepository->updateRich($request->all(), $id);

		Flash::success('profile est modifié avec succés.');

		return redirect(route('profiles.index'));
	}

	/**
	 * Remove the specified profile from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$profile = $this->profileRepository->find($id);

		if(empty($profile))
		{
			Flash::error('profile que vous cherchez n est pas disponible');

			return redirect(route('profiles.index'));
		}

		$this->profileRepository->delete($id);

		Flash::success('profile est supprimé avec succès.');

		return redirect(route('profiles.index'));
	}

}
