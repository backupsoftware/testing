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

            // Unique company ID with auto-increment, starting from 1 and max length of 6 digits
            $table->Integer('Company_Id')->nullable();

            // Mandatory fields
            $table->string('Person_Name');
            $table->string('Person_Email');
            $table->string('password');

            // Subscription plans
            $table->boolean('Company_Subscription_Plan1')->nullable()->default(false);
            $table->boolean('Company_Subscription_Plan2')->nullable()->default(false);
            $table->boolean('Company_Subscription_Plan3')->nullable()->default(false);
            $table->boolean('Company_Subscription_Plan4')->nullable()->default(false);

            // Modules and timestamps
            $table->boolean('Company_Subscription_Module1')->nullable();
            $table->timestamp('Company_Module1_Start_Date')->nullable();
            $table->timestamp('Company_Module1_End_Date')->nullable();
            $table->boolean('Company_Subscription_Module2')->nullable();
            $table->timestamp('Company_Module2_Start_Date')->nullable();
            $table->timestamp('Company_Module2_End_Date')->nullable();

            // Module values
            $table->integer('Company_Module1_Value')->nullable();
            $table->integer('Company_Module2_Value')->nullable();

            // Additional details
            $table->string('Company_Logo')->nullable()->unique();
            $table->string('Company_Website')->nullable();
            $table->string('Company_Location')->nullable();
            $table->string('Company_Address')->nullable();
            $table->string('Person_Mobile_Number')->nullable();

            // Role and account status
            $table->integer('Person_Role')->nullable();
            $table->boolean('Person_Status')->default(false); // Active/Inactive
            $table->boolean('Person_Person_Account_Activated')->nullable();
            $table->timestamp('Company_Person_First_Signin')->nullable();
            $table->timestamp('Company_Person_Last_Signin')->nullable();

            // Multi-factor authentication
            $table->boolean('Person_User_MFA')->nullable();

            // Time Zone & Timestamps
            $table->timestamp('Person_Time_Zone')->nullable();

            // Default created_at and updated_at timestamps
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
