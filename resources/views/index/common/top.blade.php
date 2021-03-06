<!doctype html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="en" />
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#4188c9">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <title>@yield('title',$sys_info->web_title) - {{ $sys_info->web_desc }}</title>
    <meta name="description" content="{{ $sys_info->web_desc }}">
    <link rel="icon" href="{{asset('static/index')}}/favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('static/index')}}/favicon.ico" />
    <link rel="stylesheet" href="https://cdn.staticfile.org/font-awesome/4.6.2/css/font-awesome.min.css">
    <script src="{{asset('static/index')}}/assets/js/require.min.js"></script>
    <script>
      requirejs.config({
          baseUrl: "{{asset('static/index')}}"
      });
    </script>
    <!--Site css-->
    <link href="{{asset('static/index')}}/assets/css/site.css" rel="stylesheet" />
    <!-- Dashboard Core -->
    <link href="{{asset('static/index')}}/assets/css/dashboard.css" rel="stylesheet" />
    <script src="{{asset('static/index')}}/assets/js/dashboard.js"></script>
  </head>
  <body class="">
    <div class="page">
      <div class="flex-fill">
        <div class="header py-4">
          <div class="container">
            <div class="d-flex">
              <div class="header-brand">
               <a href="{{ url('/') }}">
                 <img src="{{asset('uploads')}}/{{ $sys_info->web_logo }}" class="header-brand-img" alt="Logo">
                 @yield('title',$sys_info->web_title)
               </a>
              </div>
              <div class="flex-grow-1" id="search-form">
                <form action="http://www.baidu.com/s" method="get" target="_blank" id="form-action">
                    <div class="input-group col-lg-8 col-md-10 m-auto">
                        <div class="input-group-prepend">
                            <button type="button" id="current-search" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-paw"></i> 百度
                            </button>
                            <div class="dropdown-menu" x-placement="bottom-start">
                              <a class="dropdown-item" onclick="onSearch(1)"><i class="fa fa-paw"></i> 百度</a>
                              <a class="dropdown-item" onclick="onSearch(2)"><i class="fa fa fa-google"></i> 谷歌</a>
                              <a class="dropdown-item" onclick="onSearch(3)"><i class="fa fa-send"></i> 必应</a>
                              <a class="dropdown-item" onclick="onSearch(4)"><i class="fa fa fa-scribd"></i> 搜狗</a>
                              <a class="dropdown-item" onclick="onSearch(5)"><i class="fa fa-user-secret"></i> Dogedoge</a>
                            </div>
                        </div>
                        <input type="text" name="word" baiduSug="2" class="form-control" id="search-input" placeholder="搜索"/>
                        <span class="input-group-append">
                            <button class="btn btn-primary" type="submit">搜索</button>
                        </span>
                    </div>
                </form>
              </div>
              <div class="d-flex ml-auto">
                @if (Route::has('login'))
                    @auth
                    <div class="dropdown">
                        <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
                            <!-- 随机头像 -->
                            <span class="avatar" style="background-image: url({{ config('avatar.url')}}/{{ md5(Auth::user()->name) }}?size={{ config('avatar.size')}}&d={{ config('avatar.d')}})"></span>
                            <span class="ml-2 d-none d-lg-block">
                            <span class="text-default">{{ Auth::user()->name }}</span>
                            <small class="text-black d-block mt-1">欢迎使用 
                            </small>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <a class="dropdown-item" href="{{ url('/home') }}">
                              <i class="dropdown-icon fe fe-user"></i> 个人中心
                            </a>
                            <!-- <a class="dropdown-item" href="#">
                              <i class="dropdown-icon fe fe-settings"></i> 设置
                            </a> -->
                            <!-- <a class="dropdown-item" href="#">
                              <span class="float-right"><span class="badge badge-primary">6</span></span>
                              <i class="dropdown-icon fe fe-mail"></i> Inbox
                            </a> -->
                            <a class="dropdown-item" href="#">
                              <i class="dropdown-icon fe fe-send"></i> 我的消息
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">
                              <i class="dropdown-icon fe fe-help-circle"></i> 帮助中心
                            </a>
                            <a class="dropdown-item" href="{{ url('gout') }}">
                              <i class="dropdown-icon fe fe-log-out"></i> 退出登录
                            </a>
                        </div>
                    </div>
                    @else
                    <div class="dropdown">
                      <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
                        <!-- 随机头像 -->
                        <span class="avatar" style="background-image: url({{ config('avatar.url')}}/0?size=120&d=mp)"></span>
                        <span class="ml-2 d-none d-lg-block">
                          <span class="text-default">游客用户</span>
                          <small class="text-default d-block mt-1">欢迎使用</small>
                        </span>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                        <a class="dropdown-item" href="{{ route('login') }}">
                          <i class="dropdown-icon fe fe-user"></i> 登录
                        </a>
                        <a class="dropdown-item" href="{{ route('reg') }}">
                          <i class="dropdown-icon fe fe-send"></i> 注册
                        </a>
                      </div>
                    </div>
                    @endauth
                @endif
                <a href="#" class="header-toggler d-lg-none ml-3 ml-lg-0" data-toggle="collapse" data-target="#headerMenuCollapse">
                  <span class="header-toggler-icon"></span>
                </a>
              </div>
            </div>
          </div>
        </div>
        @include('index.common.menu')
        <div class="my-3 my-md-5">
            @yield('content')
        </div>
      </div>
      
      @include('index.common.footer')
    </div>
  </body>
</html>
