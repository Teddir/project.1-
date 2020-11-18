<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use PHPUnit\TextUI\XmlConfiguration\UpdateSchemaLocationTo93;

class Foreign extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('produks', function (Blueprint $table) {
            $table->foreignId('kategori_id')->nullable()->constrained('kategoris');
            $table->foreignId('penjual_id')->nullable()->constrained('penjuals');
        });
        
        Schema::table('keranjangs', function (Blueprint $table) {
            $table->foreignId('produk_id')->nullable()->constrained('produks')->cascedeOnDelete();
            $table->foreignId('user_id')->nullable()->constrained('users');
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->foreignId('produk_id')->nullable()->constrained('produks');
            $table->foreignId('user_id')->nullable()->constrained('users');
        });

        Schema::table('penjuals', function (Blueprint $table) {
            $table->foreignId('penjual_id')->nullable()->constrained('users');
            $table->foreignId('produk_id')->nullable()->constrained('produks');
            $table->foreignId('message_id')->nullable()->constrained('hubungis');
        });

        Schema::table('hubungis', function (Blueprint $table) {
            $table->foreignId('hubungi_id')->nullable()->constrained('users');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
