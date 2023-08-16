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
        Schema::create('site_availables', function (Blueprint $table) {
            $table->id();
            $table->string('path');
            $table->string('domainId');
            $table->string('serverName');
            $table->string('serverAlias');
            $table->string('proxyPass');
            $table->string('proxyPassReverse');
            $table->string('rewriteCond1');
            $table->string('rewriteCond2');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_availables');
    }
};
