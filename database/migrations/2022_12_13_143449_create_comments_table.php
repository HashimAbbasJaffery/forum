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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")
                    ->constrained()
                    ->cascadeOnDelete();
            $table->foreignId("question_id")
                    ->constrained()
                    ->cascadeOnDelete();
            $table->string("comment");
            $table->integer("upvotes");
            $table->integer("downvotes");
            $table->integer("heart");
            $table->boolean("status");
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
        Schema::dropIfExists('comments');
    }
};
