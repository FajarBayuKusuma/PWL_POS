<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
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

     //langkah 1
    //protected $fillable = ['level_id','username','nama','password'];
     //langkah 2
    protected $fillable = ['level_id','username','nama'];

}
