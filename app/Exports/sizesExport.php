<?php

namespace App\Exports;
use DB; 
use App\Models\size;
use Maatwebsite\Excel\Concerns\FromCollection;

class sizesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        {
            $size = DB::table('sizes')->select('size_id','category_name','size_name','size_cate_code','size_desc','sizes.created_at')
            ->join('categories', 'categories.id', '=', 'sizes.cate_id')->get();
            return $size;
        }
    }
    public function headings(): array
    {
        return [
            'S:no','Category name','Size name','Size category code','Size description','created at '
        ];
    }
}
