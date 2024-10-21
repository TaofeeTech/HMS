<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemSetting extends Model
{
    use HasFactory;

    protected $guarded = [];

    static public function Savesettings($data)
    {

        try {

            $id = 1;

            $settings = self::find($id);


            if (!$settings) {
                throw new \Exception('Something Went Wrong!');
            }


            $filteredData = array_filter($data, function ($value) {
                return !is_null($value);
            });


            $settings->update($filteredData);

            return $settings;

        } catch (\Exception $e) {
            \Log::error('Unable to save setting, Try again!: ' . $e->getMessage());
            throw $e;
        }

    }//End Method

}
