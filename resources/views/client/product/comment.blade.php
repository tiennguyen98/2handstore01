<div class="comment-section mt-3">
    <h2 class="text-primary">
        @lang('client.product.comment') ({{ count($product->commentUsers) }})
    </h2>
    <div class="comments">
        @foreach($comments as $comment)
            <div class="comment">
                <div class="avatar"><img alt="avatar" src="{{ $comment->user->getAvatar() }}"></div>
                <div class="comment-content">
                    <div class="commnet-owner">
                        <a href="javascript:void(0)">{{ $comment->user->name }}</a>
                    </div>
                    <p>{{ $comment->content }}</p>
                </div>
                <a href="javascript:void(0)" class="reply" data-id="{{ $comment->id }}" onclick="reply(this)">
                    <i class="fas fa-reply"></i>
                    @lang('client.product.reply')
                </a>
                @if($comment->loggedOwner())
                <div class="dropdown">
                    <a  href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" onclick="deleteComment('{{ route('client.destroy_comment', ['id' => $comment->id]) }}', {{ $product->id }})">
                            {{ __('Delete') }}
                        </a>
                    </div>
                </div>
                @endif
            </div>
            @foreach ($comment->comments as $reply)
            <div class="comment reply-comment">
                <div class="avatar">
                    <img alt="avatar" src="{{ $comment->user->getAvatar() }}">
                </div>
                <div class="comment-content">
                    <div class="commnet-owner">
                        <a href="javascript:void(0)">{{ $reply->user->name }}</a>
                    </div>
                    <p>{{ $reply->content }}</p>
                </div>
                <a href="javascript:void(0)" class="reply" data-id="{{ $comment->id }}" onclick="reply(this)">
                    <i class="fas fa-reply"></i>
                    @lang('client.product.reply')
                </a>
                @if($reply->loggedOwner())
                <div class="dropdown">
                    <a  href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" onclick="deleteComment('{{ route('client.destroy_comment', ['id' => $reply->id]) }}', {{ $product->id }})">
                            {{ __('Delete') }}
                        </a>
                    </div>
                </div>
                @endif
            </div>                
            @endforeach
        @endforeach
    </div>
</div>
<div id="comment-editor" hidden="hidden">
    <div class="form-group">
        <textarea name="content" class="form-control" rows="5" placeholder="@lang('client.product.comment')" required></textarea>
        <input type="hidden" name="parent_id" id="parent_id" value="">
        <button class="btn btn-primary mt-2" onclick="comment('{{ route('client.products.comment', ['id' => $product->id]) }}', this)">
            @lang('client.product.comment')
        </button>
    </div>
</div>
