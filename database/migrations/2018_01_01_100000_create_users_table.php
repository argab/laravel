<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_name');
            $table->string('email')->unique();
            $table->timestampTz('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestampTz('created_at')->default(\DB::raw('NOW()'));
            $table->timestampTz('updated_at')->default(\DB::raw('NOW()'));
            $table->timestampTz('deleted_at')->nullable();
        });

        require_once 'pg_functions.php';

        \DB::unprepared('
            CREATE TRIGGER set_timestamp
            BEFORE UPDATE ON users
            FOR EACH ROW EXECUTE PROCEDURE set_timestamp();
        ');
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

