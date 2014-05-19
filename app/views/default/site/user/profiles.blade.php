{{ Form::input_group('text', 'user_profiles[@if(isset($profile)){{{$profile->id}}}@elsenew@endif][title]', 
	Lang::get('admin/users/profile.Profile_Name'), isset($profile) ? $profile->title : null, $errors) }} 

{{ Form::input_group('text', 'user_profiles[@if(isset($profile)){{{$profile->id}}}@elsenew@endif][displayname]', 
	Lang::get('admin/users/profile.Full_Name'), isset($profile) ? $profile->displayname : null, $errors) }} 

{{ Form::input_group('text', 'user_profiles[@if(isset($profile)){{{$profile->id}}}@elsenew@endif][zip]', 
	Lang::get('admin/users/profile.zip'), isset($profile) ? $profile->zip : null, $errors) }} 

{{ Form::input_group('text', 'user_profiles[@if(isset($profile)){{{$profile->id}}}@elsenew@endif][address]', 
	Lang::get('admin/users/profile.address'), isset($profile) ? $profile->address : null, $errors) }} 

{{ Form::input_group('text', 'user_profiles[@if(isset($profile)){{{$profile->id}}}@elsenew@endif][city]', 
	Lang::get('admin/users/profile.city'), isset($profile) ? $profile->city : null, $errors) }} 

{{ Form::input_group('text', 'user_profiles[@if(isset($profile)){{{$profile->id}}}@elsenew@endif][state]', 
	Lang::get('admin/users/profile.state'), isset($profile) ? $profile->state : null, $errors) }} 

{{ Form::input_group('text', 'user_profiles[@if(isset($profile)){{{$profile->id}}}@elsenew@endif][country]', 
	Lang::get('admin/users/profile.country'), isset($profile) ? $profile->country : null, $errors) }} 

{{ Form::input_group('text', 'user_profiles[@if(isset($profile)){{{$profile->id}}}@elsenew@endif][phone]', 
	Lang::get('admin/users/profile.phone'), isset($profile) ? $profile->phone : null, $errors) }} 

{{ Form::input_group('text', 'user_profiles[@if(isset($profile)){{{$profile->id}}}@elsenew@endif][mobile]', 
	Lang::get('admin/users/profile.mobile'), isset($profile) ? $profile->mobile : null, $errors) }} 

{{ Form::input_group('text', 'user_profiles[@if(isset($profile)){{{$profile->id}}}@elsenew@endif][taxcode]', 
	Lang::get('admin/users/profile.taxcode'), isset($profile) ? $profile->taxcode : null, $errors) }} 

{{ Form::input_group('text', 'user_profiles[@if(isset($profile)){{{$profile->id}}}@elsenew@endif][website]', 
	Lang::get('admin/users/profile.website'), isset($profile) ? $profile->website : null, $errors) }} 

@if(isset($profile))
	<div class="form-group">
		<div class="pull-right">
			<a data-method="delete" href="{{{ URL::to('admin/users/' . $user->id . '/profile/'.$profile->id ) }}} " class="confirm-ajax-update btn btn-danger">{{{ Lang::get('button.delete') }}} {{{ $profile->title }}} </a>
		</div>
	</div>
@endif