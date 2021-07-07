
	<style>
		body {
			font-family: 'Raleway';
			margin-top: 25px;
		}

		button .fa {
			margin-right: 6px;
		}

		.table-text div {
			padding-top: 6px;
		}
	</style>

	<script>
		$(function () {
			$('#book-name').focus();
		});
	</script>
</head>
<body>
	<div class="container">
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>

					<a class="navbar-brand" href="#">書籍リスト</a>
				</div>

				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						&nbsp;
					</ul>
				</div>
			</div>
		</nav>
	</div>
	@yield('content')
