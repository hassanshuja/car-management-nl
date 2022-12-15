@extends('layouts.app', ['activePage' => 'add-car', 'title' => 'create car data', 'navName' => 'Car Data', 'activeButton' => 'add-car'])

@section('content')
@php
    $disabled = 'disabled';
@endphp
    <div class="content">
        <div class="container-fluid">
            <div class="section-image">
                <div class="row" >
                    <div class="card col-md-12">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h3 class="mb-0">{{ __('custom.vehicle_heading_show') }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form id="store" method="post" action="{{ route('vehicle.store') }}" autocomplete="off"
                                enctype="multipart/form-data">
                                @csrf
                                @method('post')

                                @include('alerts.success')
                                @include('alerts.error_self_update', ['key' => 'not_allow_profile'])

                                <div class="pl-lg-2">

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group ">
                                                <label class="form-control-label" for="brand">
                                                    {{ __('custom.brand') }}
                                                </label>
                                                <input type="text" readonly name="brand" id="brand" class="form-control"
                                                    placeholder="{{ __('custom.brand') }}" value="{{$data[0]->brand }}" >
                                                @include('alerts.feedback', ['field' =>  'brand' ])
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group ">
                                                <label class="form-control-label" for="type">
                                                    {{ __('custom.type') }}
                                                </label>
                                                <input type="text" readonly name="type" id="type" class="form-control"
                                                    placeholder="{{ __('custom.type') }}" value="{{$data[0]->type }}" required>
                                                @include('alerts.feedback', ['field' => 'type'])
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group ">
                                                <label class="form-control-label" for="apk">
                                                    {{ __('custom.apk') }}
                                                </label>
                                                <input type="text" readonly name="apk" id="apk" class="form-control"
                                                    placeholder="{{ __('custom.apk') }}" value="{{$data[0]->apk }}" required>
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
                                                <input type="text" readonly name="first_registeration"
                                                    id="first_registeration" class="form-control"
                                                    placeholder="{{ __('custom.first_registeration') }}" value="{{$data[0]->first_registeration }}"
                                                    required>
                                                @include('alerts.feedback', ['field' => 'first_registeration'])
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group ">
                                                <label class="form-control-label" for="last_ascription">
                                                    {{ __('custom.last_ascription') }}
                                                </label>
                                                <input type="text" readonly name="last_ascription" id="last_ascription"
                                                    class="form-control" placeholder="{{ __('custom.last_ascription') }}"
                                                    value="{{$data[0]->last_ascription }}" required>
                                                @include('alerts.feedback', ['field' => 'last_ascription'])
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group ">
                                                <label class="form-control-label" for="engine_capacity">
                                                    {{ __('custom.engine_capacity') }}
                                                </label>
                                                <input type="text" readonly name="engine_capacity" id="engine_capacity"
                                                    class="form-control" placeholder="{{ __('custom.engine_capacity') }}"
                                                    value="{{$data[0]->engine_capacity }}" required>
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
                                                <input type="text" readonly name="fuel" id="fuel"
                                                    class="form-control" placeholder="{{ __('custom.fuel') }}"
                                                    value="{{$data[0]->fuel }}" required>
                                                @include('alerts.feedback', ['field' => 'fuel'])
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group ">
                                                <label class="form-control-label" for="bought_from">
                                                    {{ __('custom.bought_from') }}
                                                </label>
                                                <input type="text" readonly name="bought_from" id="bought_from"
                                                    class="form-control" placeholder="{{ __('custom.bought_from') }}"
                                                    value="{{$data[0]->bought_from }}" required>
                                                @include('alerts.feedback', ['field' => 'bought_from'])
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group ">
                                                <label class="form-control-label" for="address">
                                                    {{ __('custom.address') }}
                                                </label>
                                                <input type="text" readonly name="address" id="address"
                                                    class="form-control" placeholder="{{ __('custom.address') }}"
                                                    value="{{$data[0]->address }}" required>
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
                                                <input type="text" readonly name="phone" id="phone"
                                                    class="form-control" placeholder="{{ __('custom.phone') }}"
                                                    value="{{$data[0]->phone }}" required>
                                                @include('alerts.feedback', ['field' => 'phone'])
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group ">
                                                <label class="form-control-label" for="whatsapp">
                                                    {{ __('custom.whatsapp') }}
                                                </label>
                                                <input type="text" readonly name="whatsapp" id="whatsapp"
                                                    class="form-control" placeholder="{{ __('custom.whatsapp') }}"
                                                    value="{{$data[0]->whatsapp }}" required>
                                                @include('alerts.feedback', ['field' => 'whatsapp'])
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group ">
                                                <label class="form-control-label" for="purchase_amount">
                                                    {{ __('custom.purchase_amount') }}
                                                </label>
                                                <input type="text" readonly name="purchase_amount" id="purchase_amount"
                                                    class="form-control" placeholder="{{ __('custom.purchase_amount') }}"
                                                    value="{{$data[0]->purchase_amount }}" required>
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
                                                <input type="text" readonly name="remainder_amount"
                                                    id="remainder_amount" class="form-control"
                                                    placeholder="{{ __('custom.remainder_amount') }}" value="{{$data[0]->remainder_amount }}"
                                                    required>
                                                @include('alerts.feedback', ['field' => 'remainder_amount'])
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group ">
                                                <label class="form-control-label" for="remainder_instrument">
                                                    {{ __('custom.remainder_instrument') }}
                                                </label>
                                                <input type="text" readonly name="remainder_instrument"
                                                    id="remainder_instrument" class="form-control"
                                                    readonly
                                                    placeholder="{{ __('custom.remainder_instrument') }}" value="{{$data[0]->remainder_instrument }}"
                                                    required>
                                                   
                                                @include('alerts.feedback', ['field' => 'remainder_instrument'])
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group ">
                                                <label class="form-control-label" for="comment">
                                                    {{ __('custom.comment') }}
                                                </label>
                                                <textarea name="comment" id="comment" rows="10" class="form-control" readonly
                                                    placeholder="{{ __('custom.comment') }}"  required>{{ $data[0]->comment }}</textarea>
                                                @include('alerts.feedback', ['field' => 'comment'])
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                @include('includes/soldform')
                                <div>
                                    <a href="{{ url()->previous() }}">
                                        <button type="button" onclick="" class="btn btn-default mt-4">{{ __('custom.back') }}</button>
                                    </a>
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
        let plate_no = $('#plate_no').val()
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
                if (response) {
                    let data = JSON.parse(response);
                    console.log(data)
                    $('#brand').val(data.merk)
                    $('#type').val(data.type)
                    $('#apk').val(data.apk)
                    $('#first_registeration').val(data.first_erreste)
                    $('#last_ascription').val(data.laatste)
                    $('#engine_capacity').val(data.Cilinderinhoud)
                    $('#fuel').val(data.Brandstof)

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
        
       let form  = $("#store")
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
       form.submit()
        if(check == 'true') {
            form.submit()
        }
    }

    

    
</script>
