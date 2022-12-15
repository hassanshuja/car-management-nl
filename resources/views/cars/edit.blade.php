@extends('layouts.app', ['activePage' => 'add-car', 'title' => 'create car data', 'navName' => 'Car Data', 'activeButton' => 'add-car'])

@section('content')
@php
    $disabled = '';
@endphp
    <div class="content">
        <div class="container-fluid">
            <div class="section-image">
                <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
                <div class="row">
                    <div class="card col-md-12">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-md-4">
                                    <h3 class="mb-0">{{ __('custom.search_vehicle') }}</h3>
                                </div>
                            </div>
                        </div>
                        <?php

                        // dd($errors);
                        ?>
                        <div class="card-body col-md-4">
                            <div class="pl-lg-2">
                                @include('alerts.success')
                                @include('alerts.error_self_update', ['key' => 'not_allow_profile'])
                                <div class="form-group {{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">
                                        <i class="nc-icon nc-badge"></i> {{ __('custom.plate_no') }}
                                        {{-- <i class="w3-xxlarge fa fa-user"></i>{{ __('custom.plate_no') }} --}}
                                    </label>
                                    <input type="text" id="search_plate_no"
                                        class="form-control {{ $errors->has('plate_no') ? ' is-invalid' : '' }}"
                                        placeholder="R-829-VT" value="{{old('plate_no') ?? $data[0]->plate_no}}" required autofocus>

                                    @include('alerts.feedback', ['field' => 'plate_no'])
                                </div>
                                <div>
                                    <button type="submit" onclick="getPlateData()"
                                        class="btn btn-default mt-4">{{ __('custom.search') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" >
                    <div class="card col-md-8">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h3 class="mb-0">{{ __('custom.vehicle_heading') }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form id="update" method="post" action="{{ route('vehicle.update', $data[0]->id) }}" autocomplete="off"
                                enctype="multipart/form-data">
                                @csrf
                                @method('patch')

                                <div class="pl-lg-2">

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group ">
                                                <label class="form-control-label" for="brand">
                                                    {{ __('custom.brand') }}
                                                </label>
                                                <input type="text" name="brand" id="brand" class="form-control"
                                                    placeholder="{{ __('custom.brand') }}" value="{{old('brand') ?? $data[0]->brand}}" >
                                                @include('alerts.feedback', ['field' => 'brand' ])
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group ">
                                                <label class="form-control-label" for="type">
                                                    {{ __('custom.type') }}
                                                </label>
                                                <input type="text" name="type" id="type" class="form-control"
                                                    placeholder="{{ __('custom.type') }}" value="{{old('type') ?? $data[0]->type}}" required>
                                                @include('alerts.feedback', ['field' => 'type'])
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group ">
                                                <label class="form-control-label" for="apk">
                                                    {{ __('custom.apk') }}
                                                </label>
                                                <input type="text" name="apk" id="apk" class="form-control"
                                                    placeholder="{{ __('custom.apk') }}" value="{{old('apk') ?? $data[0]->apk}}" required>
                                                @include('alerts.feedback', ['field' => 'apk'])
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group ">
                                                <label class="form-control-label" for="first_registeration">
                                                    {{ __('custom.first_registeration') }}
                                                </label>
                                                <input type="text" name="first_registeration"
                                                    id="first_registeration" class="form-control"
                                                    placeholder="{{ __('custom.first_registeration') }}" value="{{old('first_registeration') ?? $data[0]->first_registeration}}"
                                                    required>
                                                @include('alerts.feedback', ['field' => 'first_registeration'])
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group ">
                                                <label class="form-control-label" for="last_ascription">
                                                    {{ __('custom.last_ascription') }}
                                                </label>
                                                <input type="text" name="last_ascription" id="last_ascription"
                                                    class="form-control" placeholder="{{ __('custom.last_ascription') }}"
                                                    value="{{old('last_ascription') ?? $data[0]->last_ascription}}" required>
                                                @include('alerts.feedback', ['field' => 'last_ascription'])
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group ">
                                                <label class="form-control-label" for="engine_capacity">
                                                    {{ __('custom.engine_capacity') }}
                                                </label>
                                                <input type="text" name="engine_capacity" id="engine_capacity"
                                                    class="form-control" placeholder="{{ __('custom.engine_capacity') }}"
                                                    value="{{old('engine_capacity') ?? $data[0]->engine_capacity}}" required>
                                                @include('alerts.feedback', ['field' => 'engine_capacity'])
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group ">
                                                <label class="form-control-label" for="fuel">
                                                    {{ __('custom.fuel') }}
                                                </label>
                                                <input type="text" name="fuel" id="fuel"
                                                    class="form-control" placeholder="{{ __('custom.fuel') }}"
                                                    value="{{old('fuel') ?? $data[0]->fuel}}" required>
                                                @include('alerts.feedback', ['field' => 'fuel'])
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group ">
                                                <label class="form-control-label" for="bought_from">
                                                    {{ __('custom.bought_from') }}
                                                </label>
                                                <input type="text" name="bought_from" id="bought_from"
                                                    class="form-control" placeholder="{{ __('custom.bought_from') }}"
                                                    value="{{old('bought_from') ?? $data[0]->bought_from}}" required>
                                                @include('alerts.feedback', ['field' => 'bought_from'])
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group ">
                                                <label class="form-control-label" for="address">
                                                    {{ __('custom.address') }}
                                                </label>
                                                <input type="text" name="address" id="address"
                                                    class="form-control" placeholder="{{ __('custom.address') }}"
                                                    value="{{old('address') ?? $data[0]->address}}" required>
                                                @include('alerts.feedback', ['field' => 'address'])
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group ">
                                                <label class="form-control-label" for="phone">
                                                    {{ __('custom.phone') }}
                                                </label>
                                                <input type="text" name="phone" id="phone"
                                                    class="form-control" placeholder="{{ __('custom.phone') }}"
                                                    value="{{old('phone') ?? $data[0]->phone}}" required>
                                                @include('alerts.feedback', ['field' => 'phone'])
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group ">
                                                <label class="form-control-label" for="whatsapp">
                                                    {{ __('custom.whatsapp') }}
                                                </label>
                                                <input type="text" name="whatsapp" id="whatsapp"
                                                    class="form-control" placeholder="{{ __('custom.whatsapp') }}"
                                                    value="{{old('whatsapp') ?? $data[0]->whatsapp}}" required>
                                                @include('alerts.feedback', ['field' => 'whatsapp'])
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group ">
                                                <label class="form-control-label" for="purchase_amount">
                                                    {{ __('custom.purchase_amount') }}
                                                </label>
                                                <input type="text" name="purchase_amount" id="purchase_amount"
                                                    class="form-control" placeholder="{{ __('custom.purchase_amount') }}"
                                                    value="{{old('purchase_amount') ?? $data[0]->purchase_amount}}" required>
                                                @include('alerts.feedback', ['field' => 'purchase_amount'])
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group ">
                                                <label class="form-control-label" for="remainder_amount">
                                                    {{ __('custom.remainder_amount') }}
                                                </label>
                                                <input type="text" name="remainder_amount"
                                                    id="remainder_amount" class="form-control"
                                                    placeholder="{{ __('custom.remainder_amount') }}" value="{{old('remainder_amount') ?? $data[0]->remainder_amount}}"
                                                    required>
                                                @include('alerts.feedback', ['field' => 'remainder_amount'])
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group ">
                                                <label class="form-control-label" for="remainder_instrument">
                                                    {{ __('custom.remainder_instrument') }}
                                                </label>
                                                <select type="text" name="remainder_instrument"
                                                    id="remainder_instrument" class="form-control"
                                                    placeholder="{{ __('custom.remainder_instrument') }}" value="{{old('remainder_instrument') ?? $data[0]->remainder_instrument}}"
                                                    required>
                                                    <option value="bank" @selected( (old('version') ?? $data[0]->remainder_instrument) == "bank") >Bank</option>
                                                    <option value="cash"  @selected( (old('version') ?? $data[0]->remainder_instrument) == "cash")>Cash</option>
                                                </select>
                                                @include('alerts.feedback', ['field' => 'remainder_instrument'])
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group ">
                                                <label class="form-control-label" for="email">
                                                    {{ __('custom.email') }}
                                                </label>
                                                <input type="email" name="email"
                                                    id="email" class="form-control"
                                                    placeholder="{{ __('custom.email') }}" value="{{old('email') ?? $data[0]->email}}"
                                                    required>
                                                @include('alerts.feedback', ['field' => 'email'])
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group ">
                                                <label class="form-control-label" for="comment">
                                                    {{ __('custom.comment') }}
                                                </label>
                                                <textarea name="comment" id="comment" rows="10" class="form-control"
                                                    placeholder="{{ __('custom.comment') }}" required>{{old('comment') ?? $data[0]->comment}}</textarea>
                                                @include('alerts.feedback', ['field' => 'comment'])
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group ">
                                                <label class="form-control-label" for="vehicle_status">
                                                    {{ __('custom.vehicle_status') }}
                                                </label>
                                                <select type="text" name="vehicle_status"
                                                    id="vehicle_status" class="form-control"
                                                    placeholder="{{ __('custom.vehicle_status') }}" value="{{old('vehicle_status') ?? $data[0]->vehicle_status}}"
                                                    required>
                                                    <option value="">Select vehicle_status</option>
                                                    <option value="pending" @selected( (old('version') ?? $data[0]->vehicle_status) == "pending") >Pending</option>
                                                    <option value="finished"  @selected( (old('version') ?? $data[0]->vehicle_status) == "finished")>Finished</option>
                                                </select>
                                                @include('alerts.feedback', ['field' => 'vehicle_status'])
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group ">
                                                <label class="form-control-label" for="payment_status">
                                                    {{ __('custom.payment_status') }}
                                                </label>
                                                <select type="text" name="payment_status"
                                                    id="payment_status" class="form-control"
                                                    placeholder="{{ __('custom.payment_status') }}" value="{{old('payment_status') ?? $data[0]->payment_status}}"
                                                    required>
                                                    <option value="" @selected($data[0]->payment_status == '')>Select Payment Status</option>
                                                    <option value="paid" @selected($data[0]->payment_status == 'paid')>Paid</option>
                                                    <option value="unpaid" @selected($data[0]->payment_status == 'unpaid')>Un Paid</option>
                                                </select>
                                                @include('alerts.feedback', ['field' => 'payment_status'])
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                @include('includes/soldform')
                                <div>
                                    <input type="hidden" name="plate_no" id="plate_no" value="{{old('plate_no') ?? $data[0]->plate_no}}">
                                    <button type="button" onclick="submitForm()" class="btn btn-default mt-4">{{ __('custom.save') }}</button>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
 
<script>
    function getPlateData() {
        let route = "{{ route('vehicle.searchplate') }}";
        let token = "{{ csrf_token() }}";
        let plate_no = $('#search_plate_no').val()
        if (plate_no == "") {
            demo.showCustomNotification('top', 'center', 'Please insert Plate no.', 4)
            return false;
        }

        $.ajax({
            url: route,
            type: 'POST',
            data: {
                _token: token,
                plate_no: plate_no,
            },
            success: function(response) {
                let data = JSON.parse(response);
                if (Object.keys(data).length > 0 ) {
                    $('#showForm').fadeIn('slow')
                    $('#brand').val(data.merk)
                    $('#type').val(data.type)
                    $('#apk').val(data.apk)
                    $('#first_registeration').val(data.first_erreste)
                    $('#last_ascription').val(data.laatste)
                    $('#engine_capacity').val(data.Cilinderinhoud)
                    $('#fuel').val(data.Brandstof)
                }else{
                    demo.showCustomNotification('top', 'center', 'No result found', 4)
                }
            },
            error: function(xhr) {
                console.log(xhr)
                let res = JSON.parse(xhr.responseText)
                demo.showCustomNotification('top', 'center', res, 4)
                //Do Something to handle error
            }
        });

    }

    function _get_values(form) {
        let data = {};
        $(form).find('input, textarea, select').each(function(x, field) {
            if (field.name) {
                if (field.name.indexOf('[]') > 0) {
                    if (!$.isArray(data[field.name])) {
                        data[field.name] = new Array();
                    }
                    for (let i = 0; i < field.selectedOptions.length; i++) {
                        data[field.name].push(field.selectedOptions[i].value);
                    }

                } else {
                    data[field.name] = field.value;
                }
            }

        });
        return data
    }

    function submitForm() {
       let plate_no = $('#search_plate_no').val();
       $('#plate_no').val(plate_no)
       let form  = $("#update")
       let mydata =  _get_values(form)
       var check = 'true'
      
       Object.entries(mydata).forEach(function(item, index){
        console.log(item)
        
        if(item[1].trim() == ""){
            check = 'false';
            demo.showCustomNotification('top', 'center', `${item[0]} is empty. Please insert some value`, 4)
            $("#"+item[0]).css("border", '1px solid red')
        }else{
            $("#"+item[0]).css("border", '1px solid #E3E3E3')
        }
       })
    //    form.submit()
        if(check == 'true') {
            
            form.submit()
        }
    }

    

    
</script>
