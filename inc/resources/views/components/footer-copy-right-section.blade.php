
            <div class="col-sm-12">
               @if($Data->Get('global.business_phone'))
                <p>CALL OUR OFFICES AT:</p>
                <h3>{{ $Data->Get('global.business_phone') }}</h3>
               @endif
               @if($Data->Get('global.business_address'))
                <p>OFFICE ADDRESS:</p>
                <h3>{{ $Data->Get('global.business_address') }}</h3>
                @endif
            </div>
            <div class="col-sm-12">
                {!! $FooterMenu !!}
                @if($Data->Get('global.coppy_right'))
                <div class="copy_right_wapper">{!! $Data->Get('global.coppy_right') !!}</div>
                @endif
            </div>
