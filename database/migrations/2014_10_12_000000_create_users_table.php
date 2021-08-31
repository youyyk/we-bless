<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // table name -> plural
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // primary key, auto increment, unsigned big int, 'id'
                        // no compound key
            $table->string('name'); // varchar(255)
            $table->string('email')->unique(); // unique key
            $table->timestamp('email_verified_at')->nullable(); //datetime
            $table->string('password'); // varchar(60)
            $table->rememberToken();
            $table->timestamps(); // 'created_at', 'updated_at'
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
        Schema::dropIfExists('users');
    }
}
