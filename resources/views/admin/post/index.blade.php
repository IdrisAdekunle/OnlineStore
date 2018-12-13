@extends('admin.layouts.app')

@section('content')

    <div class="bg-image" style="background-image: url({{ URL::asset('/backend/img/photos/photo26@2x.jpg') }}) ">
        <div class="bg-black-op-75">
            <div class="content content-top content-full text-center">
                <div class="py-20">
                    <h1 class="h2 font-w700 text-white mb-10">Posts</h1>
                    <h2 class="h4 font-w400 text-white-op mb-0">All posts here!</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Breadcrumb -->
    <div class="bg-body-light border-b">
        <div class="content py-5 text-center">
            <nav class="breadcrumb bg-body-light mb-0">
                <a class="breadcrumb-item" href="">Blog</a>
                <span class="breadcrumb-item active">Posts</span>
            </nav>
        </div>
    </div>
    <!-- END Breadcrumb -->

    <div class="content">
        @include('admin.layouts.success')

        @include('admin.layouts.error')

        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">Posts</h3>
                <div class="block-options">
                   <a href="{{url('/admin/post/create')}}"><button type="button" class="btn-block-option">
                        <i class="fa fa-plus"></i> New Post
                    </button>
                   </a>
                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"></button>
                </div>
            </div>
            <div class="block-content">
                <!-- Topics -->
                <table class="table table-striped table-borderless table-vcenter">
                    <thead class="thead-light">
                    <tr>
                        <th colspan="2">Title</th>
                        <th class="d-none d-md-table-cell text-center" style="width: 100px;">Status</th>
                        <th class="d-none d-md-table-cell" style="width: 200px;">Posted by</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($posts as $post)
                    <tr>
                        <td class="text-center" style="width: 65px;">

                            <a data-toggle="modal" data-target="#PostModal{{$post->slug}}" >    <i class="si si-pin fa-2x"></i>  </a>

                        </td>
                        <td>
                            <a class="font-w600" href="{{route('post.edit',$post->slug)}}">{{$post->title}}</a>
                            <div class="font-size-sm text-muted mt-5">
                                {!! substr(strip_tags($post->description),0,250) !!}{!! strlen(strip_tags($post->description)) > 250 ? '...' : "" !!}
                            </div>
                        </td>

                        <td class="d-none d-md-table-cell text-center">
                            @if($post->status == 0)
                                <span class="badge badge-danger">Not Published</span>
                            @else
                                <span class="badge badge-success">Published</span>
                            @endif
                        </td>

                        <td class="d-none d-md-table-cell">
                            <span class="font-size-sm">by <a href="">{{$post->admin->name}}</a><br>on <em>{{$post->created_at->toFormattedDateString()}}</em></span>
                        </td>
                    </tr>
                        @include('admin.post.delete')

                        @endforeach
                    </tbody>


                </table>
                <!-- END Topics -->

                <!-- Pagination -->
                <nav aria-label="Orders navigation">
                    <ul class="pagination justify-content-end">
                        {{$posts->links()}}
                    </ul>
                </nav>
                <!-- END Pagination -->
            </div>
        </div>
    </div>






@endsection
