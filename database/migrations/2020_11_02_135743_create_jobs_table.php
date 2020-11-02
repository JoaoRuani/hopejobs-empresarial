<?php

use App\Enums\HiringTypes;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->double('salary')->nullable();
            $table->text('responsabilities')->nullable();
            $table->text('benefits')->nullable();
            $table->text('observations')->nullable();
            $table->enum('hiringType', HiringTypes::getValues())->default(HiringTypes::CLT);
            $table->foreignId('company_id')->constrained();
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
        Schema::dropIfExists('jobs');
    }
}
