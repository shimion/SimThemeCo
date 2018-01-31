            <div class="icon-bar text-right">
                @if($Socials)
                @foreach($Socials as $key=>$social)
                <a class="btn btn-social-icon btn-{{ $key }}" href="{{ $social }}"><span class="fa fa-{{ $key }}"></span></a>
                @endforeach
                @endif
            </div>
