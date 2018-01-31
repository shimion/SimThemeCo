<div class="request-list">
                            <ul class="prayer_listing">
                            
                             
                               @foreach($requests['query'] as $key=>$request)
                                <li class="listing_item bluecolor_icon request-item-{{ $key }}">
                                    
                                    
                                    
                            <div class="prayer_cat_image">
                                <img class="alignnone" src="http://atanahaprayer.webimpakt-green.com/wp-content/themes/atanaha/images/Atanaha-bluecolor-icon.png">
                            </div>
                            <div class="prayer_itemtext">
                                <h4><a href="#">{{ $request['post_title'] }}</a></h4>
                                <p>{{ $request['post_content'] }}</p>
                                <div class="dateandtime"><span class="date">{!! $request['post_date'] !!}</span></div>
                            </div>
                                    
                                    
                                    
                                   
                                </li>
                                @endforeach
                            </ul>
                            
                            
                          <div class="col-sm-12">
                <div class="widget widget_button">
                    <a class="btn-default btn atanaha_btn" href="{{ $requests['more']['url']  }}">{{ $requests['more']['text']  }}</a>
                </div>
            </div>  
                            
                        </div>