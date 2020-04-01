<?php

namespace App\Repositories\Providers;
use Illuminate\Support\ServiceProvider;

class CommissionProvider extends ServiceProvider
{
   public function register()
   {
      $this->app->bind(
         'App\Repositories\Contracts\CommissionInterface',
         // To change the data source, replace this class name
         // with another implementation
         'App\Repositories\Eloquent\CommissionRepo'
      );
   }
}