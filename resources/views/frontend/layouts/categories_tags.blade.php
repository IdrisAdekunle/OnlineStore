<div class="col-md-3">
    <!-- *** BLOG MENU ***
_________________________________________________________ -->
    <div class="panel panel-default sidebar-menu">

        <div class="panel-heading">
            <h3 class="panel-title">Categories</h3>
        </div>

        <div class="panel-body">

            <ul class="nav nav-pills nav-stacked">
                @foreach($categories as $category)
                    <li>
                        <a href="{{route('category_posts',$category->name)}}">{{$category->name}}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="panel panel-default sidebar-menu">

        <div class="panel-heading">
            <h3 class="panel-title">Tags</h3>
        </div>

        <div class="panel-body">

            <ul class="nav nav-pills nav-stacked">
                @foreach($tags as $tag)
                    <li><a href="{{route('tag_posts',$tag->name)}}">{{$tag->name}}</a></li>
                @endforeach
            </ul>
        </div>

    </div>
