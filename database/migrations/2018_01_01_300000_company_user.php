<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CompanyUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->index('company_id');
            $table->index('user_id');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->timestampTz('created_at')->default(\DB::raw('NOW()'));
            $table->timestampTz('updated_at')->default(\DB::raw('NOW()'));
            $table->timestampTz('deleted_at')->nullable();
        });

        require_once 'pg_functions.php';

        \DB::unprepared('
            CREATE TRIGGER set_timestamp
            BEFORE UPDATE ON company_user
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
        Schema::dropIfExists('company_user');
    }
}
