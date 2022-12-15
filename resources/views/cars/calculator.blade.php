@extends('layouts.app', ['activePage' => 'add-car', 'title' => 'create car data', 'navName' => 'Car Data', 'activeButton' => 'add-car'])

@section('content')
@php
    $disabled = '';
@endphp
    <div class="content">
        <div class="container-fluid">
            <div class="section-image">
                <hr>
                <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
                <div class="row" id="showForm">
                    <div class="card col-md-8">
                        <div class="card-header" style="border-bottom:1px solid #eee !important; padding-bottom:5px; "> 
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h3 class="mb-0">{{ __('custom.calculator_heading') }}</h3>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="card-body">
                            <form action="#" id="calculate" autocomplete="off">
                                <div class="pl-lg-2">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group ">
                                            <label class="form-control-label calc-label" for="ink1">
                                                {{ __('Ink1') }}
                                            </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group ">
                                                <input type="text" name="ink1" id="ink1" class="form-control"
                                                    placeholder="{{ __('Ink1') }}" value="" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group ">
                                            <label class="form-control-label calc-label" for="ink2">
                                                {{ __('Ink2') }}
                                            </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group ">
                                                <input type="text" name="ink2" id="ink2" class="form-control"
                                                    placeholder="{{ __('Ink2') }}" value="" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group ">
                                            <label class="form-control-label calc-label" for="coms_incl">
                                                {{ __('Commisie incl') }}
                                            </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group ">
                                                <input type="text" name="coms_incl" id="coms_incl" class="form-control"
                                                    placeholder="{{ __('Commisie incl') }}" value="" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group ">
                                            <label class="form-control-label calc-label" for="crpti">
                                                {{ __('crpti') }}
                                            </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group ">
                                                <input type="text" name="crpti" id="crpti" class="form-control"
                                                    placeholder="{{ __('crpti') }}" value="" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group ">
                                            <label class="form-control-label calc-label" for="mns">
                                                {{ __('mns') }}
                                            </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group ">
                                                <input type="text" name="mns" id="mns" class="form-control"
                                                    placeholder="{{ __('mns') }}" value="" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group ">
                                            <label class="form-control-label calc-label" for="ds-ink">
                                                {{ __('ds-ink') }}
                                            </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group ">
                                                <input type="text" name="ds-ink" id="ds-ink" class="form-control"
                                                    placeholder="{{ __('ds-ink') }}" value="" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group ">
                                            <label class="form-control-label calc-label" for="brand">
                                                {{ __('brandstofkosten') }}
                                            </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group ">
                                                <input type="text" name="brand" id="brand" class="form-control"
                                                    placeholder="{{ __('brandstofkosten') }}" value="" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group ">
                                            <label class="form-control-label calc-label" for="ink2">
                                                {{ __('Ink2') }}
                                            </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group ">
                                                <input disabled type="text" name="total" id="total" class="form-control"
                                                    placeholder="{{ __('Total') }}" value="" >
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div>
                                    <button type="submit" class="btn btn-default mt-4">{{ __('calculate') }}</button>
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

    document.addEventListener('submit', calculate)
    
    function calculate(e) {
        e.preventDefault()
        let sum = 0;
       $("#calculate").serializeArray().reduce(function (obj, item) {
            if(item.value){
                sum += parseFloat(item.value);
                $('#total').val(sum)
            }

        }, {});
  
      
    //    Object.entries(mydata).forEach(function(item, index){
    //     console.log(item)
        
    //     if(item[1].trim() == "" && $('#'+item[0]).attr('required') == 'required'){
    //         check = 'false';
    //         demo.showCustomNotification('top', 'center', `${item[0]} is empty. Please insert some value`, 4)
    //         $("#"+item[0]).css("border", '1px solid red')
    //     }else{
    //         $("#"+item[0]).css("border", '1px solid #E3E3E3')
    //     }
    //    })
   
    }

</script>