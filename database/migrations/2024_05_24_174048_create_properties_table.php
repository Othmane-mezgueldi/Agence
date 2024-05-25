<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->longText("description");
            $table->integer("surface")->unsigned();
            $table->integer("rooms")->unsigned();
            $table->integer("bedrooms")->unsigned();
            $table->integer("floor")->unsigned(); // Etage
            $table->double("price", 10, 2)->unsigned()->default(0);
            $table->string("city");
            $table->string("address");
            $table->integer("postal_code");
            $table->boolean("sold")->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
