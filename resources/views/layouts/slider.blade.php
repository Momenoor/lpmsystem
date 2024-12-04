<div class="home2-slider rev_slider_wrapper" style="margin-top: -80px !important; margin-bottom: 80px !important;">
    <!-- START REVOLUTION SLIDER -->
    <div class="rev_slider_wrapper fullwidthbanner-container">
        <div id="rev-slider2" class="rev_slider fullwidthabanner">
            <ul>
                @foreach($sliders as $slider)
                    <li data-transition="fade">
                        <img src="{{asset('storage/'.$slider->image)}}" alt="" width="1920" height="880"
                             data-bgposition="top center" data-bgfit="cover" data-bgrepeat="no-repeat"
                             data-bgparallax="1">
                        <div class="tp-caption  tp-resizeme"
                             data-x="center" data-hoffset=""
                             data-y="bottom" data-voffset="480"
                             data-transform_idle="o:1;"
                             data-transform_in="x:[-75%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;"
                             data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                             data-mask_in="x:[100%];y:0;s:inherit;e:inherit;"
                             data-splitin="none"
                             data-splitout="none"
                             data-start="700">
                            <div class="slide-content-box">
                                <strong class="sl2">{{$slider->title}}</strong>
                            </div>
                        </div>
                        @if($slider->subtitle)
                            @foreach($slider->subtitle as $key => $subtitle)
                                <div class="tp-caption  tp-resizeme"
                                     data-x="center" data-hoffset=""
                                     data-y="bottom" data-voffset="{{(380-($key*85))}}"
                                     data-transform_idle="o:1;"
                                     data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;"
                                     data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                                     data-mask_in="x:[100%];y:0;s:inherit;e:inherit;"
                                     data-splitin="none"
                                     data-splitout="none"
                                     data-start="{{(1200+($key*300))}}">
                                    <div class="slide-content-box">
                                        <h1 class="sl2">{{ $subtitle }}</h1>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                        <div class="tp-caption  tp-resizeme"
                             data-x="center" data-hoffset=""
                             data-y="bottom"
                             data-voffset="{{$slider->subtitle?380 - (count($slider->subtitle)*85):220}}"
                             data-transform_idle="o:1;"
                             data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;"
                             data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                             data-mask_in="x:[100%];y:0;s:inherit;e:inherit;"
                             data-splitin="none"
                             data-splitout="none"
                             data-start="{{$slider->subtitle?1500 + (count($slider->subtitle)*300):2000}}">
                            <div class="slide-content-box">
                                <a href="{{url($slider->link)}}" class="con">{{$slider->link_text}}</a>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <!-- END REVOLUTION SLIDER -->
</div>
