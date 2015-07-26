<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Libraries\Repositories\UserRepository;
use Flash;
use DB;
//use Mitul\Controller\AppBaseController as Controller;
use Response;

class UserController extends Controller
{

	/** @var  UserRepository */
	private $userRepository;


	function __construct(UserRepository $userRepo)
	{
		$this->userRepository = $userRepo;
		

		$this->middleware('auth');
	}

	/**
	 * Display a listing of the User.
	 *
	 * @return Response
	 */
	public function index()
	{


        $users = DB::table('profiles')
               ->Join('users', 'profiles.id', '=', 'users.idProfile')
               ->paginate(20);

        $links = str_replace('/?', '?', $users->render());

        return view('users/index', compact('users', 'links'));

	}

	/**
	 * Show the form for creating a new User.
	 *
	 * @return Response
	 */
	public function create()
	{
		$profiles = DB::table('profiles')->lists('name','id');
		return view('users.create',compact('profiles'));
	}

	/**
	 * Store a newly created User in storage.
	 *
	 * @param CreateUserRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateUserRequest $request)
	{
		$input = $request->all();
		$input['password'] = bcrypt($input['password']);
		$user = $this->userRepository->create($input);
		

		Flash::success('L\'utilisateur est enregistré avec succès.');

		return redirect(route('users.index'));
	}

	/**
	 * Display the specified User.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		//$user1 = $this->userRepository->find($id);
		$user = DB::table('profiles')
               ->Join('users', 'users.idProfile', '=', 'profiles.id')->where('users.id','=',$id)->first();
            

		if(empty($user))
		{
			Flash::error('L\'utilisateur que vous cherchez n\'est pas disponible');

			return redirect(route('users.index'));
		}

		return view('users.show')->with('user', $user);
	}

	/**
	 * Show the form for editing the specified User.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$user = $this->userRepository->find($id);
		$profiles = DB::table('profiles')->lists('name','id');

		if(empty($user))
		{
			Flash::error('L\'utilisateur que vous cherchez n\'est pas disponible');

			return redirect(route('users.index'));
		}

		return view('users.edit')->with('user', $user)->with('profiles',$profiles);
	}

	/**
	 * Update the specified User in storage.
	 *
	 * @param  int              $id
	 * @param UpdateUserRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateUserRequest $request)
	{
		$user = $this->userRepository->find($id);

		if(empty($user))
		{
			Flash::error('L\'utilisateur que vous cherchez n\'est pas disponible');

			return redirect(route('users.index'));
		}

		$user = $this->userRepository->updateRich($request->all(), $id);

		Flash::success('L\'utilisateur est modifié avec succés.');

		return redirect(route('users.index'));
	}

	/**
	 * Remove the specified User from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$user = $this->userRepository->find($id);

		if(empty($user))
		{
			Flash::error('L\'utilisateur que vous cherchez n\'est pas disponible');

			return redirect(route('users.index'));
		}

		$this->userRepository->delete($id);

		Flash::success('L\'utilisateur est supprimé avec succès.');

		return redirect(route('users.index'));
	}
}
