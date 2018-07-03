<?php
namespace App\Services;

use App\Models\Account;
use App\Interfaces\AccountServiceInterface;

class AccountService implements AccountServiceInterface
{
  /**
   * @inheritdoc
   */
  public function findAll()
  {
    return Account::all();
  }

  /**
   * @inheritdoc
   */
  public function findAllPaginated()
  {
    return Account::orderBy('id', 'desc')->paginate(20);
  }

  /**
   * @inheritdoc
   */
  public function findAllByUserId(int $userId)
  {
    return Account::where('user_id', $userId)->get();
  }

  /**
   * @inheritdoc
   */
  public function findOneOrFailById(int $id)
  {
    return Account::where('id', $id)->first();
  }

  /**
   * @inheritdoc
   */
  public function findUserActiveByUserId(int $userId)
  {
    return Account::where('user_id', $userId)->where('is_primary', true)->first();
  }

  /**
   * @inheritdoc
   */
  public function getModel()
  {
    return new Account();
  }

  /**
   * @inheritdoc
   */
  public function create(Account $account, array $attributes)
  {
    return $this->update($account, $attributes);
  }

  /**
   * @inheritdoc
   */
  public function update(Account $account, array $attributes)
  {
    $account->fill($attributes);

    if ($account->save()) {
      return $account;
    }

    return false;
  }

}
