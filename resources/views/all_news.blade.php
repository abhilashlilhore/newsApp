<x-header />


<h2>Letest News</h2>
<!-- <p>This data from news api :</p> -->


<div class="row">
  @foreach($collection as $values)
  <?php
  $time = get_time($values['Published']);
  ?>
  <div class="col-sm-4">

    <div class="card border border-primary">

      @if($values['urlToImage'])
      <img class="card-img-top" src="{{$values['urlToImage']}}" alt="Card image" style="width:100%;height: 181px; ">
      @else
      <img class="card-img-top" src="{{url('download.jpg')}}" alt="Card image" style="width:100%; height: 181px;">
      @endif
      <div class="card-body">
        <h4 class="card-title">{{$values['Title']}}</h4>
        <small class="card-title">{{$time}}</small>
        <p class="card-text">{{$values['Content']}}</p>
        <a href="read_more/{{$values['id']}}" class="btn btn-primary stretched-link">Read More</a>
      </div>
    </div>

  </div>

  @endforeach

</div>
<div>
  {{$collection->links()}}
</div>