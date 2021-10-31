<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contestant extends Model
{
    protected $fillable = [
            'name', 
            '1on1win',        
            '1on1lost',      
            'group1win',     
            'group1lost',    
            'group05win',   
            'group05lost',  
            'personalwin', 
            'personallost',
            'symbolwin',
            'symbollost', 
            'nationalwin',
            'nationallost',
            'played',
            'win',
            'lost',
            'percentage',
            'country',
            'season',
    ];

    
}
