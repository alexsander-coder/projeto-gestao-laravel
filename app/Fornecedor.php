<?php

namespace App;
use SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    //
    //use SoftDelete;
    
   
    protected $table = 'fornecedores';
    protected $fillable = ['nome', 'site', 'uf', 'email'];
}
