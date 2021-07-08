<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>ブックアプリ</title>

	<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,700" rel="stylesheet" type="text/css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" type="text/css">

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

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
						<span class="sr-only">ボタン</span>
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
</body>
</html>
@extends('layouts.app')



@section('content')
	<div class="container">
		<div class="col-sm-offset-2 col-sm-8">
			<div class="panel panel-default">
				<div class="panel-heading">
					New Book
				</div>

				<div class="panel-body">
					<!-- Display Validation Errors -->
					@include('commons.errors')

					<!-- New Book Form -->
					<form action="/book" method="POST" class="form-horizontal">
						{{ csrf_field() }}

						<!-- Book Name -->
						<div class="form-group">
							<label for="task-name" class="col-sm-3 control-label">Book</label>

							<div class="col-sm-6">
								<input type="text" name="name" id="book-name" class="form-control" value="{{ old('book') }}">
							</div>
						</div>

						<!-- Add Book Button -->
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-6">
								<button type="submit" class="btn btn-default">
									<i class="fa fa-plus"></i>本を追加する
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>

			<!-- Books -->
			@if (count($books) > 0)
				<div class="panel panel-default">
					<div class="panel-heading">
						書籍一覧
					</div>

					<div class="panel-body">
						<table class="table table-striped task-table">
							<thead>
								<th>Book</th>
								<th>&nbsp;</th>
							</thead>
							<tbody>
								@foreach ($books as $book)
									<tr>
										<td class="table-text"><div>{{ $book->title }}</div></td>

										<!-- Task Delete Button -->
										<td>
										<form action="/book/{{ $book->id }}" method="post">
									{{ csrf_field() }}
									{{ method_field('DELETE') }}

									<button type="submit" class="btn btn-danger">
										<i class="fa fa-trash"></i>削除
									</button>
								</form>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			@endif
		</div>
	</div>
@endsection