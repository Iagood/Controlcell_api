<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'cpf',
        'rg',
        'email',
        'ddd_cellphone',
        'cellphone',
        'ddd_telephone',
        'telephone',
        'cep',
        'uf',
        'public_place',
        'city',
        'county',
        'complement',
        'comments'];
}
