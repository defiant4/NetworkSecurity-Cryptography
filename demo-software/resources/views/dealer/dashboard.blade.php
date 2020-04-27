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
            <a href="{{ route('dealer.get.dashboard') }}" class="current-demo">Dashboard<i class="fa fa-server fa-lg" aria-hidden="true" style="margin-left: 5px"></i></a>
            <a href="{{ route('dealer.get.newClient') }}">Client<i class="fa fa-user-plus fa-lg" aria-hidden="true" style="margin-left: 5px"></i></a>
            <a href="{{ route('dealer.get.encrypt') }}">Encrypt<i class="fa fa-key fa-lg fa-flip-horizontal" aria-hidden="true" style="margin-left: 5px"></i></a>
            {{-- <a href="{{ route('app.post.logout') }}">Sign Out<i class="fa fa-sign-out fa-lg" aria-hidden="true" style="margin-left: 5px"></i></a> --}}
            {{-- <a href="{{ route('app.post.logout') }}">Sign Out<i class="fa fa-sign-out fa-lg" aria-hidden="true" style="margin-left: 5px"></i></a> --}}

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
                <div id="dashboard" >
                    <h1>Dealer Dashboard</h1> 
                    <p style="text-align: center;">
                        <strong style="font-size: 20px">Client Details</strong>
                    </p>

                    <table>
                        <thead>
                            <tr>
                                <th style="margin-left: 2px"><i><b>Name</b></i></th>
                                <th style="margin-left: 2px"><i><b>Email</b></i></th>
                                <th style="margin-left: 1px"><i><b>isValid Key</b></i></th>
                                <th style="margin-left: 2px"><i><b>Actions</b></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->isVerified }}</td>
                                    <td>
                                        <form method='post' action="{{ route('dealer.delete.deleteClient', ['id' => $user->id]) }}"  style="float: left; margin-right: 5px;">
                                            {{ csrf_field() }}
                                            {{ method_field('delete') }}
                                            <button type="submit" class="btn btn-danger btn-xs" style="margin-left: 5px">
                                                <i class="fa fa-trash fa-lg" aria-hidden="true"></i>
                                                 Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                           @endforeach
                        </tbody>
                    </table>
                    
                </div>                				
            </div>
        </div>  
    </section>
</div>
     
@endsection