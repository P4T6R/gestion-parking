<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToVehicleInsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::table('vehicle_ins', function (Blueprint $table) {
        $table->tinyInteger('status')->default(0); // Ajoute une colonne 'status' avec une valeur par défaut de 0
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
{
    Schema::table('vehicle_ins', function (Blueprint $table) {
        $table->dropColumn('status'); // Supprime la colonne 'status' lors du rollback de la migration
    });
}
}
