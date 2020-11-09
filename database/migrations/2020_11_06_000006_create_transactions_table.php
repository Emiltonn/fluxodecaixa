<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'transactions';

    /**
     * Run the migrations.
     * @table transaction
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idtransaction');
            $table->decimal('account_balance', 7, 2);
            $table->string('description', 45);
            $table->decimal('value', 7, 2);
            $table->timestamp('dt_transaction');
            $table->enum('type_transaction', ['egress', 'income']);
            $table->unsignedInteger('account_idaccount');
            $table->unsignedInteger('entity_identity');
            $table->timestamps();

            $table->index(["entity_identity"], 'fk_transaction_entity1_idx');

            $table->index(["account_idaccount"], 'fk_transaction_account1_idx');

            $table->unique(["idtransaction"], 'idtransaction_UNIQUE');


            $table->foreign('account_idaccount', 'fk_transaction_account1_idx')
                ->references('idaccount')->on('accounts')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('entity_identity', 'fk_transaction_entity1_idx')
                ->references('identity')->on('entities')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->tableName);
     }
}
