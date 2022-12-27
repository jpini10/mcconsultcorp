@extends('layouts.app')
@section('cssdatatable')
<link rel="stylesheet" href="/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
@endsection
 @section('contenido') 
 <div class="content">
    <div class="card"> 
        <div class="card-body">
            {{-- <div class="row"> --}}

                <div class="row g-2">
                    <div class="col-md">
                            <div class="form-floating">
                                {{-- <input type="email" class="form-control" id="floatingInputGrid" placeholder="name@example.com" value="mdo@example.com"> --}}
                                <label for="floatingInputGrid">FOTO DEL PRODUCTO</label>
                            </div>
                    </div>
                    <div class="col-md">
                    <div class="form-floating">
                        DETALLES DEL PRODUCTO
                      <p></p>
                        <div class="row">
                            <div class="col">
                                <label for="inputEmail4"class="text-dark">Precion de Compra</label>
                               
                                </div>
                                 <div class="col">
                                         <label for="inputEmail4"class="text-dark">Precio de Venta</label>
                                        
                                    </div>
                        </div>
                        <p></p>
                        <div class="row">
                                    <div class="col">
                                        <label for="inputEmail4"class="text-dark">Stock</label>
                                         
                                   </div>
                                   <div class="col">
                                    <label for="inputEmail4"class="text-dark">Stock</label>
                                     
                               </div>
                        </div>
                        <p></p>
                        <div class="row">
                            <div class="col">
                                <label for="inputEmail4"class="text-dark">Stock</label>
                                 
                           </div>
                           <div class="col">
                            <label for="inputEmail4"class="text-dark">Stock</label>
                             
                       </div>
                </div>
                <p></p>
                <div class="row">
                    <div class="col">
                        <label for="inputEmail4"class="text-dark">Stock</label>
                         
                   </div>
                   <div class="col">
                    <label for="inputEmail4"class="text-dark">Stock</label>
                     
               </div>
        </div>
                    </div>
                    </div>
                </div>
            {{-- </div> --}}
        </div>
 </div>
 </div>
  @endsection