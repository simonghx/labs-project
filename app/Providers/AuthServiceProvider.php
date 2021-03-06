<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
         'App\Article' => 'App\Policies\ArticlePolicy',
         'App\Tag' => 'App\Policies\TagPolicy',
         'App\Categorie' => 'App\Policies\CategoriePolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin', function ($user) {
        return Auth::user()->role->slug == 'admin';
        });
    }
}
