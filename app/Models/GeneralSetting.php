<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralSetting extends Model
{
    protected $table = 'general_setting';
    protected $fillable = [
        'company_logo',
        'showLogo_inSign',
        'showImage_Background',
        'signIn_backgroundImage',
        'app_title','language',
        'timezone',
        'dateFormat',
        'timeFormat',
        'currency',
        'currency_symbol',
        'currency_position',
        'row_per_page'
    ];
    
}
