<div class="modal fade" id="PublishModal{{$category->name}}" tabindex="-1" role="dialog" aria-labelledby="modal-fadein" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Publish Category</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
            </div>
                <form method="POST" action="{{route('publish',$category->name)}}" >

                    {{ method_field('PUT') }}

                    {{csrf_field()}}



                <br/>
                    <p style="margin-left:10%"> Are you sure you want to publish {{$category->name}} </p>

                    <input class="hidden" name="status" value="1">


<br/>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-alt-success" onclick="form.submit()">
                            <i class="fa fa-check"></i> Publish
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>








