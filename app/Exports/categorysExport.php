<?php

namespace App\Exports;
use DB;
use App\Models\category;
use Maatwebsite\Excel\Concerns\FromCollection;

class categorysExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $category = category::select('id','category_name','category_code','category_desc','created_at'
        )->get();
        return $category;
        
    }
    public function headings(): array
    {
        return [
            'S:no','category_name','category_code','category_desc','created_at',
        ];
    }
}
