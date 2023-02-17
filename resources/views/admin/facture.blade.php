<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>facture</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4><i class="fa fa-angle-right"></i> Commande de {{$order->user->name}} du {{Carbon\Carbon::parse($order->order_date)->format('M d Y')}} et d'un total de:: <strong>{{getPrix($order->total)}}</strong></h4>
                        <h5>Status de la commande:{{$order->status}}</h5>
                        <table class="table" style="font-size: 18px; margin-top: 100px">
                            <thead class="table-light">
                                <tr>
                                    <th>{{ __('Product')}}</th>
                                    <th>{{ __('Quantity')}}</th>
                                    <th>{{ __('Prix')}}</th>
                                    <th>{{ __('Total')}}</th>
                                    <th>{{ __('TVA')}} (19,25%)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order->products as $item)
                                <tr>
                                    @if (app()->getLocale() == 'en')
                                    <td>{{$item->title_en}}</td>
                                    @else
                                    <td>{{$item->title}}</td> 
                                    @endif
                                    <td>{{$item->pivot->total_qty}}</td>
                                    <td>{{getPrix($item->pivot->total_price / $item->pivot->total_qty)}}</td>
                                    <td>{{getPrix($item->pivot->total_price)}}</td>
                                    <td>{{getPrix($item->pivot->tva)}}</td>
                                </tr>                  
                                @endforeach
                               
                            </tbody>
                        </table>

                        <div class="" style="margin-top: 50px;">
                            <div style="margin-right: 0px;margin-left: 50px;">
                                <p><strong style="font-size:20px">Cchik</strong></p>
                                <p></p>
                            </div>
                        </div>
                        
                    
                        
                        </div>

                        
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div>
    
</body>
</html>