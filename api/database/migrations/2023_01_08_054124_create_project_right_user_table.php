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
        Schema::create('project_right_user', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('privilege');

            $table->unsignedBigInteger('project_user_id');
            $table->foreign('project_user_id')
                ->references('id')
                ->on('project_user')
                ->onDelete('cascade')
                ->onUpdate('cascade')
            ;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_right_user');
    }
};
