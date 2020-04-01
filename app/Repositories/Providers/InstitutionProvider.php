<?php

namespace App\Repositories\Providers;
use Illuminate\Support\ServiceProvider;

class InstitutionProvider extends ServiceProvider
{
   public function register()
   {
      $this->app->bind(
         'App\Repositories\Contracts\InstitutionInterface',
         // To change the data source, replace this class name
         // with another implementation
         'App\Repositories\Eloquent\InstitutionRepo'
      );
   }
}