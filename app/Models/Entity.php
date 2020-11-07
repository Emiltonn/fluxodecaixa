<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $identity
 * @property string $trading_name
 * @property string $cpf_cnpj
 * @property string $corporate_name
 * @property Transaction[] $transactions
 */
class Entity extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'identity';

    /**
     * @var array
     */
    protected $fillable = ['trading_name', 'cpf_cnpj', 'corporate_name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transactions()
    {
        return $this->hasMany('App\Transaction', 'entity_identity', 'identity');
    }
}
