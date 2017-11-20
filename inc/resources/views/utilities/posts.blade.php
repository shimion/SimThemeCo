
                <div class="textwidget">
                    <ul class="post_list">
                        @if($posts['query'])
                            @foreach($posts['query'] as $key=>$post)
                           <li class="post_list_item">
                            <h4><a href="{{ $post['post_link'] }}">{{ $post['post_title'] }}</a></h4>
                            <p>{{ $post['post_content'] }}</p>
                            <div class="dateandtime">{{ $post['post_date'] }}</div>
                        </li>
                            @endforeach
                         @endif  
                           
                           @if($posts['enable_button'])
                           <div class="post_list_btn">
                            <a class="btn-default btn atanaha_btn" href="{{ $posts['url'] }}">{{ $posts['text'] }}</a>
                            </div>
                            @endif
                    </ul>
                </div>
