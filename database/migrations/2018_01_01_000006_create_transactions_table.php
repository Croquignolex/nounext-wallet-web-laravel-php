<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
            $table->text('notes');
            $table->integer('amount')->unsigned();
            $table->integer('account_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('transfer_account_id')->unsigned()->nullable($value = true);
            $table->integer('sub_category_id')->unsigned();
            $table->timestamps();
            $table->boolean('deleted')->default(false);

            $table->foreign('account_id')
                ->references('id')
                ->on('accounts')
                ->onDelete('cascade');

            $table->foreign('transfer_account_id')
                ->references('id')
                ->on('accounts');

            $table->foreign('sub_category_id')
                ->references('id')
                ->on('sub_categories');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}