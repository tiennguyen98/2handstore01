<script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('bower_components/owl.carousel/dist/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/ajaxSetup.js') }}"></script>
@auth
    <channel class="d-none">{{ Auth::user()->id }}</channel>
    <script src="{{ asset('bower_components/pusher-js/dist/web/pusher.min.js') }}"></script>
    <script src="{{ asset('js/client/notifications.js') }}"></script>
    <script src="{{ asset('js/client/comment-push.js') }}"></script>
@endauth
