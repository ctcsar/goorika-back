<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function ($table) {
            $table->string('role', 20)->after('email')
                ->default(null);
        });

        DB::table('users')->where(['name'=>'root', 'email'=>'root'])->delete();

        DB::table('users')->updateOrInsert(['name'=>'root', 'email'=>'root', 'role'=>'root', 'password'=>bcrypt('root'), 'api_token'=>\Illuminate\Support\Str::uuid()]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');
        });
    }
};
