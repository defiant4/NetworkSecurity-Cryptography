@extends('layouts.app')

@section('content')

<div class="container">
    <header>
        <h1>Network Security <span>and Cryptography</span></h1>
		<nav class="codrops-demos">
			{{-- <span>Click <strong>"Join us"</strong> to be our Client or <strong>"Go and log in"</strong> if you are already a Client!</span> --}}
            
            {{-- <span>If you think <strong>technology</strong> can solve your <strong>security problems</strong>, then you don’t understand the <strong>problems</strong> and you don’t understand the <strong>technology</strong></span> --}}
            
            {{-- <a href="#tologin">Log in</a>
            <a href="#toregister">Sign up</a>
            <a href="#" class="current-demo">Dealer Dashboard</a> --}}
		</nav>
    </header>
    <section>				
        <div id="container_demo" >
            <div id="wrapper">
                <div id="login">
                    <form action="{{ route('app.post.login') }}" autocomplete="on" method="post">
                        {{csrf_field()}}
                        <h1>Log in</h1> 
                        <p> 
                            <label for="username" class="uname" data-icon="u" > Your Email </label>
                            <input id="name" name="email" required="required" type="text" placeholder="eg. mysecuremail@mail.com"/>
                        </p>
                        <p> 
                            <label for="password" class="youpasswd" data-icon="p"> Your Password </label>
                            <input id="password" name="password" required="required" type="password" placeholder="eg. X8df!90EO" /> 
                        </p>
                        <p class="login button"> 
                            <input type="submit" value="Login" /> 
						</p>
                    </form>
                </div>
            </div>
        </div>  
    </section>
</div>

@endsection