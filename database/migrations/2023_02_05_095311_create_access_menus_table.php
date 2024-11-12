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
        Schema::create('access_menus', function (Blueprint $table) {
            $table->id();
			$table->foreignId("access_group_id")->nullable()->constrained()->onDelete("cascade");
			$table->foreignId("menu_id")->nullable()->constrained()->onDelete("cascade");
            $table->json("access")->nullable();
			$table->timestamps();
        });

        Schema::table('access_menus', function (Blueprint $table) {
            //isi sesuai kebutuhan
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('access_menus');
    }
};
