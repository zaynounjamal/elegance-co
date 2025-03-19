<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="fashion, elegance, style" />
    <meta name="description" content="Elegance & Co - Your go-to fashion store" />
    <meta name="author" content="Elegance & Co" />
    <link rel="shortcut icon" href="home/images/favicon.jpeg" type="image/jpeg">

    <title>Elegance&Co</title>
    <link rel="icon" href="home/images/logo-removebg-preview.png" type="image/png">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
    <!-- Font Awesome -->
    <link href="home/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom Styles -->
    <link href="home/css/style.css" rel="stylesheet" />
    <!-- Responsive Styles -->
    <link href="home/css/responsive.css" rel="stylesheet" />
</head>

<body>

    <div class="hero_area">
        @include('home.header')
        @include('home.product_view')
        <!-- Comment and Reply System -->
        <div class="toggle-header" style="margin-bottom: 20px; cursor: pointer;" onclick="toggleComments()">Comment
            Section
        </div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{ session()->get('message') }}
            </div>
        @endif
        @include('sweetalert::alert')
        <div class="comment-section" style="display: none;">
            <h2>Comments</h2>
            @if (isset($comments) && $comments->isNotEmpty())
                @foreach ($comments as $comment)
                    <div class="comment-box">
                        <img src="user1.jpg" alt="User Profile" class="user-img">
                        <div class="comment-content">
                            <h4>{{ $comment->name }} <span>• {{ $comment->created_at }}</span></h4>
                            <p>{{ $comment->comment }}</p>
                            <button class="reply-btn" onclick="reply(this)"
                                data-CommentId="{{ $comment->id }}">Reply</button>
                            <button class="close-reply-btn" onclick="reply_close(this)"
                                style="display: none;">Close</button>

                            <!-- Reply Box -->
                            <div class="reply-box" style="display: none;">
                                <form action="{{ url('add_reply') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="commentId">
                                    <textarea placeholder="Write a reply..." name="reply" required></textarea>
                                    <input type="submit" value="Reply" class="btn btn-primary">
                                </form>
                            </div>

                            <!-- Display Replies -->
                            <div style="padding-left:3%; padding-bottom:10px;">
                                @if (isset($reply) && $reply->isNotEmpty())
                                    @foreach ($reply as $replies)
                                        @if ($replies->comment_id == $comment->id)
                                            <div class="reply-comment-box">
                                                <img src="user2.jpg" alt="User Profile" class="user-img">
                                                <div class="reply-comment-content">
                                                    <h4>{{ $replies->name }} <span>• {{ $replies->created_at }}</span>
                                                    </h4>
                                                    <p>{{ $replies->reply }}</p>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p>No comments available.</p>
            @endif

            <!-- Comment Form -->
            <form action="{{ url('add_comment') }}" method="POST">
                @csrf
                <div class="comment-input">
                    <img src="user-placeholder.jpg" alt="User Profile" class="user-img">
                    <textarea placeholder="Write a comment..." name="comment" required></textarea>
                    <input type="submit" value="Comment" class="btn btn-primary">
                </div>
            </form>
        </div>
        @include('home.footer')

        <div class="cpy_">
            <p class="mx-auto">© 2025 All Rights Reserved By <a style="color: red">ELEGANCE & CO</a></p>
        </div>

        <!-- jQuery -->
        <script src="home/js/jquery-3.4.1.min.js"></script>
        <!-- Bootstrap JS -->
        <script src="home/js/popper.min.js"></script>
        <script src="home/js/bootstrap.js"></script>
        <!-- Custom JS -->
        <script src="home/js/custom.js"></script>

        <script>
            function toggleComments() {
                $(".comment-section").slideToggle();
            }

            function reply(caller) {
                let commentBox = $(caller).closest(".comment-box");
                let replyBox = commentBox.find(".reply-box");
                let closeBtn = commentBox.find(".close-reply-btn");
                let commentId = $(caller).attr("data-CommentId");

                // Assign the comment ID to the hidden input inside reply form
                replyBox.find("input[name='commentId']").val(commentId);

                // Hide all other reply boxes before showing the selected one
                $(".reply-box").not(replyBox).slideUp();
                $(".close-reply-btn").not(closeBtn).hide();

                // Toggle reply box visibility
                replyBox.slideToggle();
                closeBtn.show();
            }

            function reply_close(caller) {
                let commentBox = $(caller).closest(".comment-box");
                let replyBox = commentBox.find(".reply-box");

                replyBox.slideUp();
                $(caller).hide();
            }
        </script>
        <script>
            document.addEventListener("DOMContentLoaded", function(event) {
                var scrollpos = localStorage.getItem('scrollpos');
                if (scrollpos) window.scrollTo(0, scrollpos);
            });

            window.onbeforeunload = function(e) {
                localStorage.setItem('scrollpos', window.scrollY);
            };
        </script>
        <script>
            document.querySelectorAll('.quantity-btn').forEach(button => {
                button.addEventListener('click', function() {
                    let input = this.parentNode.querySelector('.cart-quantity');
                    let value = parseInt(input.value);
                    if (this.classList.contains('plus')) {
                        input.value = value + 1;
                    } else if (this.classList.contains('minus') && value > 1) {
                        input.value = value - 1;
                    }
                });
            });
        </script>

</body>

</html>
