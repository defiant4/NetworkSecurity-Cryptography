@extends('layouts.app')

@section('head')

<!-- Tells Browser Not to cache this page -->
<meta http-equiv="cache-control" content="private, max-age=0, no-cache">
<meta http-equiv="pragma" content="no-cache">
<meta http-equiv="expires" content="0">

@endsection

@section('content')

<div class="container">
    <header>
        <h1>Network Security <span>and Cryptography</span></h1>
		<nav class="codrops-demos">
			<span style="color: #7cbcd6;">
                <strong>Welcome Back, 
                    <span style="color: #0c5978;">
                        {{ Auth::user()->name }}
                    </span>
                </strong>
            </span>
            <a href="{{ route('dealer.get.dashboard') }}">Dashboard<i class="fa fa-server fa-lg" aria-hidden="true" style="margin-left: 5px"></i></a>
            <a href="{{ route('dealer.get.newClient') }}" class="current-demo">Client<i class="fa fa-user-plus fa-lg" aria-hidden="true" style="margin-left: 5px"></i></a>
            <a href="{{ route('dealer.get.encrypt') }}">Encrypt<i class="fa fa-key fa-lg fa-flip-horizontal" aria-hidden="true" style="margin-left: 5px"></i></a>
            <a href="{{ route('app.post.logout') }}" 
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Sign Out<i class="fa fa-sign-out fa-lg" aria-hidden="true" style="margin-left: 5px"></i>
            </a>
            <form id="logout-form" action="{{ route('app.post.logout') }}" method="POST" 
                style="display: none;">
                {{ csrf_field() }}
            </form>
		</nav>
    </header>
    <section>				
        <div id="container_demo" >
            <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
            
            <div id="wrapper">
                <div id="newclient">
                    <form  action="{{ route('dealer.post.addClient') }}" method="post" autocomplete="on"> 
                        {{ csrf_field() }}
                        <h1> Add New Client </h1> 
                        <p> 
                            <label for="usernamesignup" class="uname" data-icon="u">Your Name</label>
                            <input id="usernamesignup" name="name" required="required" type="text" placeholder="eg. my secure name" />
                        </p>
                        <p> 
                            <label for="emailsignup" class="youmail" data-icon="e" > Your Email</label>
                            <input id="emailsignup" name="email" required="required" type="email" placeholder="eg. mysecuremail@mail.com"/> 
                        </p>
                        <p> 
                            <label for="passwordsignup" class="youpasswd" data-icon="p">Your Password </label>
                            <input id="passwordsignup" name="password" required="required" type="password" placeholder="eg. X8df!90EO"/>
                        </p>
                        <p> 
                            <label for="passwordsignup_confirm" class="youpasswd" data-icon="p">Please Confirm Your Password </label>
                            <input id="passwordsignup_confirm" name="cnf_password" required="required" type="password" placeholder="eg. X8df!90EO"/>
                        </p>
                        <p class="signin button"> 
                            <input type="submit" value="Register"/> 
                        </p>
                    </form>
                </div>             
            </div>
        </div>  
    </section>
</div>
     
@endsection