<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('minutes', function (Blueprint $table) {
            $table->id();
			$table->string("title")->nullable();
			$table->longText("content")->nullable(false);
			$table->tinyInteger("active")->nullable()->default(1);
			$table->dateTime("article_created_at")->nullable();
			$table->unsignedInteger("user_id")->nullable();
			$table->timestamps();
			$table->softDeletes();
        });

        DB::statement('ALTER TABLE minutes ADD FULLTEXT search(title, content)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('minutes');
    }
};
