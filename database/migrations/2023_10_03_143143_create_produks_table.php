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
        Schema::create('produk', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100)->unique();
            $table->bigInteger('kategori_id');
            $table->decimal('harga_barang', 10)->default(0);
            $table->decimal('harga_jual', 10)->default(0);
            $table->smallInteger('stok')->default(0);
            $table->string('link_image', 100)->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('kategori_id')
                ->references('id')->on('kategori_produk')
                ->onUpdate("CASCADE");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produk');
    }
};
