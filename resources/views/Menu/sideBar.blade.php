<nav id="sidebar">
    <div class="sidebar_blog_1">
        <div class="sidebar-header">
            <div class="logo_section">
                <a href="index.html"><img class="logo_icon img-responsive" src="{{url('images/layout_img/user_img.jpg')}}" alt="#" /></a>
            </div>
        </div>
        <div class="sidebar_user_info">
            <div class="icon_setting"></div>
            <div class="user_profle_side">
                <div class="user_img"><img class="img-responsive" src="{{url('images/layout_img/user_img.jpg')}}" alt="#" /></div>
                <div class="user_info">
                    <h6 style="color:#0a417b; font-style:italic"></h6>
                    <h6 style="color:#0a417b; font-style:italic">{{auth()->user()->name}}</h6>
                    <p><span class="online_animation"></span> Online</p>
                </div>
            </div>
        </div>
    </div>
    <div class="sidebar_blog_2">
        <h4>Menus</h4>
        <ul class="list-unstyled components">
            <li><a href="{{route('card.list')}}"><i class="fa fa-file-text-o green_color"></i> <span>List of business cards</span></a></li>
            <li><a href="{{route('card.Create')}}"><i class="fa fa-file-text-o green_color"></i> <span>Add new business cards</span></a></li>
        </ul>
    </div>
</nav>