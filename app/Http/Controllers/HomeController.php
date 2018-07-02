<?php

namespace App\Http\Controllers;

use Exception;
use Web3\Web3;
use Illuminate\Http\Request;
use App\Interfaces\AccountServiceInterface;

class HomeController extends Controller
{
  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $web3 = new Web3(env('WEB3_HOST', 'http://localhost:8545'));

    $balance = null;

    $web3->eth->getBalance($this->activeAccount()->address, function ($err, $data) use (&$balance) {
      if ($err !== null) {
        throw new Exception('Web3 error, no balance found' . $err->getMessage());
      }
      $balance = $data->toString();
    });

    return view('home', [
      'activeAccount' => $this->activeAccount()->address,
      'balance' => $balance,
    ]);
  }
}
