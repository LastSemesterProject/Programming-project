<ul>
    <div>
        <li><a href="index.html">SALES MATCHMAKER</a></li>
    </div>

    <li><a href="about.html">About</a></li>
    <li><a href="FAQs.html">FAQs</a></li>
    <li><a href="contact.html">Contact</a></li>

    <div class="floatRightside";>

        <?php
            if(Auth::check()){?>
            <li><a href="{{url('dashboard')}}">Dashboard</a></li>

        <?php    }
        ?>

        {{--<li><a href="{{url('dashboard')}}" data-login-status="{{ Auth::check() }}">Dashboard</a></li>--}}
        <li><a href="{{Auth::check() ? url('auth/logout') : url('auth/login')}}"> {{Auth::check() ? 'Logout' : 'Login'}}</a></li>
        <li><a href="{{url('auth/register')}}">Sign Up</a></li>
    </div>

</ul>
