<div class="sidebar">
    <div class="widget aboutme">
        <h4 class="widget-title">Hakkımızda</h4>
        <div class="widget-box">
            <div class="aboutmeimg"><img src="{{$about->image_url}}" style="height: 310px;width: 242px" alt="image" /></div>
            <h5>{{$about->title}}</h5>
            <p>{!!substr($about->body,0,300)!!}</p>
            <span class="sign"><img src="/creative_template/images/widget/signature.png"  alt="image" /></span>
        </div>
    </div>
    <div class="widget w-subscribe">
        <h4 class="widget-title">Sosyal Medya</h4>
        <div class="widget-box">
            <div class="social-widget">
                <a href="{{$hp->facebook}}" target="_blank"><i class="fa fa-facebook"></i></a>
                <a href="{{$hp->twitter}}" target="_blank"><i class="fa fa-twitter"></i></a>
                <a href="{{$hp->instagram}}" target="_blank"><i class="fa fa-instagram"></i></a>
            </div>
        </div>
    </div>
<!--     <div class="widget w-insta">
        <h4 class="widget-title">Follow On Instagram</h4>
        <div class="widget-box">
            <ul class="instapic">
                <li>
                    <a href="#"><img src="/creative_template/images/widget/insta1.jpg" alt="image" /></a>
                </li>
                <li>
                    <a href="#"><img src="/creative_template/images/widget/insta2.jpg" alt="image" /></a>
                </li>
                <li>
                    <a href="#"><img src="/creative_template/images/widget/insta3.jpg" alt="image" /></a>
                </li>
                <li>
                    <a href="#"><img src="/creative_template/images/widget/insta4.jpg" alt="image" /></a>
                </li>
                <li>
                    <a href="#"><img src="/creative_template/images/widget/insta5.jpg" alt="image" /></a>
                </li>
                <li>
                    <a href="#"><img src="/creative_template/images/widget/insta6.jpg" alt="image" /></a>
                </li>
                <li>
                    <a href="#"><img src="/creative_template/images/widget/insta7.jpg" alt="image" /></a>
                </li>
                <li>
                    <a href="#"><img src="/creative_template/images/widget/insta8.jpg" alt="image" /></a>
                </li>
                <li>
                    <a href="#"><img src="/creative_template/images/widget/insta9.jpg" alt="image" /></a>
                </li>
            </ul>
        </div>
    </div> -->
    <div class="widget w-insta">
        <h4 class="widget-title">En Son Makaleler</h4>
        <div class="widget-box">

            @foreach($posts as $post)
            <div class="side-letest">
                <div class="sidelist-img">
                    <a href="/{{$post->type()}}/show/{{$post->id}}"><img src="{{$post->image_url}}" alt="image"></a>
                </div>
                <div class="sidelist-info">
                    <h4><a href="/{{$post->type()}}/show/{{$post->id}}">{{$post->title}}</a></h4>
                    <span class="post-date">{{$post->created_at->toFormattedDateString()}}</span>
                </div>
            </div>
            @endforeach
         
        </div>
    </div>

    <div class="widget w-tags">
        <h4 class="widget-title">Kategoriler</h4>
        <div class="widget-box">
            <ul class="srch_catagory">
                @foreach($categories as $category)
                <li><a href="/collection/categories/{{$category->url}}">{{$category->title}}<span class="post_count">{{App\Collection::category_count($category->id)}}</span></a></li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="widget w-tags">
        <h4 class="widget-title">Etiketler</h4>
        <div class="widget-box">
            <ul class="srchtags">
                @foreach($tags as $tag)
                <li><a href="/collection/tags/{{$tag->url}}">{{$tag->name}}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
   <!--  <div class="widget w-newleter">
        <h4 class="widget-title">Newsletter</h4>
        <div class="widget-box">
            <div class="subscribe-form">
                <div class="input-holder">
                    <input name="EMAIL" placeholder="Your email address" required="" type="email">
                </div>
                <div class="btn-holder">
                    <input value="Subscribe" type="submit">
                </div>
            </div>
        </div>
    </div> -->

    <div class="widget ads-widget">
        <div class="widget-box">
            {!!$hp->video_link!!}
        </div>
    </div>

</div>