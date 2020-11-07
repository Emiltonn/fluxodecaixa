<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $idaccount
 * @property string $balance
 * @property Transaction[] $transactions
 */
class Account extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'idaccount';

    /**
     * @var array
     */
    protected $fillable = ['balance'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transactions()
    {
        return $this->hasMany('App\Models\Transaction', 'account_idaccount', 'idaccount');
    }
}
