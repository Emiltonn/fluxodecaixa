<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $idtransaction
 * @property int $account_idaccount
 * @property int $entity_identity
 * @property float $account_balance
 * @property string $description
 * @property float $value
 * @property string $dt_transaction
 * @property Account $account
 * @property Entity $entity
 */
class Transaction extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'idtransaction';

    /**
     * @var array
     */
    protected $fillable = ['account_idaccount', 'entity_identity', 'account_balance', 'description', 'value', 'dt_transaction'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function account()
    {
        return $this->belongsTo('App\Moldels\Account', 'account_idaccount', 'idaccount');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function entity()
    {
        return $this->belongsTo('App\Entity', 'entity_identity', 'identity');
    }
}
