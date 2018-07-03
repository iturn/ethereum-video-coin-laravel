<?php

namespace App\Providers;

use App\Services\AccountService;
use App\Services\ContractService;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Interfaces\AccountServiceInterface;
use App\Interfaces\ContractServiceInterface;

class AppServiceProvider extends ServiceProvider
{
  /**
   * Bootstrap any application services.
   *
   * @return void
   */
  public function boot()
  {
    Schema::defaultStringLength(191);
  }

  /**
   * Register any application services.
   *
   * @return void
   */
  public function register()
  {
    $this->app->bind(AccountServiceInterface::class, AccountService::class);
    $this->app->bind(ContractServiceInterface::class, ContractService::class);
  }
}
