
                    
                    
                    @if($Featured['image'])
                    <img class="alignnone gooddeeds_video" src="{!! $Featured['image'] !!}">
                    @endif
                    {{  $Featured['text'] }}
                    @if($Featured['social_share'])
                    <div class="gooddeeds_social">
                        <a class="btn btn-block btn-social btn-facebook">
                            <span class="fa fa-facebook"></span> Share
                        </a>
                        <a class="btn btn-block btn-social btn-twitter">
                            <span class="fa fa-twitter"></span> Twitter
                        </a>
                        <a class="btn btn-block btn-social btn-pinterest">
                            <span class="fa fa-pinterest"></span> Pin it
                        </a>
                        <a class="btn btn-block btn-social btn-google-plus">
                            <span class="fa fa-google-plus"></span>
                        </a>
                        <a class="btn btn-block btn-social btn-hand-o-down">
                            <span class="fa fa-hand-o-down"></span> Fancy
                        </a>
                    </div>
                    @endif
                    
                    @if($Featured['link'])
                  <a class="btn-default btn atanaha_btn" href="#">{{ $Featured['button_text'] }}</a>
                    @endif