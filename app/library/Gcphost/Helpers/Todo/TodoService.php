<?php 
use Gcphost\Helpers\Todo\TodoRepository as Todos;

class TodosService {
    protected $todo;
	var $rules = array(
			'title' => 'required',
		);

    public function __construct(Todos $todo)
    {
        $this->todo = $todo;
    }

	public function index(){
		return Theme::make('admin/todos/index');
	}

	public function getCreate()
	{
        return Theme::make('admin/todos/create_edit');
	}

	public function getEdit($todo)
	{
        $due = preg_replace('/0000-00-00 00:00:00/i', '',Input::old('due_at', isset($todo) ? $todo->due_at : null));
		return Theme::make('admin/todos/create_edit', compact('due','todo'));
	}

	public function create(){

        $validator = Validator::make(Input::all(), $this->rules);

        if ($validator->passes())
        {
            return $this->todo->createOrUpdate() ?
				Api::to(array('success', Lang::get('admin/todos/messages.create.success'))) ? : Redirect::to('admin/todos/' . $this->todo->id . '/edit')->with('success', Lang::get('admin/todos/messages.create.success')) : 
				Api::to(array('error', Lang::get('admin/todos/messages.create.error'))) ? : Redirect::to('admin/todos/create')->with('error', Lang::get('admin/todos/messages.create.error'));
        } else return Api::to(array('error', Lang::get('admin/todos/messages.create.error'))) ? : Redirect::to('admin/users/' . $user->id . '/edit')->withErrors($validator);
	}

	public function edit($todo){
       $validator = Validator::make(Input::all(), $this->rules);

        if ($validator->passes())
        {
             return $this->todo->createOrUpdate($todo->id) ?
				Api::to(array('success', Lang::get('admin/todos/messages.create.success'))) ? : Redirect::to('admin/todos/' . $todo->id . '/edit')->with('success', Lang::get('admin/todos/messages.create.success')) : 
				Api::to(array('error', Lang::get('admin/todos/messages.create.error'))) ? : Redirect::to('admin/todos/' . $todo->id . '/edit')->with('error', Lang::get('admin/todos/messages.create.error'));
        } else return Api::to(array('error', Lang::get('admin/todos/messages.create.error'))) ? : Redirect::to('admin/todos/' . $todo->id . '/edit')->withErrors($validator);
	}

    public function delete($todo)
    {
		return $todo->delete() ? Api::json(array('result'=>'success')) : Api::json(array('result'=>'error', 'error' =>Lang::get('core.delete_error')));
    }

	public function assign($todo){
        return $todo->assign() ? Api::json(array('result'=>'success')) : Api::json(array('result'=>'error', 'error' =>Lang::get('core.delete_error')));
	}

	public function page($limit=10){
		return $this->todo->paginate($limit);
	}

    public function get()
    {
		if(Api::Enabled()){
			return Api::make($this->todo->all()->get()->toArray());
		} else return Datatables::of($this->todo->all())
			 ->edit_column('status','{{{ Lang::get(\'admin/todos/todos.status_\'.$status) }}}')
			 ->edit_column('due_at','{{{ Carbon::parse($due_at)->diffForHumans() }}}')
			 ->edit_column('created_at','{{{ Carbon::parse($created_at)->diffForHumans() }}}')
			 ->edit_column('displayname','{{{ $displayname ? : "Nobody" }}}')
	        ->add_column('actions', '<div class="btn-group" style="width: 200px">
		<a href="{{{ URL::to(\'admin/todos/\' . $id . \'/edit\' ) }}}" class="modalfy btn btn-sm btn-primary"><span class="glyphicon glyphicon-pencil"></span></a> 
		<a href="{{{ URL::to(\'admin/todos/\' . $id . \'/assign\' ) }}}" data-row="{{{  $id }}}" data-table="todos" class="confirm-ajax-update btn btn-sm btn-default">{{{ Lang::get(\'button.assign_to_me\') }}}</a>
			<a data-row="{{{  $id }}}" data-table="todos" data-method="delete" href="{{{ URL::to(\'admin/todos/\' . $id . \'\' ) }}}" class="confirm-ajax-update btn btn-sm btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
		</div>
            ')
			->make();
	}
}