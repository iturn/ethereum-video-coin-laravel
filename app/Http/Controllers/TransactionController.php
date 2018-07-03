<?php

namespace App\Http\Controllers;

use Web3\Web3;
use Illuminate\Http\Request;
use League\Flysystem\Exception;
use App\Interfaces\AccountServiceInterface;

class TransactionController extends Controller
{
  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('transaction');
  }

  public function store(Request $request)
  {
    $transaction = $this->validate($request, [
      'toAddress' => 'required',
      'amount' => 'required'
    ]);

    $fromAccount = $this->activeAccount()->address;
    $toAccount = $transaction['toAddress'];
    // ethers are in gwei(E-18) to temporailty go to 'visible ethers of 0.1 ETH' E+16
    $amount = (int)$transaction['amount'] * 100000000000000000;

    $web3 = new Web3(env('WEB3_HOST', 'http://localhost:8545'));
    $web3->eth->sendTransaction(
      [
        'from' => '0x0453116198826716c22a83B7114f41f907865Bd3',
        'to' => '0x188B63A6dB9f365925C308945f63C76fCC83cc42',
        'value' => $amount
      ],
      function ($err, $transaction) use ($fromAccount, $toAccount) {
        if ($err !== null) {
          throw new Exception('Web3 error, ' . $err->getMessage());
        }

        return $transaction;
      }
    );

    return back();
  }
}
