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
            <a href="{{ route('client.get.profile') }}" class="current-demo">Profile<i class="fa fa-server fa-lg" aria-hidden="true" style="margin-left: 5px"></i></a>
           {{--  <a href="{{ route('dealer.get.newClient') }}" class="current-demo">Client<i class="fa fa-user-plus fa-lg" aria-hidden="true" style="margin-left: 5px"></i></a>
            <a href="{{ route('dealer.get.encrypt') }}">Encrypt<i class="fa fa-key fa-lg fa-flip-horizontal" aria-hidden="true" style="margin-left: 5px"></i></a> --}}
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
        <div id="container_demo">
            <div id="wrapper">
            <div id="client">
                @if ($user->isVerified == 0)   
                    <div id="verify">
                        <form  action="{{ route('client.post.verifyKey', ['id' => $user->id]) }}" method="post" autocomplete="on"> 
                            {{ csrf_field() }}
                            {{ method_field('put') }}
                            {{ method_field('patch') }}
                            <h1> Key Verification </h1> 
                            <p style="display: none"> 
                                <label for="passwordsignup" class="youpasswd" > Key </label>
                                <select id="x" disabled="disabled">
                                    <option value="{{ $functionValues->x }}">{{ $functionValues->x }}</option>
                                </select>
                                <label for="passwordsignup" class="youpasswd" > Value </label>
                                <select id="fx" disabled="disabled">
                                    <option value="{{ $functionValues->fx }}">{{ $functionValues->fx }}</option>
                                </select> 
                            </p>
                            <p style="display: none"> 
                                <label for="passwordsignup" class="youpasswd" > Available Public Keys </label>
                                
                                @foreach($encryptedCoefficients as $encryptedCoefficient)
                                    
                                    <select id="Ea{{ $encryptedCoefficient->a }}" disabled="disabled">
                                        <option value="{{ $encryptedCoefficient->Ea }}">{{ $encryptedCoefficient->Ea }}
                                        </option>
                                    </select>

                                @endforeach
                            </p>
                            <p>
                                <strong>The Dealer has sent a new key.<br/>Please verify the key before proceeding.</strong>
                            </p>
                            <p class="signin button"> 
                                <input type="submit" value="Verify Key"/> 
                            </p>
                        </form>
                    </div>   
                @else
                    <div id="profile">
                        <form  action="{{ route('client.post.decryptKey') }}" method="post" autocomplete="on">
                            {{ csrf_field() }}
                            <h1> Reveal Secret Key </h1> 
                            <p> 
                                <label for="usernamesignup" class="uname">Select Three Random Points</label>

                                <select name="x0" class="drop" id="x0" required>
                                    <option value="">--</option>
                                    @foreach($maxClients as $maxClient)                                    
                                        <option value="{{ $maxClient->id }}">{{ $maxClient->x }}</option>
                                    @endforeach
                                </select>

                                
                                <select name="x1" class="drop" id="x1" required>
                                    <option value="">--</option>
                                    @foreach($maxClients as $maxClient)                                    
                                        <option value="{{ $maxClient->id }}">{{ $maxClient->x }}</option>
                                    @endforeach
                                </select>


                                <select name="x2" class="drop" id="x2" required>
                                    <option value="">--</option>
                                    @foreach($maxClients as $maxClient)                                   
                                        <option value="{{ $maxClient->id }}">{{ $maxClient->x }}</option>
                                    @endforeach
                                </select>

                            </p>
                            <p class="signin button"> 
                                <input type="submit" value="Generate Key"/> 
                            </p>
                        </form>
                    </div> 
                @endif
            </div>          
            </div>
        </div>  
    </section>
</div>
     
@endsection

@section('scripts')

<script type="text/javascript">
$(document).ready(function() {    
    $(".drop").change(function(){
        var selVal=[];
        $(".drop").each(function(){
            selVal.push(this.value);
        });
       
        $(this).siblings(".drop").find("option").removeAttr("disabled").filter(function(){
           var a=$(this).parent("select").val();
           return (($.inArray(this.value, selVal) > -1) && (this.value!=a))
        }).attr("disabled","disabled");
    });
    $(".drop").eq(0).trigger('change');
});
</script>

@endsection