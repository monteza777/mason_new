@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-10">
            <div class="panel panel-info">
                    <div class="panel-body">
                        <form class="form-group" action="{{action('PostController@store')}}" 
                        method="post" tabindex="-1" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <textarea rows="7" name="body" class="form-control" placeholder="What's on your Mind?" required></textarea>
                        <br>
                        <div class="col-md-3">
                         <input type="file" name="images" class="form-control" id="images"><br>
                         
                        </div>
                         <button type="submit"  class="btn btn-primary pull-left">Post</button>
                        <br>
                        </form>
                    </div>
                    
                </div>

            <div class="panel panel-primary">
                <div class="panel-heading">@lang('quickadmin.qa_say')</div>
                <div class="panel-body padding">
                @foreach($posts as $post)
                <div class="well">
                  <div class="media">
                    @if($post->images !== '')
                    <div class="col-lg-3 col-md-3 col-sm-3">
                      <img height="150px" width="150px" class="img-responsive"
                            src="/storage/post_images/{{$post->images}}" >
                    </div>
                    @endif
                    <div class="col-md-9">
                        <div class="media-body">
                            <h4 class="media-heading">{{$post->user->name}}</h4>
                            <p class="text-sm-left">Lodge: Pinaglabanan</p>
                            <p class="text-justify">{{substr($post->body,0,350)}}
                            @if(strlen($post->body) > 200)
                            ... <a href="#" ><i>Read More</i></a>
                            @endif
                            </p>
                            <ul class="list-inline list-unstyled">
                            <li><span><i class="glyphicon glyphicon-calendar"></i> 
                                {{$post->created_at->diffForHumans()}}
                            </span></li>
                            <li>|</li>
                            <span><i class="glyphicon glyphicon-comment"></i> 
                                <a href='#' class="comment">2 comments</a></span>
                            <li>|</li>
                            <li><span><a href='#' class="comment"><i class="glyphicon glyphicon-wrench"></a></i> 
                            </span></li>
                            <li>|</li>
                            <li><span><a href='#' class="comment"><i class="glyphicon glyphicon-trash"></a></i> 
                            </span></li>
                            <li>|</li>
                            <li>
                            <!-- Use Font Awesome http://fortawesome.github.io/Font-Awesome/ -->
                              <span><i class="fa fa-facebook-square"></i></span>
                              <span><i class="fa fa-twitter-square"></i></span>
                              <span><i class="fa fa-google-plus-square"></i></span>
                            </li>
                            </ul>
                        </div>
                    </div>
                    </div>
                </div>
                @endforeach
                </div>
            </div>

            </div>
        </div>
    </div>
@endsection
