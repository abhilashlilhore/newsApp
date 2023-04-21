<!DOCTYPE html>
<html lang="en">
<head>
  <title>NewsApp</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body style="height:100vh">

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <!-- <a class="navbar-brand {{ (request()->is('/'))?' active ':''; }}" href="{{url('/')}}">Home</a> -->
    </div>
    <ul class="nav navbar-nav">
      <li class="{{ (request()->is('/'))?' active ':''; }}"><a href="{{url('/')}}">Home</a></li>
      <li class="{{ (request()->is('news_list'))?' active ':''; }}"><a href="{{url('news_list')}}">All News</a></li>
      
    </ul>
  </div>
</nav>
  
<div class="container" >
  
