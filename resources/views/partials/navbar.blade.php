@php($home = \Route::current()->getName() === 'home')

<nav class="navbar navbar-expand-lg {{ $home ? 'fixed-top' : '' }}  {{ $home ? 'navbar-transparent' : 'bg-primary' }}" {{ $home ? 'color-on-scroll=300' : '' }}>
    <div class="container">
        <div class="navbar-translate">
            <a class="navbar-brand" href="{{ route('home') }}">
                {{ config('app.name') }}
            </a>
            <!--
            <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
            </button>
            -->
        </div>
        <!--
        <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="nc-icon nc-single-02"></i>
                        <p>
                            Login
                        </p>
                    </a>
                </li>
            </ul>
        </div>
        -->
    </div>
</nav>
