<div class="container">
    <div class="row">
        <div class="col-12">
            Super Admin <br>
            <a href="{{ route('logout') }}">Logout</a>
        </div>
        <div class="col-12">
            {{ auth()->user() }}
        </div>
    </div>
</div>
