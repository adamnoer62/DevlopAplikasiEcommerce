<?php

use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTranscationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transact', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('users_id');

            $table->text('address')->nullable();
            $table->float('total_price')->default(0);
            $table->float('Shipping_price')->default(0);
            $table->string('status')->default('PENDING');

            $table->string('payment')->default('Manual');

            $table->SoftDeletes();
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
        Schema::dropIfExists('transact');
    }
}
