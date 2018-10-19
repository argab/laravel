<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Companies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company_name')->unique();
            $table->timestamp('created_at')->default(\DB::raw('NOW()'));
            $table->timestamp('updated_at')->default(\DB::raw('NOW()'));
        });

        require_once 'pg_functions.php';

        \DB::unprepared('
            CREATE TRIGGER set_timestamp
            BEFORE UPDATE ON companies
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
        Schema::dropIfExists('companies');
    }
}
