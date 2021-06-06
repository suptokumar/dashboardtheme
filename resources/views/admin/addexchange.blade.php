@extends("layout.app")
@section("title","Admin Portal")
@section("active","users")
@section("content")
<article>
<header style="overflow: hidden;">
  <a href="{{ url('/admin/exchange') }}" class="btn btn-danger float-left">Exchange List</a>
  <a href="{{ url('/admin/addconfigure') }}" class="btn btn-success float-left">Add Configure</a>
</header>
<section class="gateway_view">
  <form action="{{ url('/admin/createapi/addexchangelist') }}" method="POST" enctype="multipart/form-data">

<br>
@if ($message = session("message"))
<div class="alert alert-danger" role="alert">
{{$message}}
</div>
@endif

@if ($success = session("success"))
<div class="alert alert-success" role="alert">
{{$success}}
</div>
@endif


    @csrf
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="name">Exchange Name <span class="red">*</span></label>
      <input type="text" class="form-control" name="name" id="name" required="" placeholder="eg: Cricket">
    </div>
    <div class="form-group col-md-6">
      <label for="min_value">Exchange Minimum Bid value ($)</label>
      <input type="number" class="form-control" name="min_value" for="min_value" placeholder="eg: 10">
    </div>
    
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="type">Select Type of Bidding Allowed <span class="red">*</span></label>
      <select class="form-control" required="" name="type" for="type">
        @foreach ($configure as $cg)
        	<option value="{{$cg->id}}">{{$cg->text}}</option>
        @endforeach
      </select>
    </div>
    
    <div class="form-group col-md-6">
      <label for="icon">Logo<br>
      <img src="{{ url('/public/logo/user.png') }}" id="blah" alt="Default Image" style="width: 150px; height: 135px; border-radius: 10px;"></label>
      <input type="file" class="form-control" name="file" id="icon" placeholder="eg: Icon">
    </div>
  </div>
  <div class="cpnel">
    
  </div>
  <br>
  <div style="text-align: center;">
  <button type="submit" class="btn btn-primary">Create Exchange</button>
  </div>
</form>
</section>
</article>
@endsection
@section("script")

<style>
.page-content .grid > article:first-child {
    grid-column: 1 / -1;
    display: block;
}
</style>
<script>
  let imgInp = document.getElementById('icon');
  let blah = document.getElementById('blah');
  imgInp.onchange = evt => {
  const [file] = imgInp.files
  if (file) {
    blah.src = URL.createObjectURL(file)
  }
}
</script>
<script>
function accept(id,th){
  if (confirm("Accept?")) {
    $.ajax({
      url: '{{ url('/admin/acceptreader') }}',
      type: 'POST',
      data: {id: id,_token:"{{csrf_token()}}"},
    })
    .done(function(data) {
      $(th).html(data);
    });
    
  }
}
function deletes(id,th){
  if (confirm("Delete?")) {
    $.ajax({
      url: '{{ url('/admin/deletesreader') }}',
      type: 'POST',
      data: {id: id,_token:"{{csrf_token()}}"},
    })
    .done(function(data) {
      $(th).html(data);
    });
    
  }
}
</script>
@endsection