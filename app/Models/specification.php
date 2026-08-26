<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class specification extends Model
{
    use HasFactory;
    protected $fillable=["specificationname","partno","capacity","boosterpump","highpressurepump","	filterhousing"
                            ,"frpmultimedia","	frpmembranehousing","membrane","waterqualityindicators","flowmeters"
                        ,"pressuregauges","waterlevelindicator","lowpressureswitch","autoflashsystem","roframeparts"
                        ,"electricalcontrols","cip","dimension","uvsterilization","mineralization","assiscalantchemical"
                        ,"storagetanks","feedwater","tds","sdi","turbiditylevel","iron","ph","oxidizer","hardness","created_by"
                    ];

                    public function spec_info(){
                        return $this->belongsTo('App\Models\specification', 'specifiction_id;', 'id');
                    }
}
