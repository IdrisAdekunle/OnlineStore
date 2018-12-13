<!-- Fade In Modal -->
<div class="modal fade" id="PostModal{{$post->slug}}" tabindex="-1" role="dialog" aria-labelledby="modal-fadein" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Trash Post</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
                <form method="post" action="{{route('post.destroy',$post->slug)}}" >

                    {{ method_field('DELETE') }}

                    {{csrf_field()}}

                    <br/>

                    <p style="margin-left:10%"> Are you sure you want to trash {{$post->title}} </p>
                    <br/>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-alt-success" onclick="form.submit()">
                            <i class="fa fa-check"></i> trash
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
