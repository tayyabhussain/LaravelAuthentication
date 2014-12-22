<nav class="pure-menu pure-menu-open pure-menu-horizontal">
    <ul>
        <li>
            <a href="{{URL::route('home')}}" >Home</a>  
        </li>
        @if(Auth::check())
        <li>
            <a href="{{URL::route('account-show-profile')}}" >Show Profile</a>  
        </li>
        <li>
            <a href="{{URL::route('account-sign-out')}}" >Sign Out</a>  
        </li>
        @else
        <li>
            <a href="{{URL::route('account-sign-in')}}" >Sign In</a>  
        </li>
        <li>
            <a href="{{URL::route('account-create')}}" >Register</a>  
        </li>
        @endif
    </ul>
</nav>