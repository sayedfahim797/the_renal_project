<?php

namespace App\Exports;

use App\Models\Backend\Product;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProductsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Product::select('product_name', 'cat_id', 'sup_id', 'product_code', 'product_photo', 'buy_date', 'expire_date', 'buying_price', 'salling_price')->get();
    }
}
