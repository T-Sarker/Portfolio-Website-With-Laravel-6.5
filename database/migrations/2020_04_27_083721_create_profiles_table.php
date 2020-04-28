<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('profileName');
            $table->string('profileCv');
            $table->string('profileImage');
            $table->string('profileSkill');
            $table->string('profileEmail');
            $table->text('profileAddress');
            $table->string('ProfileAge');
            $table->string('dateOfBirth');
            $table->string('profilePhone');
            $table->string('profileCountry');
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
        Schema::dropIfExists('profiles');
    }
}
