<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewCases extends Model
{
    use HasFactory;
    protected $fillable =['local_active_cases','local_deaths','update_date_time'];
}
