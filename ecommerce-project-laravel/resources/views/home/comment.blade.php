<div class="btn-box" onclick="toggleComments()">Comment Section</div>
    <div class="comment-section">
        <h2>Comments</h2>
         @foreach($comment as $comments)
        <div class="comment-box">
            <img src="user1.jpg" alt="User Profile" class="user-img">
            <div class="comment-content">
                <h4>{{$comments->name}}<span>• {{$comments->created_at}}</span></h4>
                <p>{{$comments->comment}}</p>
                <button class="reply-btn" onclick="reply(this)">Reply</button>
            </div>
        </div>
        @endforeach
    <form action="{{url('add_comment')}}" method="POST">
        @csrf
    <div class="comment-input">
        <img src="user-placeholder.jpg" alt="User Profile" class="user-img">
        <textarea placeholder="Write a comment..." name="comment"></textarea>
        <button href=""  class="submit-btn">Comment</button>
    </div>
    </form>
</div>
