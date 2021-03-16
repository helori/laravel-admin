<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsPasswordResetTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('admins_resets')) {
            Schema::create('admins_resets', function (Blueprint $table) {
                $table->timestamp('created_at')->nullable();
                $table->string('email')->index();
                $table->string('token')->default(null);
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('admins_resets');
    }
}
