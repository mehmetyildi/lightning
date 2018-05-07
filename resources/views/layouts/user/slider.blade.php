        <section class="rev_slider_wrapper">
            <div id="slider1" class="rev_slider" data-version="5.0">
                <ul>
                    <!-- SLIDE  -->
                    <!-- SLIDE  -->
                    <?php $i=1 ?>
                    @foreach($posts as $post)
                    <li data-index='rs-{{$i}}' data-transition='curtain-1' data-slotamount='default' data-easein='default' data-easeout='default' data-masterspeed='default' data-thumb='../../assets/images/photography3-280x43.jpg' data-rotate='0' data-saveperformance='off' data-title='Curtain from Left' data-description=''>
                        <img src="{{$post->image_url}}" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg">

                        <div class="tp-caption NotGeneric-Title   tp-resizeme" id="slide-398-layer-1" data-x="center" data-hoffset="" data-y="center" data-voffset="10" data-width="['auto','auto','auto','auto']" data-height="['auto','auto','auto','auto']" data-transform_idle="o:1;" data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;" data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" data-start="1000" data-splitin="none" data-splitout="none" data-responsive_offset="on" style="z-index: 5; white-space: normal; font-size: 16px; line-height: 24px;margin-bottom:40px;font-weight:normal;text-align:center;">
                            <div class="smooth-textbox">
                                <div class="smoothwrp">
                                    
                                    <h1>{{$post->title}}</h1>
                                    {!!$post->body_small!!}
                                </div>
                            </div>
                        </div>

                        <div class="tp-caption NotGeneric-Title   tp-resizeme" id="slide-498-layer-3" data-x="center" data-hoffset="" data-y="center" data-voffset="140" data-width="['auto','auto','auto','auto']" data-height="['auto','auto','auto','auto']" data-transform_idle="o:1;" data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" data-start="3000" data-splitin="none" data-splitout="none" data-responsive_offset="on" style="z-index: 7; white-space: nowrap; font-size: 16px; line-height: 50px;font-weight:500;text-align:center;">
                            <div class="slidebtns">
                                <a href="/{{$post->type()}}/show/{{$post->id}}" class="slidebtn1">Devamı</a>
                            </div>

                        </div>
                    </li>
                    <?php $i++; ?>
                    @endforeach
                   

                      

                </ul>
            </div>
        </section>