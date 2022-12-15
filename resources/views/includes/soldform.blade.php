
<fieldset>
    <h3>{{ __('custom.sold_to') }}
        @if(isset($data[0]->vehicle_status) && $data[0]->vehicle_status == 'pending')
           * (<i class="nc-icon redbulb"></i> UnSold)
        @elseif(isset($data[0]->vehicle_status) && $data[0]->vehicle_status == 'finished')
           * (<i class="nc-icon greenbulb"></i> Sold)
        @else
            {{ __('custom.sold_description') }}
        @endif
    </h3>
    <div class="form-row">
        <div class="col-md-4 mb-3">
            <label for="sold_name">{{ __('custom.sold_name') }}</label>
            <input {{$disabled}} type="text" class="form-control" id="sold_name" 
            name="sold_name" placeholder="Full Name"
                @empty($data)
                    value="{{ old('sold_name')}}"
                @else
                    value="{{ $data[0]->sold_name }}"
                @endempty
                />
        </div>
        <div class="col-md-4 mb-3">
            <label for="sold_amount">{{ __('custom.sold_amount') }}</label>
            <input {{$disabled}} type="text" class="form-control" id="sold_amount" placeholder="Amount" name="sold_amount"
            @empty($data)
                value="{{ old('sold_amount')}}"
            @else
                value="{{ $data[0]->sold_amount }}"
            @endempty
            />
        </div>
        <div class="col-md-4 mb-3">
            <label class="form-control-label" for="sold_payment_status">
                {{ __('custom.sold_payment_status') }}
            </label>
            <select {{$disabled}} type="text" name="sold_payment_status" id="sold_payment_status" class="form-control"
                placeholder="{{ __('custom.sold_payment_status') }}" value="{{ old('sold_payment_status') }}">
                @empty($data)
                    <option value="">Select Payment Status</option>
                    <option value="paid">Paid</option>
                    <option value="unpaid">Un Paid</option>
                @else
                    <option value="" @selected($data[0]->sold_payment_status == '')>Select Payment Status</option>
                    <option value="paid" @selected($data[0]->sold_payment_status == 'paid')>Paid</option>
                    <option value="unpaid" @selected($data[0]->sold_payment_status == 'unpaid')>Un Paid</option>
                @endempty
                
            </select>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-6 mb-3">
            <div class="form-group ">
                <label class="form-control-label" for="sold_comment">
                    {{ __('custom.sold_comment') }}
                </label>
                <textarea {{$disabled}} name="sold_comment" id="sold_comment" rows="10" class="form-control" placeholder="{{ __('custom.sold_comment') }}"
                    >@empty($data){{ old('sold_comment') }}@else{{ $data[0]->sold_comment }}@endif</textarea>
                @include('alerts.feedback', ['field' => 'sold_comment'])
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <label class="form-control-label" for="sold_status">
                {{ __('custom.sold_status') }}
            </label>
            <select {{$disabled}} type="text" name="sold_status" id="sold_status" class="form-control"
                placeholder="{{ __('custom.sold_status') }}" value="{{ old('sold_status') }}">
                @empty($data)
                    <option value="">{{ __('custom.sold_status') }}</option>
                    <option value="sold">Sold</option>
                    <option value="pending">Pending</option>
                @else
                    <option value="" @selected($data[0]->sold_status == '')>{{ __('custom.sold_status') }}</option>
                    <option value="sold" @selected($data[0]->sold_status == 'sold')>Sold</option>
                    <option value="pending" @selected($data[0]->sold_status == 'pending')>Pending</option>
                @endempty
               
            </select>
        </div> 
    </div>

</fieldset>
