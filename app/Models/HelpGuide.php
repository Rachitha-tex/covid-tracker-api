<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HelpGuide extends Model
{
    use HasFactory;
    protected $table='help_guides';
    protected $fillable =['link','description','user_name','date_created'];
}
