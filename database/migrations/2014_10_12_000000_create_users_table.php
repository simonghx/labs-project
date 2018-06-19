<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'users';

    /**
     * Run the migrations.
     * @table users
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('password', 100);
            $table->string('remember_token', 45)->nullable();
            $table->unsignedInteger('role_id');
            $table->string('image')->nullable();
            $table->string('poste');

            $table->index(["role_id"], 'fk_user_role_idx');

            $table->unique(["email"], 'email_UNIQUE');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('role_id', 'fk_user_role_idx')
                ->references('id')->on('roles')
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
       Schema::dropIfExists($this->set_schema_table);
     }
}
