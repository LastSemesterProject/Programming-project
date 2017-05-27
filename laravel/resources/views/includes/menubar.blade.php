<div>
    <?php
        $isAdmin = DB::table('users')
            ->select('is_admin')
            ->where('id', Auth::id())
            ->get();

    ?>

    <ul>
        <div class="website-title">
            <li><a href="{{url('/')}}">Finditure</a></li>
        </div>

        {{--<li><a href="about.html">About</a></li>--}}
        {{--<li><a href="FAQs.html">FAQs</a></li>--}}
        {{--<li><a href="contact.html">Contact</a></li>--}}

        <div class="floatRightside";>

            <?php
            if(Auth::check()){?>
            <?php if($isAdmin[0]->is_admin == 1){?>
                <li><a href="{{url('/user-list')}}">View Users</a></li>
                <?php } ?>
            <li><a href="{{$isAdmin[0]->is_admin == 1 ? url('/admin') : url('/profile')}}">Profile</a></li>
            <li><a href="{{url('dashboard')}}">Dashboard</a></li>

            <?php    }
            ?>

            {{--<li><a href="{{url('dashboard')}}" data-login-status="{{ Auth::check() }}">Dashboard</a></li>--}}
            <li><a href="{{Auth::check() ? url('auth/logout') : url('auth/login')}}"> {{Auth::check() ? 'Logout' : 'Login'}}</a></li>
            <li><a href="{{url('auth/register')}}">Sign Up</a></li>
        </div>

    </ul>


</div>
