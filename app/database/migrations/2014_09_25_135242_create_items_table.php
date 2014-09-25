<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('items', function($table)
        {
            $table->string('id');
            $table->string('owner_id');
            $table->string('list_id');
            $table->string('assigned_to');
            $table->string('title');
            $table->text('notes')->nullable();
            $table->boolean('completed')->default(false);
            $table->timestamp('due_date')->nullable();
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
		Schema::drop('items');
	}

}
