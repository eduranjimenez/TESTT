<?php

namespace App\Repositories\Providers;
use Illuminate\Support\ServiceProvider;

class RepresentationProvider extends ServiceProvider
{
   public function register()
   {
      $this->app->bind(
         'App\Repositories\Contracts\RepresentationInterface',
         // To change the data source, replace this class name
         // with another implementation
         'App\Repositories\Eloquent\RepresentationRepo'
      );
   }
}