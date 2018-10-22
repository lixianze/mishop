<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>laravel添加</title>
</head>
<body>
        <center>
            <table>
                <form action="/index.php/add" method="post">
                @csrf
                    <tr>
                        <td>名字</td>
                        <td><input type="text" name="name"></td>
                    </tr>
                    <tr>
                        <td>密码</td>
                        <td><input type="password" name="pwd"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" value="添加"></td>
                    </tr>
                </form>
            </table>
        </center>
</body>
</html>