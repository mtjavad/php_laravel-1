<!doctype html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/my.css">
    <title>آموزشی</title>
</head>
<body>
<div class="container">
    <div class="row mt-5">
        <div class="offset-2"></div>
        <div class="col-md-8">

            <div class="card">
                <h2 class="card-header">ذخیره فایل اکسل در پایگاه داده</h2>
                <div class="card-body">
                    @if (session('msg'))
                        <div class="alert alert-success">
                            {{session('msg')}}
                        </div>
                    @endif
                    <form action="" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="file">انتخاب فایل اکسل</label>
                            <input name="file" type="file" id="file" class="form-control" >
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-info">ارسال</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
