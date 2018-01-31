 <section id="{{ $sid }}">
        <div class="container">
            <div class="icon-bar text-right">
                @if($Socials)
                @foreach($Socials as $key=>$social)
                @if($social)
                <a class="btn btn-social-icon btn-{{ $key }}" href="{{ $social }}"><span class="fa fa-{{ $key }}"></span></a>
                @endif
                @endforeach
                @endif
            </div>
        </div>
    </section>