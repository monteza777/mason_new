<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FinancialReport extends Model
{
    protected $fillable = ['report_title','report_content','official'];
}
