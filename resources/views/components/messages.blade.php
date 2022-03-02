<div>
    @if (Session::has('message'))
    <span class="text-success text-center">{{ Session::get('message') }}</span>
    @elseif(Session::has('error'))
    <span class="text-danger text-center">{{ Session::get('error') }}</span>
    @endif
</div>
