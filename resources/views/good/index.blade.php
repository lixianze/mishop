<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<center>
		<table>
			<tr>
				<td>ID</td>
				<td>姓名</td>
				<td>密码</td>
			</tr>
			@foreach ($data as $v)
    		<tr>
    			<td>{{ $v->id }}</td>
    			<td>{{ $v->name }}</td>
    			<td>{{ $v->pwd }}</td>
    		</tr>
			@endforeach
		</table>
	</center>
</body>
</html>