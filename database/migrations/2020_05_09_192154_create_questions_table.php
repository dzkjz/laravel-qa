<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('body');
            $table->unsignedInteger('views')->default(0)->comment("问题浏览次数");
            $table->unsignedInteger('answers')->default(0)->comment("答案数量");
            $table->bigInteger('votes')->default(0)->comment("按赞踩数量");
            $table->unsignedBigInteger('best_answer_id')->nullable();
            $table->unsignedBigInteger('creator_id');
            $table->timestamps();
        });
        Schema::table('questions', function (Blueprint $table) {
            $table->foreign('creator_id')
                ->references('id')
                ->on('users')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
