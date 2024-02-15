<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateKeywordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keywords', function (Blueprint $table) {
            $table->id();
            $table->string('keyword');
            $table->text('reponse');
            $table->timestamps();
        });

        // Insérer les données du fichier JSON
        $phrases = json_decode(
            file_get_contents(storage_path("app/data/phrases.json"))
        );

        foreach ($phrases as $keyword => $reponse) {
            DB::table('keywords')->insert([
                'keyword' => $keyword,
                'reponse' => $reponse,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('keywords');
    }
}
