<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Libraries\Repositories\RoleRepository;
use App\Libraries\Repositories\RightRepository;
use Flash;
//use Mitul\Controller\AppBaseController as Controller;
use Response;
use DB;
use App\Models\Role;

class RoleController extends Controller
{

	/** @var  RoleRepository */
	private $roleRepository;
	private $rightRepository;

	function __construct(RoleRepository $roleRepo,RightRepository $rightRepo)
	{
		$this->roleRepository = $roleRepo;
		$this->rightRepository=$rightRepo;
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the Role.
	 *
	 * @return Response
	 */
	public function index()
	{
		$roles = $this->roleRepository->paginate(20);

			$links = str_replace('/?', '?', $roles->render());

        return view('roles.index', compact('roles', 'links'));
	}

	/**
	 * Show the form for creating a new Role.
	 *
	 * @return Response
	 */
	public function create()
	{
		$rights = DB::table('rights')->get();
		
		return view('roles.create',compact('rights'));
	}

	/**
	 * Store a newly created Role in storage.
	 *
	 * @param CreateRoleRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateRoleRequest $request, RightRepository $rightRepository )
	{
		$input = $request->all();

		$role = $this->roleRepository->create($input);

		if(isset($input['rights'])) 
		{
			$rightRepository->store($role, $input['rights']);
		}

		Flash::success('le rôle est enregistré avec succès.');

		return redirect(route('roles.index'));
	}

	/**
	 * Display the specified Role.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$role = $this->roleRepository->find($id);

		if(empty($role))
		{
			Flash::error('Le rôle que vous cherchez n\'est pas disponible');

			return redirect(route('roles.index'));
		}

		return view('roles.show')->with('role', $role);
	}

	/**
	 * Show the form for editing the specified Role.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$rights = DB::table('rights')->get();

		$role = $this->roleRepository->find($id);
		$checked= array();
		
		$checked=$this->rightRepository->selected($role,$rights);

		if(empty($role))
		{
			Flash::error('Le rôle que vous cherchez n\'est pas disponible');

			return redirect(route('roles.index'));
		}

		return view('roles.edit')->with('role', $role)->with('checked',$checked)->with('rights',$rights);
	}

	/**
	 * Update the specified Role in storage.
	 *
	 * @param  int              $id
	 * @param UpdateRoleRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateRoleRequest $request,RightRepository $rightRepository)
	{
		$role = $this->roleRepository->find($id);
		$input = $request->all();
		if(empty($role))
		{
			Flash::error('Le rôle que vous cherchez n\'est pas disponible');

			return redirect(route('roles.index'));
		}
		if(isset($input['rightz'])) 
		{
			$rightRepository->modify($role, $input['rightz']);
		}
		
		$role = $this->roleRepository->updateRich($request->all(), $id);

		Flash::success('Le rôle est modifié avec succés.');

		return redirect(route('roles.index'));
	}

	/**
	 * Remove the specified Role from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id, RightRepository $rightRepository)
	{
		$role = $this->roleRepository->find($id);

		if(empty($role))
		{
			Flash::error('Le rôle que vous cherchez n\'est pas disponible');

			return redirect(route('roles.index'));
		}
		$rightRepository->destroy($role);
		$this->roleRepository->delete($id);

		Flash::success('Le rôle le est supprimé avec succès.');

		return redirect(route('roles.index'));
	}
}
