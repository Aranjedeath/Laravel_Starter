<?php 
use Illuminate\Filesystem\Filesystem;
use Gcphost\Helpers\Blog\BlogRepository as Post;

class BlogService {
    protected $post;
    var $rules = array(
            'title'   => 'required|min:3',
            'content' => 'required|min:3'
    );

	public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function index()
    {
        $posts = $this->post;
        return Theme::make('admin/blogs/index', compact('posts'));
    }

	public function getCreate()
	{
		$templates=$this->post->templates();
		$parents=$this->post->parents();
        return Theme::make('admin/blogs/create_edit', compact('templates', 'parents'));
	}

	public function create()
	{
		$validator = Validator::make(Input::all(), $this->rules);

        if ($validator->passes())
        {
           return $this->post->createOrUpdate() ?
				Api::to(array('success', Lang::get('admin/blogs/messages.create.success'))) ? : Redirect::to('admin/slugs/' . $this->post->id . '/edit')->with('success', Lang::get('admin/blogs/messages.create.success')) :
				Api::to(array('error', Lang::get('admin/blogs/messages.create.error'))) ? : Redirect::to('admin/slugs/create')->with('error', Lang::get('admin/blogs/messages.create.error'));
        } else return Api::to(array('error', Lang::get('admin/blogs/messages.create.error'))) ? : Redirect::to('admin/slugs/create')->withInput()->withErrors($validator);
	}

	public function getEdit($post)
	{
		$templates=$this->post->templates();
		$parents=$this->post->parents();
        return Theme::make('admin/blogs/create_edit', compact('post', 'templates', 'parents'));
	}

	public function edit($post)
	{
        $validator = Validator::make(Input::all(), $this->rules);

        if ($validator->passes())
        {
           return $this->post->createOrUpdate($post->id) ?
				Api::to(array('success', Lang::get('admin/blogs/messages.update.success'))) ? : Redirect::to('admin/slugs/' . $post->id . '/edit')->with('success', Lang::get('admin/blogs/messages.update.success')) :
			    Api::to(array('error', Lang::get('admin/blogs/messages.update.error'))) ? : Redirect::to('admin/slugs/' . $post->id . '/edit')->with('error', Lang::get('admin/blogs/messages.update.error'));
        } else return Api::to(array('error', Lang::get('admin/blogs/messages.update.error'))) ? : Redirect::to('admin/slugs/' . $post->id . '/edit')->withInput()->withErrors($validator);
	}

    public function delete($post)
    {
		return $post->delete() ? Api::json(array('result'=>'success')) : Api::json(array('result'=>'error', 'error' =>Lang::get('core.delete_error')));
    }

	public function page($limit=10){
		return $this->post->paginate($limit);
	}

	public function get()
    {
		if(Api::Enabled()){
			return Api::make($this->post->all()->get()->toArray());
		} else return Datatables::of($this->post->all())
        ->edit_column('comments', '{{ DB::table(\'comments\')->where(\'post_id\', \'=\', $id)->count() }}')
        ->add_column('actions', '<div class="btn-group"><a href="{{{ URL::to(\'admin/slugs/\' . $id . \'/edit\' ) }}}" class="btn btn-primary btn-sm modalfy" ><span class="glyphicon glyphicon-pencil"></span></a>
                <a data-method="delete" data-row="{{{  $id }}}" data-table="blogs"  href="{{{ URL::to(\'admin/slugs/\' . $id . \'\' ) }}}" class="confirm-ajax-update btn btn-sm btn-danger"><span class="glyphicon glyphicon-remove"></span></a></div>
            ')
        ->make();
    }

}