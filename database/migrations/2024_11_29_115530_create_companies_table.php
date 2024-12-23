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
        Schema::create('companies', function (Blueprint $table) {
            // Default table id
            $table->id();

            // Unique company ID with auto-increment, starting from 1 and max length of 6 digits
            $table->Integer('Company_Id')->nullable();

            // Mandatory fields
            $table->string('Company_Name');
            $table->string('Company_Super_Admin_Email');
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
            $table->string('Company_Super_Admin_Mobile_Number')->nullable();

            // Role and account status
            $table->integer('Company_Person_Role')->nullable();
            $table->boolean('Company_Status')->default(false); // Active/Inactive
            $table->boolean('Company_Person_Account_Activated')->nullable();
            $table->timestamp('Company_Person_First_Signin')->nullable();
            $table->timestamp('Company_Person_Last_Signin')->nullable();

            // Multi-factor authentication
            $table->boolean('Company_MFA')->nullable();
            $table->boolean('Company_User_MFA')->nullable();

            // Time Zone & Timestamps
            $table->timestamp('Company_Time_Zone')->nullable();

            // Default created_at and updated_at timestamps
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};