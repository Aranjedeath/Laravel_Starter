<div class="navbar navbar-default navbar-fixed-top main-nav">
	<div class="container-fluid">
		<div class="navbar-header">
			@yield('navbar-header')
			<button type="button" class="fa fa-lg fa-bars hidden-sm hidden-md hidden-lg navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">{{{ Lang::get('core.toggle_nav') }}}</span>
			</button>
			<div id="logo"></div>
			<a href="{{{ URL::to('admin') }}}" class="navbar-brand" title="{{{ Setting::get('site.name') }}}">{{{ Setting::get('site.name') }}} </a>
		</div>
		<div class="collapse navbar-collapse">
			
			<ul class="nav navbar-nav">
				@yield('main-nav-pre')
				<li class="dropdown{{ (Request::is('admin/users*|admin/roles*') ? ' active' : '') }}" title="{{{ Lang::get('core.users') }}}">
					<a id="nav_users" class="dropdown-toggle" data-toggle="dropdown" href="{{{ URL::to('admin/users') }}}">
						<span class="fa fa-fw fa-users"></span> {{{ Lang::get('core.users') }}} <span class="caret"></span>
					</a>
					<ul aria-labelledby="nav_users" class="dropdown-menu">
						<li{{ (Request::is('admin/users*') ? ' class="active"' : '') }}><a href="{{{ URL::to('admin/users') }}}"><span class="fa fa-user fa-fw"></span> &nbsp; {{{ Lang::get('core.users') }}}</a></li>
						<li{{ (Request::is('admin/roles*') ? ' class="active"' : '') }}><a href="{{{ URL::to('admin/roles') }}}"><span class="fa fa-warning fa-fw"></span> &nbsp; {{{ Lang::get('core.roles') }}}</a></li>
					</ul>
				</li>
				@yield('main-nav-post')
			</ul>
			<ul class="nav navbar-nav navbar-right">
				@yield('sub-nav-pre')
				
				<li><a href="#" class="nav-search"><span class="fa fa-lg fa-search fa-fw"></span></a></li>

				<li class="dropdown{{ (Request::is('admin/settings*') ? ' active' : '') }}" title="{{{ Lang::get('core.settings') }}}">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<span class="fa fa-lg fa-cogs fa-fw"></span>
					</a>
					<ul class="dropdown-menu">
						<li{{ (Request::is('admin/settings*') ? ' class="active"' : '') }}><a href="{{{ URL::to('admin/settings') }}}"><span class="fa fa-cog fa-fw"></span>  &nbsp; {{{ Lang::get('core.settings') }}}</a></li>
						<li class="divider"></li>
						<li{{ (Request::is('admin/slugs*') ? ' class="active"' : '') }}><a href="{{{ URL::to('admin/slugs') }}}"><span class="fa fa-sitemap fa-fw"></span>  &nbsp; {{{ Lang::get('core.slugs') }}}</a></li>						
						<li{{ (Request::is('admin/comments*') ? ' class="active"' : '') }}><a href="{{{ URL::to('admin/comments') }}}"><span class="fa fa-comments fa-fw"></span>  &nbsp; {{{ Lang::get('core.comments') }}}</a></li>
						@yield('sub-nav-settings')
					</ul>
				</li>
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">
						&nbsp; {{{ Auth::user()->email }}}	<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="{{{ URL::to('admin/todos') }}}"><span class="fa fa-list-alt fa-fw"></span>  &nbsp; {{{ Lang::get('core.todos') }}}</a></li>
						<li class="divider"></li>
						<li><a href="{{{ URL::to('user') }}}"><span class="fa fa-wrench fa-fw"></span>  &nbsp; {{{ Lang::get('core.profile') }}}</a></li>
						<li class="divider"></li>
						<li><a href="{{{ URL::to('user/logout') }}}"><span class="fa fa-sign-out fa-fw"></span>  &nbsp; {{{ Lang::get('core.logout') }}}</a></li>
						@yield('sub-nav-user')
					</ul>
				</li>
				@yield('sub-nav-post')
			</ul>
		</div>
	</div>
</div>