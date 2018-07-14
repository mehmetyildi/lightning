        
<div class="col-md-3  left_col menu_fixed">
  <div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;">
      <a href="/admin" class="site_title"><i class="fa fa-bolt"></i> <span>Lt Lightning</span></a>
    </div>

    <div class="clearfix"></div>

    <!-- menu profile quick info -->
    <div class="profile clearfix">
              <!-- <div class="profile_pic">
                <img src="/gentelella-master/production/images/img.jpg" alt="..." class="img-circle profile_img">
              </div> -->
              <div class="profile_info">
                
               @guest
               @else
               <span>Hoşgeldiniz,</span>
               <h2>{{ Auth::user()->name }}</h2>
               @endguest
             </div>
           </div>
           <!-- /menu profile quick info -->

           <br />

           <!-- sidebar menu -->
           <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <h3>General</h3>
              <ul class="nav side-menu">
                <li><a><i class="fa fa-book"></i> Makaleler <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="/post/index"><i class="fa fa-pencil"></i>Blog Makaleleri</a></li>

                    <li><a href="/video/index"><i class="fa fa-youtube"></i>Videolar</a></li>
                    <li><a href="/activity/index"><i class="fa fa-star"></i>Etkinlikler</a></li>
                    <li><a href="/book/index"><i class="fa fa-book"></i>Kitap Tanıtımları</a></li>
                  </ul>
                </li>
                @if(auth()->user()->hasRole('superadmin'))
                <li><a href="/collection/index"><i class="fa fa-check-circle"></i>Onay Bekleyen Makale&nbsp<span class="badge bg-green">{{$collection}}</span></a></li>
                <li><a href="/user_post/unapproved"><i class="fa fa-check-circle"></i>Onay Bekleyen Yorum&nbsp<span class="badge bg-green">{{$user_post}}</span></a></li>
                <li><a href="/comments/inapropriate/index"><i class="fa fa-times-circle"></i>Uygunsuz İçerik&nbsp<span class="badge bg-red">{{$comments}}</span></a></li>
                <li><a href="/user/index"><i class="fa fa-user"></i> Kullanıcı İşlemleri</a></li>

                @else
                <li><a href="/collection/pending/{{auth()->user()->id}}/index"><i class="fa fa-calendar"></i>Onay bekleyenler&nbsp<span class="badge bg-green">{{$collection_user}}</span></a></li>
                <li><a href="/collection/revise/{{auth()->user()->id}}/index"><i class="fa fa-eye"></i>Revize bekleyenler&nbsp<span class="badge bg-green">{{$collection_user_revise}}</span></a></li>
                @endif
                
                <li><a href="/tags/create"><i class="fa fa-tag"></i> Etiket Yarat </a>

                </li>
                <li><a href="/category/create"><i class="fa fa-list-ul"></i> Kategori ekle </a>
                 @if(auth()->user()->hasRole('superadmin'))
               </li>
               <li><a href="/homepage/edit/1"><i class="fa fa-home"></i> Site Anasayfa Düzenle </span></a>

               </li>
               <li><a href="/about/edit/1"><i class="fa fa-clone"></i>Site Hakkımızda Düzenle </a>

               </li>
               @endif
             </ul>
           </div>


         </div>
         <!-- /sidebar menu -->

         <!-- /menu footer buttons -->

         <!-- /menu footer buttons -->
       </div>
     </div>