<?php

namespace App\Http\Controllers;

use Web3\Web3;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\AccountServiceInterface;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
  use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

  public $web3;

  /**
   * Construct the new controller
   */
  public function __construct(AccountServiceInterface $accountService)
  {
    $this->initialization();

    $this->web3 = new Web3(env('WEB3_HOST', 'http://localhost:8545'));

    $this->accountService = $accountService;
  }

  public function activeUser()
  {
    return Auth::user();
  }

  public function activeAccount()
  {
    return $this->accountService->findUserActiveByUserId($this->activeUser()->id);
  }

  /**
   * __construct() does not have the Auth session available (changed since Laravel 5.3)
   * Therefore we call the initialize within the middleware
   */
  private function initialization()
  {
    $this->middleware(function ($request, $next) {
            // Call the initializer with injection
      if (method_exists($this, 'initialize')) {
        App::call([$this, 'initialize']);
      }

            // Call the setup with injection
      if (method_exists($this, 'setup')) {
        App::call([$this, 'setup']);
      }

      return $next($request);
    });
  }
}
