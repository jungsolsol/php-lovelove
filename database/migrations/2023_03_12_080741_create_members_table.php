<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->timestamps();
            $table->string('nickname', 20);
//            $table->string('nickname', 20)->default()->nullable();
            $table->text('introduce');
            $table->string('gender');
//            $table->string('gender')->default('M');
            $table->string('age', 4);
//            $table->string('age', 4)->default('20');
//            $table->point('point')->default(10101010);

            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
