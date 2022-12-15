@extends('layouts.app', ['activePage' => 'vehicle', 'title' => 'Car buy and sell', 'navName' => 'Dashboard', 'activeButton' => 'add-car'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card data-tables">

                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">Vehicles List</h3>

                                </div>
                                <div class="col-4 text-right">
                                    <a href="/vehicle/create" class="btn btn-sm btn-default">Add vehicle</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mt-2">
                            @if (session('error'))
                                <div class="row">
                                    <div class="col-12">
                                        <div class="alert alert-danger" role="alert">
                                            {{ session('error') }}
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if (session('success'))
                                <div class="row">
                                    <div class="col-12">
                                        <div class="alert alert-success" role="alert">
                                            {{ session('success') }}
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="toolbar">
                            <!--        Here you can write extra buttons/actions for the toolbar              -->
                        </div>
                        <div class="card-body table-full-width table-responsive" style="padding: 25px;">
                            <table class="table table-hover table-striped" id="dtBasicExample">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Plate NO</th>
                                        <th>brand</th>
                                        
                                        {{-- <th>type</th>
                                        <th>apk</th> 
                                        <th>first_registeration</th>
                                        <th>last_ascription</th> --}}
                                        {{-- <th>engine_capacity</th>
                                        <th>fuel</th> --}}
                                        <th>bought from</th>
                                        {{-- <th>address</th>
                                        <th>phone</th>
                                        <th>whatsapp</th> --}}
                                        <th>purchase_amount</th>
                                        <th>remainder_amount</th>
                                        <th>remainder instrument</th>
                                        {{-- <th>comment</th> --}}
                                        {{-- <th>created_at</th> --}}
                                        <th>vehicle status</th>
                                        <th>Payment status</th>
                                        <th>Sold Payment status</th>
                                        <th>Sold/Unsold</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                {{-- <tfoot>
                                    <tr>
                                        <th>brand</th>
                                        <th>type</th>
                                        <th>apk</th> 
                                        <th>first_registeration</th>
                                        <th>last_ascription</th>
                                        <th>engine_capacity</th>
                                        <th>fuel</th>
                                        <th>bought_from</th>
                                        <th>address</th>
                                        <th>phone</th>
                                        <th>whatsapp</th>
                                        <th>purchase_amount</th>
                                        <th>remainder_amount</th>
                                        <th>remainder_instrument</th>
                                        <th>comment</th>
                                        <th>created_at</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot> --}}
                                <tbody>
                                    @foreach ($data as $carData)
                                        <tr>
                                            <td>{{ $carData->id }}</td>
                                            <td>{{ $carData->plate_no }}</td>
                                            <td>{{ $carData->brand }}</td>
                                            <td>{{ $carData->bought_from }}</td>
                                            <td>{{ $carData->purchase_amount }}</td>
                                            <td>{{ $carData->remainder_amount }}</td>
                                            <td>{{ $carData->remainder_instrument }}</td>
                                            <td class="allstatus vehiclestatus">
                                                @if($carData->vehicle_status == 'finished')
                                                    <i class="nc-icon greenbulb" ></i> {{$carData->vehicle_status}}
                                                @elseif($carData->vehicle_status == 'pending')
                                                    <i class="nc-icon redbulb"></i> {{$carData->vehicle_status}}
                                                @endif
                                            </td>
                                            <td class="allstatus paymentstatus">
                                                @if($carData->payment_status == 'paid')
                                                    <i class="nc-icon greenbulb" ></i>  <br>{{$carData->payment_status}}
                                                @elseif($carData->payment_status == 'unpaid')
                                                    <i class="nc-icon redbulb"></i>  <br>{{$carData->payment_status}}
                                                @endif
                                            </td>
                                            <td class="allstatus sold_payment_status">
                                                @if($carData->sold_payment_status == 'paid')
                                                    <i class="nc-icon greenbulb" ></i>  <br>{{ $carData->sold_payment_status }}
                                                @elseif($carData->sold_payment_status == 'unpaid')
                                                    <i class="nc-icon redbulb"></i>  <br>{{ $carData->sold_payment_status }}
                                                @else
                                                    <i class="nc-icon  greybulb"></i>
                                                @endif
                                            </td>
                                            <td class="allstatus sold_status">
                                                @if($carData->sold_status == 'sold')
                                                <i class="nc-icon greenbulb" ></i> <br> {{ $carData->sold_status }}
                                                @elseif($carData->sold_status == 'pending')
                                                <i class="nc-icon redbulb" ></i>  <br> {{ $carData->sold_status }}
                                                @else
                                                    <i class="nc-icon  greybulb"></i>
                                                @endif
                                            </td>
                                            <td class="d-flex linkz">
                                                <a href="vehicle/show/{{ $carData->id }}" class="mr-2"><i
                                                        class="fa fa-eye"></i></a>
                                                <a href="vehicle/edit/{{ $carData->id }}" class="mr-2"><i
                                                        class="fa fa-edit"></i></a>
                                                <a href="vehicle/delete/{{ $carData->id }}" class="mr-2 del"><i
                                                        class="nc-icon nc-simple-remove" style="color:red"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
