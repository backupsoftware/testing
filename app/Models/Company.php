<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Company extends Authenticatable implements JWTSubject
{
    // Specify the table name if it doesn't match the default naming convention
    protected $table = 'companies';

    // Define the fillable attributes for mass assignment
    protected $fillable = [
        'Company_Id',
        'Company_Name',
        'Company_Super_Admin_Email',
        'password',
        'Company_Subscription_Plan1',
        'Company_Subscription_Plan2',
        'Company_Subscription_Plan3',
        'Company_Subscription_Plan4',
        'Company_Subscription_Module1',
        'Company_Module1_Start_Date',
        'Company_Module1_End_Date',
        'Company_Subscription_Module2',
        'Company_Module2_Start_Date',
        'Company_Module2_End_Date',
        'Company_Module1_Value',
        'Company_Module2_Value',
        'Company_Logo',
        'Company_Website',
        'Company_Location',
        'Company_Address',
        'Company_Super_Admin_Mobile_Number',
        'Company_Person_Role',
        'Company_Status',
        'Company_Person_Account_Activated',
        'Company_Person_First_Signin',
        'Company_Person_Last_Signin',
        'Company_MFA',
        'Company_User_MFA',
        'Company_Time_Zone',
    ];

    public function getJWTIdentifier()
    {
        // Return the unique identifier for the company, typically the primary key
        return $this->getKey();  // This method is part of the Eloquent model
    }

    /**
     * Get the custom claims for the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        // You can add custom claims here if needed
        return [];
    }
    
}
