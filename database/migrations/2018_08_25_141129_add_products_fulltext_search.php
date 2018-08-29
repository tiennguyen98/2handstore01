<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProductsFulltextSearch extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            DB::statement('ALTER TABLE products ADD FULLTEXT `search` (`name`)');
            DB::statement('ALTER TABLE products ENGINE = MyISAM');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            DB::statement('ALTER TABLE products DROP INDEX `search`');
            DB::statement('ALTER TABLE products ENGINE = InnoDB');
        });
    }
}
