<?php
namespace App\Interfaces;

use App\Models\Account;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

interface AccountServiceInterface
{
  /**
   * Returns all the acounts
   *
   * @return Account[]
   */
  public function findAll();

  /**
   * @return Account[]
   */
  public function findAllPaginated();

  /**
   * Find all by user id
   *
   * @param int $id
   *
   * @return Account[]|null
   */
  public function findAllByUserId(int $userId);

  /**
   * Find the acount by the acount id
   *
   * @param int $id
   *
   * @return Account|null
   */
  public function findOneOrFailById(int $id);

  /**
   * Find the acount by the acount id
   *
   * @param int $id
   *
   * @return Account|null
   */
  public function findUserActiveByUserId(int $userId);

  /**
   * Returns a new model
   *
   * @return Account
   */
  public function getModel();

  /**
   * Create a new acount
   *
   * @param Account $acount
   * @param array $params
   *
   * @return Account
   *
   */
  public function create(Account $acount, array $params);

  /**
   * Update a acount
   *
   * @param Account $acount
   * @param array $params
   *
   * @return Account
   *
   */
  public function update(Account $acount, array $params);

}
