@extends('layout')
@section('main-content')
    <!--Hero Section-->
    <div class="hero-section hero-background style-02">
        <h1 class="page-title">Bonsai Store</h1>
        <nav class="biolife-nav">
            <ul>
            </ul>
        </nav>
    </div>

    <!-- Page Contain -->
    <div class="page-contain blog-page left-sidebar">
        <div class="container">
            <div class="row">

                <!-- Main content -->
                <div id="main-content" class="main-content col-lg-9 col-md-8 col-sm-12 col-xs-12">
                
                    <ul class="posts-list main-post-list">
                    @foreach($blog_details as $key=>$content)
                        <li class="post-elem">
                            <div class="post-item style-wide">
                                <div class="thumbnail">
                                    <a href="#" class="link-to-post"><img src="{{URL::to('public/uploads/blog/'.$content->image)}}" width="870" height="635" alt=""></a>
                                </div>
                                <div class="post-content">
                                    <h4 class="post-name"><a href="#" class="linktopost">{{$content->name}}</a></h4>
                                    <p class="post-archive"><b class="post-cat">Cây cảnh và tự nhiên</b><span class="post-date"> / 20 Nov, 2018</span><span class="author">Posted By: Braum J.Teran</span></p>
                                    <p class="excerpt">{{$content->describe}}</p>
                                    <div class="group-buttons">
                                        <a href="#" class="btn readmore">read more</a>
                                        <a href="#" class="btn count-number liked"><i class="biolife-icon icon-heart-1"></i><span class="number">20</span></a>
                                        <a href="#" class="btn count-number commented"><i class="biolife-icon icon-conversation"></i><span class="number">06</span></a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                    </ul>

                    <div class="biolife-panigations-block ">
                        <ul class="panigation-contain">
                            <li><span class="current-page">1</span></li>
                            <li><a href="#" class="link-page">2</a></li>
                            <li><a href="#" class="link-page">3</a></li>
                            <li><span class="sep">....</span></li>
                            <li><a href="#" class="link-page">20</a></li>
                            <li><a href="#" class="link-page next"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>

                </div>

                <!-- Sidebar -->
                <aside id="sidebar" class="sidebar blog-sidebar col-lg-3 col-md-4 col-sm-12 col-xs-12">

                    <!--Sidebar head for mobile version-->
                    <div class="biolife-mobile-panels">
                        <span class="biolife-current-panel-title">Sidebar</span>
                        <a class="biolife-close-btn" href="#" data-object="open-mobile-filter">&times;</a>
                    </div>

                    <!--Sidebar Content-->
                    <div class="sidebar-contain">

                        <!--Posts Widget-->
                        <div class="widget posts-widget">
                            <h4 class="wgt-title">Tin gần đây</h4>
                            <div class="wgt-content">
                                <ul class="posts">
                                @foreach($blog_details as $key=>$content)
                                    <li>
                                        <div class="wgt-post-item">
                                            <div class="thumb">
                                                <a href="#"><img src="{{URL::to('public/uploads/blog/'.$content->image)}}" width="80" height="58" alt=""></a>
                                            </div>
                                            <div class="detail">
                                                <h4 class="post-name"><a href="#">{{$content->name}}</a></h4>
                                                <p class="post-archive">/ 22 Dec, 2022<span class="comment">15 Comments</span></p>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach

                                </ul>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
@endsection