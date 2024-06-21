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
        Schema::table('tasks', function (Blueprint $table) {
            $table->foreignId('project_id')->nullable()->references('id')->on('projects')->onDelete('set null');
            $table->renameColumn('task_name', 'name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropForeign('tasks_project_id_foreign');
            $table->dropColumn('project_id');
            $table->renameColumn('name', 'task_name');
        });
    }
};
