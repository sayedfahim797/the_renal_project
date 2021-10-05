<?php

namespace App\Imports;

use App\Models\Backend\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
           'product_name'     => $row[0],
           'cat_id'           => $row[1],
           'sup_id'           => $row[2],
           'product_code'     => $row[3],
           'product_photo'    => $row[4],
           'buy_date'         => $row[5],
           'expire_date'      => $row[6],
           'buying_price'     => $row[7],
           'salling_price'    => $row[8],           
        ]);
    }
}
