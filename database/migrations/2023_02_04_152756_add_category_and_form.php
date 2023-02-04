<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoryAndForm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->enum('category', ['Obat Bebas Terbatas', 'Obat Bebas' , 'Obat Keras' , 'Obat Wajib Apotek' , 'Obat Herbal'])->nullable();
            $table->enum('form', ['Pulvis', 'Tablet' , 'Pil' , 'Kapsul' , 'Kaplet' , 'Larutan' , 'Salep' , 'Obat Tetes'])->nullable();
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
            $table->dropColumn('category');
            $table->dropColumn('form');
        });
    }
}
