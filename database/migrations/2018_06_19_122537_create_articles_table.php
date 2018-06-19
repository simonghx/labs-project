<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'articles';

    /**
     * Run the migrations.
     * @table articles
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('titre');
            $table->string('entete');
            $table->text('contenu');
            $table->string('image')->nullable();
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('categorie_id');

            $table->index(["user_id"], 'fk_articles_user1_idx');

            $table->index(["categorie_id"], 'fk_articles_categorie_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('categorie_id', 'fk_articles_categorie_idx')
                ->references('id')->on('categories')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('user_id', 'fk_articles_user1_idx')
                ->references('id')->on('users')
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
