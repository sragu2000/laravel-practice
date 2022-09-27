<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// Schema::create('suppliers', function (Blueprint $table) {
//     $table->id();
//     $table->string('supplierName');
//     $table->string('supplierEmail');
//     $table->string('supplierAddress');
//     $table->string('supplierPhone');
//     $table->timestamps();
// });
class Supplier extends Model
{
    use HasFactory;
    protected $fillable = [
        'supplierName',
        'supplierEmail',
        'supplierAddress',
        'supplierPhone',
    ];
}
