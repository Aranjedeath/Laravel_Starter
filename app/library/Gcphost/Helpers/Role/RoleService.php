<?php 
use Gcphost\Helpers\Role\RoleRepository as Role;

class RoleService {
    protected $user;
    protected $role;
    protected $permission;
	private $protected_roles=array('admin','client');
    var $rules = array(
            'name' => 'required'
        );


    public function __construct(User $user, Role $role, Permission $permission)
    {
        $this->user = $user;
        $this->role = $role;
        $this->permission = $permission;
    }

	public function index()
    {
        $roles = $this->role;
        return Theme::make('admin/roles/index', compact('roles'));
    }

    public function getCreate()
    {
        $permissions = $this->permission->all();
        $selectedPermissions = Input::old('permissions', array());
        return Theme::make('admin/roles/create', compact('permissions', 'selectedPermissions'));
    }

    public function create()
    {
		$validator = Validator::make(Input::all(), $this->rules);
        if ($validator->passes())
        {
            $inputs = Input::except('csrf_token');
			if(in_array(Input::get('name'), $this->protected_roles))return Api::to(array('error', Lang::get('admin/roles/messages.create.error'))) ? : Redirect::to('admin/roles/create')->with('error', Lang::get('admin/roles/messages.create.error'));
            return $this->role->createOrUpdate(null, $this->permission->preparePermissionsForSave($inputs['permissions'])) ?
                Api::to(array('success', Lang::get('admin/roles/messages.create.success') )) ? : Redirect::to('admin/roles/' . $this->role->id . '/edit')->with('success', Lang::get('admin/roles/messages.create.success')) : 
				Api::to(array('error', Lang::get('admin/roles/messages.create.error'))) ? : Redirect::to('admin/roles/create')->withInput()->with('error', Lang::get('admin/roles/messages.create.error'));
        } else return Api::to(array('error', Lang::get('admin/roles/messages.create.error'))) ? : Redirect::to('admin/roles/create')->withInput()->withErrors($validator);
    }

    public function getEdit($role)
    {
        if(!empty($role))
        {
            $permissions = $this->permission->preparePermissionsForDisplay($role->perms()->get());
        }
        else return Api::to(array('error', Lang::get('admin/roles/messages.does_not_exist'))) ? : Redirect::to('admin/roles')->with('error', Lang::get('admin/roles/messages.does_not_exist'));
        
        return Theme::make('admin/roles/edit', compact('role', 'permissions'));
    }

    public function edit($role)
    {
		if((in_array(Input::old('name', $role->name), $this->protected_roles) &&Input::old('name', $role->name) != Input::get('name'))||( in_array(Input::get('name'), $this->protected_roles)  && Input::old('name', $role->name) != Input::get('name'))) 
			return Api::to(array('error', Lang::get('admin/roles/messages.update.error'))) ? : Redirect::to('admin/roles/' . $role->id . '/edit')->with('error', Lang::get('admin/roles/messages.update.error'));

        $validator = Validator::make(Input::all(), $this->rules);
        if ($validator->passes())
        {
            $inputs = Input::except('csrf_token');
			return $this->role->createOrUpdate($role->id, $this->permission->preparePermissionsForSave($inputs['permissions'])) ?
                Api::to(array('success', Lang::get('admin/roles/messages.update.success'))) ? : Redirect::to('admin/roles/' . $role->id . '/edit')->with('success', Lang::get('admin/roles/messages.update.success')) :
				Api::to(array('error', Lang::get('admin/roles/messages.update.error'))) ? : Redirect::to('admin/roles/' . $role->id . '/edit')->with('error', Lang::get('admin/roles/messages.update.error'));
        }
        return Api::to(array('error', Lang::get('admin/roles/messages.update.error'))) ? : Redirect::to('admin/roles/' . $role->id . '/edit')->withInput()->withErrors($validator);
    }

    public function delete($role)
    {
		return $role->delete() ? Api::json(array('result'=>'success')) : Api::json(array('result'=>'error', 'error' =>Lang::get('core.delete_error')));
    }

	public function page($limit=10){
		return $this->role->paginate($limit);
	}

	public function get(){
		if(Api::Enabled()){
			return Api::make($this->role->all()->get()->toArray());
		} else return Datatables::of($this->role->all())
        ->edit_column('users', '{{{ DB::table(\'assigned_roles\')->where(\'role_id\', \'=\', $id)->count()  }}}')
        ->add_column('actions', '<div class="btn-group"><a href="{{{ URL::to(\'admin/roles/\' . $id . \'/edit\' ) }}}" class="modalfy btn btn-sm btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
                                <a data-row="{{{  $id }}}" data-method="delete" data-table="roles" href="{{{ URL::to(\'admin/roles/\' . $id . \'\' ) }}}" class="confirm-ajax-update btn btn-sm btn-danger" @if($name == "admin" || $name == "users")disabled@endif><span class="glyphicon glyphicon-remove"></span></a></div>
                    ')
        ->make();
    }

}