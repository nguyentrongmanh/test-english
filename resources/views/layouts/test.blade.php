<!DOCTYPE html>
<html>

<head>
	<link rel="dns-prefetch" href="//fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

	<!-- Styles -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('css/test.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css/flipdown.min.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
		integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<script src="{{ asset('js/flipdown.min.js') }}"></script>
	<script src="{{ url('js/sweetalert.min.js') }}"></script>
	<title></title>
	<style>
		audio {
			outline: none;
		}
	</style>
</head>

<body>
	@yield('content')
</body>
<script>
	var baseLaravelUrl = "{{ url('/') }}"
	$(document).ready(function() {
		$(".exit-test").on("click", function(e) {
			e.preventDefault()
			swal({
			title: "Kết quả thi sẽ bị hủy!! Bạn vẫn muốn thoát?",
			dangerMode: true,
			buttons: true,
			}).then((value) => {
				if (value == true) {
					window.location = baseLaravelUrl
				}
			});
		})
	})
</script>

</html>