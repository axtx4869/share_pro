@extends('layouts.app')

@section('title', $user->name . 'のフォロワー')

@section('content')
    @include('nav')
    <section class="note-bg h-screen py-32">
        <div class="container m-auto">
            @include('users.user')
            @foreach($followers as $person)
                @include('users.person')
            @endforeach
        </div>
    </section>
@endsection