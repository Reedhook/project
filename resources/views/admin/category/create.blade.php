@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Категории</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- general form elements -->
                <div class="row">
                    <div class="col-12">
                        <form action="{{route('admin.category.store')}}" method="POST" class="w-25">
                            @csrf
                            <div class="form-group">
                                <label>
                                    <input type="text" name='title' class="form-control" placeholder="Введите категорию">
                                </label>
                                @error('title')
                                <div class="text-danger">Нужно ввести правильное значение в поле</div>
                                @enderror
                            </div>
                            <input type="submit" class="btn btn-primary" value="Добавить">
                        </form>

                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
