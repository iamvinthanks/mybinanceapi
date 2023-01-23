<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserRekening extends Model
{
    public $table = 'user_rekening';

    use SoftDeletes;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'id',
        'code',
        'account_number',
        'user_account',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    
}
