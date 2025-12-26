<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-compatible" content = "ie=edge">
    <title>document</title>
    <link rel="stylesheet" href="{{asset('fontawesome-free-6.5.1-web/css/all.min.css')}}">
    <link href="/common_admin_interface.css" rel="stylesheet">
</head>
<style>
    .form-control {
        background-color: #D9D9D9;
    }
</style>
<body>
<div class="row" style="height: 625px;">
    <div id="leftside" class="col-sm-3 col-lg-2 g-0">
        <div id="header1"></div>
        <div id="sidebar">
            <div id="navbar">
                <ul class="navi">
                    <li class=""><a href=""><i></i>Tổng quan</a></li>
                    <li class=""><a href="{{url('category')}}"><i></i>Danh mục</a></li>
                    <li class=""><a href="{{url('product')}}"><i></i>Sản phẩm</a></li>
                    <li class=""><a href="{{url('cpu')}}"><i></i>Cpu</a></li>
                    <li class=""><a href="{{url('card')}}"><i></i>Card</a></li>
                    <li class=""><a href="{{url('ram')}}"><i></i>Ram</a></li>
                    <li class=""><a href="{{url('ssd')}}"><i></i>Ssd</a></li>
                    <li class=""><a href="{{url('screen')}}"><i></i>Màn hình</a></li>
                    <li class=""><a href="{{url('customer')}}"><i></i>Khách hàng</a></li>
                    <li class=""><a href="{{url('order')}}"><i></i>Đơn hàng</a></li>
                    <li class=""><a href="{{url('report')}}"><i></i>Báo cáo</a></li>
                </ul>
            </div>
        </div>
        <div id="sidebar">
            <div id="navbar">
                <ul class="navi">
                    <li class=" "><a href="{{url('admin')}}"><i></i>Admin</a></li>
                    <li><a></a></li>
                    <li><a></a></li>
                    <li><a></a></li>
                    <li><a></a></li>
                    <li><a></a></li>
                    <li><a></a></li>
                    <li><a></a></li>
                </ul>
            </div>
        </div>
        <div id="sidebar">
            <div id="navbar">
                <ul class="navi">
                    <li class=" "><a href=""><i></i>Cấu hình</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div id="header2">
            <form class="search" role="search">
                <input type="text" class="form-control" placeholder="Nhập từ khoá cần tìm kiếm">
            </form>
        </div>
        <div id="toolbar" class="btn-group">
            <a href="{{url('admin/create')}}" class="add btn-success">Thêm admin
                <i class="fa-sharp fa-solid fa-circle-plus"></i>
            </a>
        </div>
        <div id="main" class="row">
            <table class="table" style="width: 100%">
                <tr>
                    <th>ID</th>
                    <th>Tên nhân viên</th>
                    <th>Số điện thoại</th>
                    <th>Chức vụ</th>
                    <th>Email</th>
                    <th>Thao tác</th>
                </tr>
                @foreach($admin as $admin)
                    <tr>
                        <td>{{$admin->admin_id}}</td>
                        <td>{{$admin->admin_name}}</td>
                        <td>{{$admin->phone_number}}</td>
                        <td>{{$admin->level}}</td>
                        <td>{{$admin->email}}</td>
                        <td class="form-group">
                            <a href="{{url('admin/fix')}}" class="btn btn-primary"><i class="fa-solid fa-pen-to-square" style="font-size: 30px"></i></a>
                            <a href="" class="btn btn-danger"><i class="fa-solid fa-trash-can" style="font-size: 30px"></i></a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
<script>
    function xoa(){
        return confirm("bạn có muốn muốn xóa ?")
    }
</script>
</body>
</html>
<script>
    /* When the user clicks on the button,
    toggle between hiding and showing the dropdown content */
    function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
    }

    // Close the dropdown if the user clicks outside of it
    window.onclick = function(event) {
        if (!event.target.matches('.dropbtn')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }
    }
</script>
