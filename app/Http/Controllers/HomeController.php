<?php

namespace App\Http\Controllers;

use Exception;
use Web3\Web3;
use Illuminate\Http\Request;
use App\Interfaces\AccountServiceInterface;
use App\Interfaces\ContractServiceInterface;
use Web3\Contract;

class HomeController extends Controller
{
  /**
   * @var ContractServiceInterface
   */
  private $contractService;

  public function initialize(
    ContractServiceInterface $contractService
  ) {
    $this->contractService = $contractService;
  }

  public function index()
  {
    // STOPPED DUE TO LIB FAILURE CONTRACT METHOD NEVER FOUND
    // $abi = $this->contractService->findOneAbiByName('MetaCoin.json');
    // $contract = new Contract(env('WEB3_HOST'), $abi);

    // try {
    //   $address = $contract->abi['networks'][env('WEB3_NETWORK_ID')]['address'];
    // } catch (Exception $e) {
    //   throw new Exception('Web3 error, contract address not found on network');
    // }

    // $contract->at($address)
    //   ->bytecode($contract->abi['bytecode']);

    // dd($contract);
    // $contract->call('sendCoin', function ($err, $data) {
    //   if ($err !== null) {
    //     throw new Exception($err->getMessage());
    //   }
    //   dd($data);
    // });

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
