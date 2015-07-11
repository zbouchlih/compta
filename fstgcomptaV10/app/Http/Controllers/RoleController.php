<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Libraries\Repositories\RoleRepository;
use Flash;
//use Mitul\Controller\AppBaseController as Controller;
use Response;

class RoleController extends Controller
{

	/** @var  RoleRepository */
	private $roleRepository;

	function __construct(RoleRepository $roleRepo)
	{
		$this->roleRepository = $roleRepo;
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the Role.
	 *
	 * @return Response
	 */
	public function index()
	{
		$roles = $this->roleRepository->paginate(7);

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
		return view('roles.create');
	}

	/**
	 * Store a newly created Role in storage.
	 *
	 * @param CreateRoleRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateRoleRequest $request)
	{
		$input = $request->all();

		$role = $this->roleRepository->create($input);

		Flash::success('Role est enregistré avec succès.');

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
			Flash::error('Role que vous cherchez n est pas disponible');

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
		$role = $this->roleRepository->find($id);

		if(empty($role))
		{
			Flash::error('Role que vous cherchez n est pas disponible');

			return redirect(route('roles.index'));
		}

		return view('roles.edit')->with('role', $role);
	}

	/**
	 * Update the specified Role in storage.
	 *
	 * @param  int              $id
	 * @param UpdateRoleRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateRoleRequest $request)
	{
		$role = $this->roleRepository->find($id);

		if(empty($role))
		{
			Flash::error('Role que vous cherchez n est pas disponible');

			return redirect(route('roles.index'));
		}

		$role = $this->roleRepository->updateRich($request->all(), $id);

		Flash::success('Role est modifié avec succés.');

		return redirect(route('roles.index'));
	}

	/**
	 * Remove the specified Role from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$role = $this->roleRepository->find($id);

		if(empty($role))
		{
			Flash::error('Role que vous cherchez n est pas disponible');

			return redirect(route('roles.index'));
		}

		$this->roleRepository->delete($id);

		Flash::success('Role est supprimé avec succès.');

		return redirect(route('roles.index'));
	}

	public function getAccess($access)
{
    switch($access) {
        case '0':
            return 'Aucun';
            break;
        case '1':
            return 'Aucun';
            break;
        case '2':
            return 'Aucun';
            break;
        case '3':
            return 'Aucun';
            break;
        case '4':
           return 'Aucun';
            break;
    }
}
}
