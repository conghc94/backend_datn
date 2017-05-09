<div class="navbar-collapse menuGradient">
    <ul style="display: inline-block; float: none !important;" class="nav navbar-nav">
        <li>
            <a style="min-width: 50px;" href='{{URL::to("/")}}'>
            <img style="vertical-align: top;" src="{{asset('Images/Icons/Home.png')}}" /></a> <!-- alt="Khoaluan.vn - Thư viện tài liệu số trực tuyến"  -->
        </li>
        <li>
            <div class="b-header-3 hoverDiv" style="background: transparent;">
                <ul class="b-header-3__user b-header-3__main-menu-ul pull-right">
                    <li class="b-header-3__user-name"><a class="b-header-3__main-menu-a" href="{{URL::to('/')}}">Trang chủ</a></li>
                </ul>
            </div>
            <div class="spaceMenu"></div>
        </li>
        <li>
            <div class="b-header-3 hoverDiv" style="background: transparent;">
                <ul class="b-header-3__user b-header-3__main-menu-ul pull-right">
                    <li class="b-header-3__user-name">
                        <a class="b-header-3__main-menu-a" href='{{URL::to("/")}}'>Tài liệu</a>
                        <div class="b-header-3__hover-box" style="top: 28px;">
                            <ul class="b-header-3__user-dropdown arrow_top1" style="min-width: 390px; height: 266px; text-align: left;">
                                @foreach($categories as $category)
                                    <li class="b-header-3__user-dropdown__item" style="padding-left: 10px; width: 50%; float: left;"><a href="{{URL::to('/')}}/category/{{$category->id}}" style="border-bottom: 1px solid #eee; margin-bottom: 7px;" class="b-header-3__user-dropdown__link">{{$category->name}}</a></li>
                                @endforeach
                            </ul>
                       </div>
                    </li>
                </ul>
            </div>
            <div class="spaceMenu"></div>
        </li>
        <li>
            <div class="b-header-3 hoverDiv" style="background: transparent;">
                <ul class="b-header-3__user b-header-3__main-menu-ul pull-right">
                    <li class="b-header-3__user-name">
                        <a class="b-header-3__main-menu-a" href="#">Công cụ hổ trợ</a>
                    </li>
                </ul>
            </div>
            <div class="spaceMenu"></div>
        </li>
    </ul>
</div>

