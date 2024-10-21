<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'address',
        'phone',
        'role',
        'status',
        'bio',
        'dob',
        'image',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    static public function EditInfo($id, $data)
    {
        try {

            if (empty($id)) {
                throw new \Exception('Unable to process your request! Kindly Logout and Login Again.');
            }

            $admin = self::find($id);


            if (!$admin) {
                throw new \Exception('Your Account is Invalid!');
            }


            $filteredData = array_filter($data, function ($value) {
                return !is_null($value);
            });


            $admin->update($filteredData);

            return $admin;

        } catch (\Exception $e) {
            \Log::error('Room update failed: ' . $e->getMessage());
            throw $e;
        }
    }


}
