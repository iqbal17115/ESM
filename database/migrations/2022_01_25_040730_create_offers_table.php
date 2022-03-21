<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->string('code',40);
            $table->string('title', 191);
            $table->text('image')->nullable();
            $table->text('description')->nullable();
            $table->double('discount_percent')->nullable();
            $table->double('discount')->nullable();
            $table->text('link')->nullable();
            $table->boolean('is_active')->nullable()->default(1);
            $table->enum('status',['view'])->nullable();
            $table->foreignId('created_by');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offers');
    }
}
