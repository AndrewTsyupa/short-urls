<?php

use App\Url;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUrlVisitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('url_visits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('url_id')->unsigned();
            $table->foreign('url_id')->references('id')->on('urls')->onDelete('cascade')
                ->onUpdate('cascade');
            $table->integer('user_ip');
            $table->text('user_agent');
            $table->text('user_data');
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('url_visits');
    }
}
