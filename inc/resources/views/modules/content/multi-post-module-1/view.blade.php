<section class="ministries {{$class}}" id="{{$sid}}">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-default">
                        @if($title)
                       <h2 class="section-title">{{ $title }}</h2>
                       @endif
                      @if($content)
                       <div class="section-content">{{$content}}</div>
                       @endif
                       
                        
                        <ul class="ministries_group">
                            <li class="ministries_item text-center">
                                <img src="/wp-content/themes/simthemeco/assets/css/images/heartforuganda-children.jpg">
                                <h3>Children</h3>
                                <p>By changing the life of a child, you can change the world!</p>
                                <a class="btn btn-primary" href="#">Read More</a>
                            </li>
                            <li class="ministries_item text-center">
                                <img src="/wp-content/themes/simthemeco/assets/css/images/HeartforUganda-school.jpg">
                                <h3>School Project</h3>
                                <p>The school, Sparkling Gems Nursery and Primary School, was designed to educate children in Preschool through Grade Four.</p>
                                <a class="btn btn-primary" href="#">Read More</a>
                            </li>
                            <li class="ministries_item text-center">
                                <img src="/wp-content/themes/simthemeco/assets/css/images/HeartforUganda-medical.jpg">
                                <h3>Medical Center</h3>
                                <p>In June 2009, the ground breaking ceremony was conducted and construction of McFarland Memorial Medical Center began.</p>
                                <a class="btn btn-primary" href="#">Read More</a>
                            </li>
                            <li class="ministries_item text-center">
                                <img src="/wp-content/themes/simthemeco/assets/css/images/HeartforUganda-water.jpg">
                                <h3>Water</h3>
                                <p>The availability of safe drinking water is a concern in most areas of Africa, yet we have experienced a miracle on the land for the Children's Village.</p>
                                <a class="btn btn-primary" href="#">Read More</a>
                            </li>
                            <li class="ministries_item text-center">
                                <img src="/wp-content/themes/simthemeco/assets/css/images/HeartforUganda-church.jpg">
                                <h3>Church Ministry</h3>
                                <p>God's Care Church has been experiencing church growth since it began in the summer of 2007.</p>
                                <a class="btn btn-primary" href="#">Read More</a>
                            </li>
                            <li class="ministries_item text-center">
                                <img src="/wp-content/themes/simthemeco/assets/css/images/HeartforUganda-elderlycare.jpg">
                                <h3>Elderly Care</h3>
                                <p>We continue to visit and assess the needs of some of the elderly who try to care for vulnerable children, but they themselves live in abject poverty. </p>
                                <a class="btn btn-primary" href="#">Read More</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
  {!! $ExtraData !!}
        
    </section>