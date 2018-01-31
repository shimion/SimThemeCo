<div class="events-list">
                            <ul>
                            
                             
                               @foreach($events as $key=>$event)
                                <li class="event-item event-item-{{ $key }}">
                                    <span class="event_dateofmonth">{!! $event['post_date'] !!}</span>
                                    <span class="event_tittleandtime">
                                        <h4>{{ $event['post_title'] }}</h4>
                                        <div class="eventtime">{{ $event['post_time'] }}</div>
                                        <div class="event_regbtn"><a href="{{ $event['post_link'] }}">Register Online</a></div>
                                    </span>
                                </li>
                                @endforeach
                            </ul>
                        </div>