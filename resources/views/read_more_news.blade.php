<x-header />



<div class="header">
  <h2>News Details</h2>
</div>

<?php

$time = get_time($collection['Published']);


?>
<div class="row">
  <div class="leftcolumn">
    <div class="card">
      <h2>{{$collection['Title']}}</h2>
      <b>Author:{{$collection['Author']}}</b><br>
      <b>Source:{{$collection['Source']}}</b><br>
      <small>{{ $time }}</small>
      <div class="fakeimg" style="height:500px;">
        @if($collection['urlToImage'])
        <img class="card-img-top" src="{{$collection['urlToImage']}}" alt="Card image" style="height:490px;width:100%;">
        @else
        <img class="card-img-top" src="{{url('download.jpg')}}" alt="Card image" style="height:490px;width:100%;">
        @endif
      </div>
      <p>{{$collection['Description']}}</p>
      <p>{{$collection['Content']}}</p>
      <a href="{{$collection['Url']}}" target="__blank">{{$collection['Url']}}.</a>
    </div>

    <div class="row">
      <div class="card">
        <h3>Add Comment</h3>
        <form id="form">
          @csrf
          <input type="hidden" value="{{$collection['id']}}" name="news_id" />

          <div class="col-md-6">
            <lable class="form-label" for="name">Full Name</lable><br><input id="name" type="text" name="name" class="form-control" />
          </div>

          <div class="col-md-6">
            <lable class="form-label" for="email">Email</lable><br><input id="email" type="email" name="email" class="form-control" />
          </div>

          <div class="col-md-12">
            <lable class="form-label" for="comment">Comment</lable><br><textarea name="comment" id="comment" class="form-control"></textarea>
          </div>
          <div class="col-md-12">
            <button type="button" onclick="addcumment()" id="btn" class="btn btn-success" style="margin: 10px;">Send</button>
          </div>

          <div id="message_show"></div>
        </form>
      </div>
      <div class="card">
        <h3>All Comment</h3>
        <hr>
        <span id="appendcomment"></span>
        @foreach($comment11 as $key )

        <?php

        $time = get_time($key->created_at);


        ?>

        <h4><i class="fa fa-comment-o"></i>{{$key->comment}}</h4><br>
        <small><i class="fa fa-clock-o"></i>{{$time}}</small><br>
        <b><i class="fa fa-pencil"></i>by:{{$key->name}}</b>
        <p><i class="fa fa-envelope"></i>{{$key->email}}</p>
        <hr>
        @endforeach
      </div>
    </div>
  </div>



  <div class="rightcolumn">
    <h3> &nbsp;&nbsp;Trending news</h3>
    @foreach($AllNewsss as $values)
    <?php
    $ticketTime = strtotime($values['Published']);
    $difference =  time() - $ticketTime;
    $minuts = round($difference / 60);
    $hours = round($difference / 3600);
    $days = round($difference / 86400);
    $week = round($days / 7);

    if ($minuts < 60) {
      $time = $minuts . "Minit ago";
    } else if ($minuts >= 60 and $hours < 24) {
      $time = $hours . "Hour ago";
    } elseif ($hours > 24 and $days < 7) {
      $time = $days . "Day ago";
    } elseif ($days > 7) {
      $time = $week . " Week ago";
    } else {
      $time = "just now";
    }
    ?>
    <div class="col-sm-12">
      <div class="card border border-primary">
        @if($values['urlToImage'])
        <img class="card-img-top" src="{{$values['urlToImage']}}" alt="Card image" style="width:100%;height: 181px; ">
        @else
        <img class="card-img-top" src="{{url('download.jpg')}}" alt="Card image" style="width:100%; height: 181px;">
        @endif
        <div class="card-body">
          <h4 class="card-title">{{$values['Title']}}</h4>
          <small class="card-title">{{ $time}}</small>
          <p class="card-text">{{$values['Content']}}</p>
          <a href="{{url('read_more/'.$values['id'])}}" class="btn btn-primary stretched-link">Read More</a>
        </div>
      </div>

    </div>

    @endforeach
  </div>
</div>


</div>

<x-footer />



<script>
  $(document).on('keyup', '#name', function() {
    $("#name").removeClass('require');
  });
  $(document).on('keyup', '#email', function() {
    $("#email").removeClass('require');
  });
  $(document).on('keyup', '#comment', function() {
    $("#comment").removeClass('require');
  });

  function addcumment() {

    var name = $("#name").val();
    var email = $("#email").val();
    var comment = $("#comment").val();

    if (name == '') {
      $("#name").addClass('require');
    }

    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

    if (email.match(mailformat)) {} else {
      $("#email").addClass('require');
      return false;
    }


    if (email == '') {
      $("#email").addClass('require');
    }
    if (comment == '') {
      $("#comment").addClass('require');
    }

    if (name == '' || email == "" || comment == "") {
      return false;
    }


    $("#btn").attr('disabled', true);
    $(".btn-success").html('<img class="card-img-top" src="{{url("b4d657e7ef262b88eb5f7ac021edda87.gif")}}" alt="Card image" style="width:100%; height: 18px;">');



    $.ajax({
      url: "{{url('addcomment')}}",
      type: "POST",
      data: jQuery('#form').serialize(),
      success: function(ddd) {

        setTimeout(goto, 2000);

        function goto() {
       
          data111 = "<span><h4><i class='fa fa-comment-o'></i>" + comment + "</h4><small><i class='fa fa-clock-o'></i>just now</small><br><b><i class='fa fa-pencil'></i>by:" + name + "</b><p><i class='fa fa-envelope'></i>" + email + "</p><hr></span>";      


          $("#message_show").html(ddd.msg);
          jQuery('#form')['0'].reset();
          $("#btn").attr('disabled', false);
          $(".btn-success").html('Send');
        
          $("#appendcomment").append(data111);

        }

      },
      error: function() {
        alert('error');
        $("#btn").attr('disabled', false);
      }
    });
  }
</script>