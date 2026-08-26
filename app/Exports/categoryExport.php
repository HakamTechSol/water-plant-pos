<?php

namespace App\Exports;
use Illuminate\Support\Facades\DB;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class categoryExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $category = DB::table('category')->select('id','category_name','category_code','category_desc','created_at'
        )
       
        ->get();
        return $category;
    }
    public function headings(): array
    {
        return [
            'S:no','category_name','category_code','category_desc','created_at',
        ];
    }
}
