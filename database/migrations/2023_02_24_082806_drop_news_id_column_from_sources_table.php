<?php

declare(strict_types=1);

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
    public function up(): void
    {
        Schema::table('sources', function (Blueprint $table) {
            $table->dropForeign(['news_id']);
            $table->dropColumn('news_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('sources', function (Blueprint $table) {
            $table->foreignId('news_id')
                ->references('id')
                ->on('news')
                ->cascadeOnDelete();
        });
    }
};
