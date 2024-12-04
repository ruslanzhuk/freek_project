<?php

/* А це вже модель аватару,
так, Я вирішив створити також таблицю аватарів, щоб легше було виконати деякий функціонал
тут так само поля які можуть бути заповнені а також метод, до кого належить цей аватар*/



namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avatar extends Model
{
    //

    use HasFactory;

    protected $fillable = [
        'user_id',
        'path',
        'is_current'
    ];

    protected $hidden = ['user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

}
