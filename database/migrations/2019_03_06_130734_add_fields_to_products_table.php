<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            
        // Alla fält som ska in i tabellen products
        // 100 för att begränsa string till max 100 karaktärer
        $table->string('name', 100);
        $table->text('description');
        $table->string('image');
        $table->string('type');
        $table->float('price');

        });
    }

    /**
     * Reverse the migrations. (Vid eventuell rollback kan man ta bort fälten genom att anropa någon av dessa nedan!)
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
        
        $table->dropColumn('name');
        $table->dropColumn('description');
        $table->dropColumn('image');
        $table->dropColumn('type');
        $table->dropColumn('price');
        
        });
    }
}
