<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignCategoryIdOnPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            //definizione della colonna
            $table->unsignedBigInteger('category_id')->after('id')->nullable();

            //definizione foreign keys
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');

            //metodo alternativo se rispetto le convenzioni
            // $table->foreign('category_id')->after('id')->nullable()->onDelete('set null')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            //elimino il vincolo con la foreign key
            $table->dropForeign('posts_category_id_foreign');

            //elimino la colonna
            $table->dropColumn('category_id');
        });
    }
}
