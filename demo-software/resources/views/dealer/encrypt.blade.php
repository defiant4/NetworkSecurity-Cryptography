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
            <a href="{{ route('dealer.get.newClient') }}">Client<i class="fa fa-user-plus fa-lg" aria-hidden="true" style="margin-left: 5px"></i></a>
            <a href="{{ route('dealer.get.encrypt') }}" class="current-demo">Encrypt<i class="fa fa-key fa-lg fa-flip-horizontal" aria-hidden="true" style="margin-left: 5px"></i></a>
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
            <div id="wrapper">
                <div id="encrypt">
                <form  action="{{ route('dealer.post.encryptKey') }}" method="post" autocomplete="on"> 
                        {{ csrf_field() }}               
                        {{-- {{ method_field('put') }}
                        {{ method_field('patch') }} --}}
                        <h1> Encrypt Key </h1> 
                        <input id="max" type="hidden" data-id="{{ $maxid }}">
                        <p> 
                            <label for="passwordsignup" class="youpasswd">Your Secret Key : </label>
                            <select id="a0" name="a0">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option selected="selected" value="4">4</option>
                            </select> 
                        </p>
                        <p> 
                            <label for="passwordsignup" class="youpasswd" >Parameter used for Keys :  </label>
                            <select id="a1" name="a1">
                                <option value="5">5</option>
                                <option value="6">6</option>
                            </select>
                            <select id="a2" name="a2">
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                            </select> 
                        </p>
                        <p> 
                            <label for="passwordsignup" class="youpasswd">Parameter used for Keys : </label>
                            <select id="g" name="g">
                                <option selected="selected" value="5">5</option>
                            </select> 
                            <select id="x" name="x">
                                <option value="11">11</option>
                                <option value="13">13</option>
                                <option selected="selected" value="17">17</option>
                            </select> 
                        </p>
                        <p class="signin button"> 
                            <input id="btn_encrypt" type="submit" value="Encrypt Key"/> 
                        </p>
                    </form>
                </div>             
            </div>
        </div>  
    </section>
</div>

     
@endsection
