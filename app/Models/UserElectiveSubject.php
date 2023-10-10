<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserElectiveSubject extends Model
{
    use HasFactory;
    
    /**
     * Define custom name table
     *
     * @var string
     */
    protected $table = 'user_elective_subject';
}
