@extends('master-layout');
@section('content')
<div id="mainContent">
	@if (session('thongbao'))
        <div class="alert alert-success">
            {{session('thongbao')}}
        </div>
    @endif
	<img src="assets/images/hinhnen.jpg" alt="" style="width:800px">
</div>	<!-- End of Main Content -->
@endsection;