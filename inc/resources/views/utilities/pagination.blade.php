<nav aria-label="Pagination">
  <ul class="pagination">
       @if($previous)
    <li class="page-item {{ $previous['class'] }}">
      <span class="page-link">{{ $previous['text'] }}</span>
    </li>
      @endif
      
      @foreach($pages as $page)
    <li class="page-item {{ $page['class'] }}"><a class="page-link" href="{{ $page['href'] }}">{{ $page['number'] }}</a></li>
    @endforeach
      @if($next)
    <li class="page-item">
      <a class="page-link" href="#">{{ $next['text'] }}</a>
    </li>
      @endif
  </ul>
</nav>