<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimeListTable extends Migration
{
    public function up()
    {
        Schema::create('anime_list', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('anime_id')->constrained()->onDelete('cascade');
            $table->enum('status', ['watched', 'watching', 'plan_to_watch'])->default('plan_to_watch');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('anime_list');
    }
}
