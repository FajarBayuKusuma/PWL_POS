<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Foundation\Auth\User as UserAuthenticate;



class UserModel extends UserAuthenticate
{
    use HasFactory;

    protected $table = 'm_user'; //Mendefinisikan nama tabel yang digunakan oleh model ini
    protected $primaryKey = 'user_id'; //mendefinisikan primary key dari tabel yang digunakan

    //Jobsheet 4

    /**
     * The Attrubutes that are mass assignable
     * 
     * @var array
     * 
     */

    //  langkah 1
    //protected $fillable = ['level_id','username','nama','password'];
    //1.2
    // protected $fillable = ['level_id','username','nama',];
     //langkah 2
    protected $fillable = ['level_id','username','nama','password'];

    public function level(): BelongsTo
    {
        return $this->belongsTo(LevelModel::class,'level_id','level_id');
    }

}
