<?php
namespace App\Interfaces;

use App\Models\Contract;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

interface ContractServiceInterface
{
  /**
   * Find one contract ABI by contract name and return as json
   *
   * @param string $name
   *
   * @return string|null
   */
  public function findOneAbiByName(string $name);

}
