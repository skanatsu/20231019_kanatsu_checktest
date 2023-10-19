<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Opinion extends Model
{
    use HasFactory;
    protected $fillable = ['fullname', 'gender', 'email', 'postcode', 'address', 'building_name', 'opinion'];

    public function scopeNameSearch($query, $fullname){
        if (!empty($fullname)) {
            $query->where('fullname', 'like', '%' . $fullname . '%');
        }
    }

    public function scopeGenderSearch($query, $gender){
        if (!empty($gender)) {
            $query->where('gender', $gender);
        }
    }

    public function scopeDateFromSearch($query, $date_from){
        if (!empty($date_from)) {
            $formattedDate = Carbon::createFromFormat('Y-m-d', $date_from)->toDateString();
            $query->whereDate('created_at', '>=' , $formattedDate);
        }
    }

    public function scopeDateToSearch($query, $date_to){
        if (!empty($date_to)) {
            $formattedDate = Carbon::createFromFormat('Y-m-d', $date_to)->toDateString();
            $query->whereDate('created_at', '<=' , $formattedDate);
        }
    }

    public function scopeEmailSearch($query, $email){
        if (!empty($email)) {
            $query->where('email', 'like', '%' . $email . '%');
        }
    }
}
