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
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            //======== BASE DATA ==========>
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('code');

            $table->string('phone')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();

            $table->integer('type')->default(0)->comment("1=Admin, 2=Teacher, 3=Student");
            $table->integer('gender')->default(1)->comment("1=male, 2=female");
            $table->boolean('is_active')->default(true);

            //======== STUDENT DATA ==========>
            $table->date('birth_date')->nullable();
            $table->string('parent_phone')->nullable()->comment('Parent Phone');
            $table->integer('academic_level')->nullable()->comment('Academic Levels');
            $table->integer('academic_year')->nullable()->comment('Academic Years');
            $table->string('edu_ins')->nullable()->comment('Educational Institution Names');

            //======== TEACHER DATA ==========>
            $table->string('qualification')->nullable()->comment('Qualification');
            $table->string('subject')->nullable()->comment('subject');
            $table->integer('subscription_type')->nullable()->default(1)->comment("1=personal, 2=institutional");

            $table->foreignId('branch_id')->nullable()->constrained('branches')->nullOnDelete();
            $table->softDeletes();

            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
