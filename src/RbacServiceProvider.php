<?php
namespace PHPExperts\LaravelRBAC;

use Illuminate\Support\ServiceProvider;
use Blade;

class RbacServiceProvider extends ServiceProvider
{
    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['rbac'];
    }

    /**
     * Indicates if loading of the provider is deferred
     *
     * @var bool
     */
    protected $defer = false;

    public function register()
    {
        $this->loadMigrationsFrom(__DIR__.'../database/migrations');
    }

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('ifUserIs', function($expression){
            return "<?php if (Auth::check() && Auth::user()->hasRole({$expression})): ?>";
        });
        Blade::directive('ifUserCan', function($expression){
            return "<?php if (Auth::check() && Auth::user()->canDo({$expression})): ?>";
        });
    }
}
