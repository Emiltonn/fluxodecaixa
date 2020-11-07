<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntitiesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'entities';

    /**
     * Run the migrations.
     * @table entity
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('identity')->comment('Tabela de CLIENTE
');
            $table->enum('type_registry', ['client', 'provider', 'both']);
            $table->enum('type_entity', ['natural', 'legal']);
            $table->string('trading_name', 45);
            $table->string('cpf_cnpj', 15);
            $table->string('corporate_name', 45)->nullable();

            $table->unique(["identity"], 'idprovider_UNIQUE');
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
