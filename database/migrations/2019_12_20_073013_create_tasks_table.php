<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    Schema::create('tasks', function (Blueprint $table) {
        $table->bigIncrements('id');
        // ココから追記
        $table->integer("user_id");
        $table->string('task');
        $table->date('deadline');
        $table->text('comment')->nullable(); // nullable();は記入がなくても大丈夫なやつに記述。
        // ココまで追記
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
