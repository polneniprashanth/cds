@extends('layouts.master')
<link rel="stylesheet" href="css\index.css">
@section('content')
    <div>
        <h2 class="text-center text-3xl font-extrabold text-gray-900">Create Email Configuration</h2>
    </div>
    <form class="mt-8 space-y-6" action="{{ route('savesettings') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-25">
                <label for="driver">SMTP driver</label>
            </div>
            <div class="col-75">
                <input type="text" id="driver" name="driver">
            </div>
        </div>

        <div class="row">
            <div class="col-25">
                <label for="host-name">Host Name</label>
            </div>
            <div class="col-75">
                <input type="text" id="host-name" name="hostName">
            </div>
        </div>

        <div class="row">
            <div class="col-25">
                <label for="port">Port</label>
            </div>
            <div class="col-75">
                <input type="text" id="port" name="port">
            </div>
        </div>

        
        <div class="row">
            <div class="col-25">
                <label for="encryption">Encryption</label>
            </div>
            <div class="col-75">
                <input type="text" id="encryption" name="encryption">
            </div>
        </div>

        <div class="row">
            <div class="col-25">
                <label for="userName">User Name</label>
            </div>
            <div class="col-75">
                <input type="text" id="userName" name="userName">
            </div>
        </div>

        <div class="row">
            <div class="col-25">
                <label for="password">Password</label>
            </div>
            <div class="col-75">
                <input type="text" id="password" name="password">
            </div>
        </div>

        <div class="row">
            <div class="col-25">
                <label for="senderName">Semder Name</label>
            </div>
            <div class="col-75">
                <input type="text" id="senderName" name="senderName">
            </div>
        </div>

        <div class="row">
            <div class="col-25">
                <label for="senderEmail">Sender Email</label>
            </div>
            <div class="col-75">
                <input type="text" id="senderEmail" name="senderEmail">
            </div>
        </div>
        <div class="" style="padding-top: 20px; margin-left: 620px;">
            <input type="submit" value="Submit">
        </div>
        
    </form>
@endsection