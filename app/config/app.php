<?php 
namespace Gcphost\Helpers;


return array(

	/*
	|--------------------------------------------------------------------------
	| Application Debug Mode
	|--------------------------------------------------------------------------
	|
	| When your application is in debug mode, detailed error messages with
	| stack traces will be shown on every error that occurs within your
	| application. If disabled, a simple generic error page is shown.
	|
	*/

	'debug' => true,

	/*
	|--------------------------------------------------------------------------
	| Application URL
	|--------------------------------------------------------------------------
	|
	| This URL is used by the console to properly generate URLs when using
	| the Artisan command line tool. You should set this to the root of
	| your application so that it is used when running Artisan tasks.
	|
	*/

	'url' => 'http://localhost',

	/*
	|--------------------------------------------------------------------------
	| Application Timezone
	|--------------------------------------------------------------------------
	|
	| Here you may specify the default timezone for your application, which
	| will be used by the PHP date and date-time functions. We have gone
	| ahead and set this to a sensible default for you out of the box.
	|
	*/

	'timezone' => 'America/Sao_Paulo',

	/*
	|--------------------------------------------------------------------------
	| Application Locale Configuration
	|--------------------------------------------------------------------------
	|
	| The application locale determines the default locale that will be used
	| by the translation service provider. You are free to set this value
	| to any of the locales which will be supported by the application.
	|
	*/

	'locale' => 'pt',

	/*
	|--------------------------------------------------------------------------
	| Application Fallback Locale
	|--------------------------------------------------------------------------
	|
	| The fallback locale determines the locale to use when the current one
	| is not available. You may change the value to correspond to any of
	| the language folders that are provided through your application.
	|
	*/

	'fallback_locale' => 'br',

	/*
	|--------------------------------------------------------------------------
	| Encryption Key
	|--------------------------------------------------------------------------
	|
	| This key is used by the Illuminate encrypter service and should be set
	| to a random, 32 character string, otherwise these encrypted strings
	| will not be safe. Please do this before deploying an application!
	|
	*/

	'key' => 'Vb0LuI0YRj1tUI1rt0TaZ7Sl12dX4MDE',

	/*
	|--------------------------------------------------------------------------
	| Autoloaded Service Providers
	|--------------------------------------------------------------------------
	|
	| The service providers listed here will be automatically loaded on the
	| request to your application. Feel free to add your own services to
	| this array to grant expanded functionality to your applications.
	|
	*/

	'providers' => array(

		'Illuminate\Foundation\Providers\ArtisanServiceProvider',
		'Illuminate\Auth\AuthServiceProvider',
		'Illuminate\Cache\CacheServiceProvider',
		'Illuminate\Session\CommandsServiceProvider',
		'Illuminate\Foundation\Providers\ConsoleSupportServiceProvider',
		'Illuminate\Routing\ControllerServiceProvider',
		'Illuminate\Cookie\CookieServiceProvider',
		'Illuminate\Database\DatabaseServiceProvider',
		'Illuminate\Encryption\EncryptionServiceProvider',
		'Illuminate\Filesystem\FilesystemServiceProvider',
		'Illuminate\Hashing\HashServiceProvider',
		'Illuminate\Html\HtmlServiceProvider',
		'Illuminate\Log\LogServiceProvider',
		'Illuminate\Mail\MailServiceProvider',
		'Illuminate\Database\MigrationServiceProvider',
		'Illuminate\Pagination\PaginationServiceProvider',
		'Illuminate\Queue\QueueServiceProvider',
		'Illuminate\Redis\RedisServiceProvider',
		'Illuminate\Remote\RemoteServiceProvider',
		'Illuminate\Auth\Reminders\ReminderServiceProvider',
		'Illuminate\Database\SeedServiceProvider',
		'Illuminate\Session\SessionServiceProvider',
		'Illuminate\Translation\TranslationServiceProvider',
		'Illuminate\Validation\ValidationServiceProvider',
		'Illuminate\View\ViewServiceProvider',
		'Illuminate\Workbench\WorkbenchServiceProvider',

		
        /* Additional Providers */
		"Khill\Lavacharts\LavachartsServiceProvider",
		'Zizaco\Confide\ConfideServiceProvider', 
        'Zizaco\Entrust\EntrustServiceProvider', 
        'Bllim\Datatables\DatatablesServiceProvider',
		'anlutro\LaravelSettings\ServiceProvider',
		'Thomaswelton\LaravelGravatar\LaravelGravatarServiceProvider',
		'Regulus\ActivityLog\ActivityLogServiceProvider',
		'Raahul\LarryFour\LarryFourServiceProvider',
		'Atticmedia\Anvard\AnvardServiceProvider',
		'Msurguy\Honeypot\HoneypotServiceProvider',
		'Rtablada\Profane\FilterServiceProvider',
		'Liebig\Cron\CronServiceProvider',
		'Dollar\Generators\GeneratorsServiceProvider',

		/* LaravelCP */
		'Gcphost\Helpers\UserServiceProvider',
		'Gcphost\Helpers\TodoServiceProvider',
		'Gcphost\Helpers\BlogServiceProvider',
		'Gcphost\Helpers\CommentServiceProvider',
		'Gcphost\Helpers\RoleServiceProvider',
		'Gcphost\Helpers\DesktopServiceProvider',
		'Gcphost\Helpers\EmailServiceProvider',
		'Gcphost\Helpers\MergeServiceProvider',
		'Gcphost\Helpers\ProfileServiceProvider',
		'Gcphost\Helpers\SearchServiceProvider',
		'Gcphost\Helpers\SettingServiceProvider',
		'Gcphost\Helpers\SiteUserServiceProvider',
		'Gcphost\Helpers\SiteBlogServiceProvider',


	),

	/*
	|--------------------------------------------------------------------------
	| Service Provider Manifest
	|--------------------------------------------------------------------------
	|
	| The service provider manifest is used by Laravel to lazy load service
	| providers which are not needed for each request, as well to keep a
	| list of all of the services. Here, you may set its storage spot.
	|
	*/

	'manifest' => storage_path().'/meta',

	/*
	|--------------------------------------------------------------------------
	| Class Aliases
	|--------------------------------------------------------------------------
	|
	| This array of class aliases will be registered when this application
	| is started. However, feel free to register as many as you wish as
	| the aliases are "lazy" loaded so they don't hinder performance.
	|
	*/

	'aliases' => array(

		'App'             => 'Illuminate\Support\Facades\App',
		'Artisan'         => 'Illuminate\Support\Facades\Artisan',
		'Auth'            => 'Illuminate\Support\Facades\Auth',
		'Blade'           => 'Illuminate\Support\Facades\Blade',
		'Cache'           => 'Illuminate\Support\Facades\Cache',
		'ClassLoader'     => 'Illuminate\Support\ClassLoader',
		'Config'          => 'Illuminate\Support\Facades\Config',
		'Controller'      => 'Illuminate\Routing\Controller',
		'Cookie'          => 'Illuminate\Support\Facades\Cookie',
		'Crypt'           => 'Illuminate\Support\Facades\Crypt',
		'DB'              => 'Illuminate\Support\Facades\DB',
		//'Eloquent'        => 'Illuminate\Database\Eloquent\Model',
		'Event'           => 'Illuminate\Support\Facades\Event',
		'File'            => 'Illuminate\Support\Facades\File',
		//'Form'            => 'Illuminate\Support\Facades\Form',
		'Hash'            => 'Illuminate\Support\Facades\Hash',
		'HTML'            => 'Illuminate\Support\Facades\HTML',
		'Input'           => 'Illuminate\Support\Facades\Input',
		'Lang'            => 'Illuminate\Support\Facades\Lang',
		'Log'             => 'Illuminate\Support\Facades\Log',
		'Mail'            => 'Illuminate\Support\Facades\Mail',
		'Paginator'       => 'Illuminate\Support\Facades\Paginator',
		'Password'        => 'Illuminate\Support\Facades\Password',
		'Queue'           => 'Illuminate\Support\Facades\Queue',
		'Redirect'        => 'Illuminate\Support\Facades\Redirect',
		'Redis'           => 'Illuminate\Support\Facades\Redis',
		'Request'         => 'Illuminate\Support\Facades\Request',
		'Response'        => 'Illuminate\Support\Facades\Response',
		'Route'           => 'Illuminate\Support\Facades\Route',
		'Schema'          => 'Illuminate\Support\Facades\Schema',
		'Seeder'          => 'Illuminate\Database\Seeder',
		'Session'         => 'Illuminate\Support\Facades\Session',
		'SSH'             => 'Illuminate\Support\Facades\SSH',
		'Str'             => 'Illuminate\Support\Str',
		'URL'             => 'Illuminate\Support\Facades\URL',
		'Validator'       => 'Illuminate\Support\Facades\Validator',
		'View'            => 'Illuminate\Support\Facades\View',


        /* Additional Aliases */
        'Confide'         => 'Zizaco\Confide\ConfideFacade',
        'Entrust'         => 'Zizaco\Entrust\EntrustFacade',
        'Carbon'          => 'Carbon\Carbon',
        'Datatables'      => 'Bllim\Datatables\Datatables',
		'Setting'		  => 'anlutro\LaravelSettings\Facade',
		'Activity'		  => 'Regulus\ActivityLog\Activity',
		'Gravatar'		  => 'Thomaswelton\LaravelGravatar\Facades\Gravatar',
		'Anvard'		  => 'Atticmedia\Anvard\Anvard',
		'CronWrapper'	  => 'Gcphost\Helpers\CronWrapper', 
		'Filter'		  => 'Rtablada\Profane\Facades\Filter',
		'Eloquent'		  => 'Rtablada\Profane\Model',

		/* form */
		'Alert'           => 'Caouecs\Bootstrap3\Alert',
		'Breadcrumb'      => 'Caouecs\Bootstrap3\Breadcrumb',
		'Form'            => 'Caouecs\Bootstrap3\Form',

		/* LaravelCP */
        'String'          => 'Andrew13\Helpers\String',
		'Theme'           => 'Gcphost\Helpers\Theme', 
		'Api'			  => 'Gcphost\Helpers\Api', 
		'Search'          => 'Gcphost\Helpers\Search', 
		'CronWrapper'     => 'Gcphost\Helpers\CronWrapper', 
		'LCP'			  => 'Gcphost\Helpers\LaravelCP',

	),
	'available_language' => array('en','pt'),

);
