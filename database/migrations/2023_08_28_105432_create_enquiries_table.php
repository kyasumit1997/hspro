<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnquiriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enquiries', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('password');
            $table->string('email')->unique();
            $table->integer('contact_number')->length(11);
            $table->integer('state')->length(11);
            $table->integer('city')->length(11); 
            $table->string('address');
            $table->integer('pin_code')->length(11);
            $table->integer('type_of_cancer')->length(11);
            $table->string('documents');
            $table->integer('chat_doc_id')->length(11);
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
        Schema::dropIfExists('enquiries');
    }
}
