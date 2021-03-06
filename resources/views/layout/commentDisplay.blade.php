@foreach($comments as $comment)
<div class="comment-widgets">
    <!-- Comment Row -->
    <div class="d-flex flex-row comment-row p-3 mt-0" 
    id="@if($comment->comment_parent_id "commentReport" != null)"  @endif>
        <div class="p-2"><img src="{{ asset('images/users/varun.jpg') }}" alt="user" width="50" class="rounded-circle"></div>
        <div class="comment-text ps-2 ps-md-3 w-100">
            <h5 class="font-medium">{{ $comment->user->name }}</h5>
            <span class="mb-3 d-block">{{ $comment->content }}</span>
            <div class="text-muted fs-2 ms-auto mt-2 mt-md-0">{{ $comment->created_at }}</div>
                <form method="post" action="{{ route('comments.store') }}">
                    @csrf
                    <div class="form-group">
                        <input type=text name="content" class="form-control" />
                        <input type=hidden name="report_id" value="{{ $report_id }}" />
                        <input type=hidden name="comment_parent_id" value="{{ $comment->id }}" />
                    </div>
                    <div class="form-group">
                        <input type=submit class="btn btn-warning" value="Reply" />
                    </div>
                </form>
            </div>
    </div>
    @include('layout.commentDisplay', ['comments' => $comment->replies])
</div>     
@endforeach
