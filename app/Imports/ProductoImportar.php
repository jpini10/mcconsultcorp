<?php

namespace App\Imports;

use App\Models\Producto;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class ProductoImportar implements ToCollection,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    // public function model(array $row)
    // {
    //     // return new Producto([
    //     //     'id'=> $row[0],
    //     //     'item' => $row[1],
    //     //     'codigo' => $row[2],
    //     //     'material'=> $row[3],
    //     //     'um' => $row[4],
    //     //     'clasvalor' => $row[5],
    //     //     'lote' => $row[6],
    //     //     'almacen'=> $row[7],
    //     //     'ubicacion' => $row[8],
    //     //     'stock'=> $row[9],
    //     //     'condicion'=> $row[10],
    //     //     'empresa_id'=> $row[11],
    //     //     'sucursal_id' => $row[12]
    //     // ]);
    //     return dd(((object)$row)->item);
    // }
  
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            if( $row["item"]!=null ||  $row["item"]!='')
            {
                    Producto::create([
                       // 'id'=> $row[0],
                        'item' => $row["item"],
                        'codigo' => $row["codigo"],
                        'material'=> $row["material"],
                        'um' => $row["um"],
                        'clasvalor' => $row["clasvalor"],
                        'lote' => $row["lote"],
                        'almacen'=> $row["almacen"],
                        'ubicacion' => $row["ubicacion"],
                        'stock'=> $row["stock"],
                        'condicion'=> $row["condicion"],
                        'empresa_id'=> $row["empresa"],
                        'sucursal_id' => $row["sucursal"]
             ]);
            }
       
        }
    }
}
