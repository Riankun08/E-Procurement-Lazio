<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('vendor_id');
            $table->string('name', 255)->default('productNoname');
            $table->integer('price')->nullable();
            $table->integer('quantity')->nullable();
            $table->enum('status', ['hold', 'publish'])->nullable();
            $table->string('image', 255)->nullable();
            $table->text('description')->nullable();
            $table->enum('category', [
                "Barang Konsumsi",
                "Bahan Makanan dan Minuman",
                "Alat Tulis Kantor",
                "Peralatan Kebersihan",
                "Perlengkapan Kesehatan",
                "Barang Elektronik",
                "Komputer dan Aksesori",
                "Perangkat Jaringan",
                "Alat Pengukur dan Pengendali",
                "Peralatan Kantor",
                "Meja dan Kursi Kantor",
                "Lemari Arsip",
                "Peralatan Presentasi",
                "Alat Keamanan Kantor",
                "Jasa Konstruksi",
                "Pembangunan Gedung dan Infrastruktur",
                "Renovasi dan Pemeliharaan",
                "Penyediaan Material Konstruksi",
                "Jasa Profesional",
                "Konsultan IT",
                "Lainnya",
            ])->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('products');
    }
};
