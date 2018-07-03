<?php
namespace App\Services;

use Web3\Contract;
use Illuminate\Support\Facades\File;
use App\Interfaces\ContractServiceInterface;

class ContractService implements ContractServiceInterface
{
  /**
   * @inheritdoc
   */
  public function findOneAbiByName(string $name)
  {
    $files = File::files(base_path() . '/build/contracts');
    foreach ($files as $file) {
      if ($file->getFilename() == $name) {
        return $file->getContents();
      }
    }
    return false;
  }

}
