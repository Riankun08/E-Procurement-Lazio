<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feed_contacts', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name' , 255)->nullable();
            $table->string('email' , 255)->nullable();;
            $table->string('subject' , 255)->nullable();;
            $table->text('message')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('feed_contacts');
    }
}
