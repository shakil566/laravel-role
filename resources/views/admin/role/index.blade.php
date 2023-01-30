@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-plain">

                    <div class="card-header card-header-primary">
                        <div class="row">
                            <div class="col-md-8">
                                <h4 class="card-title mt-0">Role List

                                    <a class="btn btn-default btn-sm create-new" href="{{ URL::to('/admin/role/create') }}">
                                        Add
                                        New
                                        <i class="fa fa-plus create-new"></i>
                                    </a>
                                </h4>
                            </div>
                            <div class="col-md-4">
                                @include('layouts.include.flash')
                            </div>
                        </div>

                    </div>
                    <!-- Begin Filter-->
                    {!! Form::open(['group' => 'form', 'url' => '/admin/role/filter', 'class' => 'form-horizontal']) !!}
                    <div class="row margin-top-10">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="card-title col-md-4 bold" for="search">Search</label>
                                <div class="col-md-8">
                                    {!! Form::text('search', Request::get('search'), [
                                        'class' => 'form-control tooltips',
                                        'title' => 'Title',
                                        'placeholder' => 'Title',
                                        'list' => 'search',
                                        'autocomplete' => 'off',
                                    ]) !!}
                                    <datalist id="search">
                                        @if (!empty($titleArr))
                                            @foreach ($titleArr as $titles)
                                                <option value="{{ $titles->title }}"></option>
                                            @endforeach
                                        @endif
                                    </datalist>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form">
                                <button type="submit" class="btn btn-md green btn-outline filter-submit margin-bottom-20">
                                    <i class="fa fa-search"></i> Filter
                                </button>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                    <!-- End Filter -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr class="center">
                                        <th>Sl No.</th>
                                        <th>Title</th>
                                        <th class="td-actions text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @if (!empty($targetArr))
                                        <?php
                                        $sl = 0;
                                        ?>
                                        @foreach ($targetArr as $target)
                                            <tr>
                                                <td>{{ ++$sl }}</td>
                                                <td>{{ $target->title ?? '' }}</td>

                                                <td class="td-actions text-center vcenter">
                                                    <div class="width-inherit">
                                                        <a class="btn btn-xs btn-primary tooltips" title="Edit"
                                                            href="{{ URL::to('/admin/role/' . $target->id . '/edit') }}">
                                                            <i class="fa fa-edit"></i>
                                                        </a>

                                                        {{ Form::open(['url' => '/admin/role/' . $target->id, 'class' => 'delete-form-inline','id' => 'delete']) }}
                                                        {{ Form::hidden('_method', 'DELETE') }}
                                                        <button class="btn btn-xs btn-danger delete tooltips" title="Delete"
                                                            type="submit" data-placement="top" data-rel="tooltip"
                                                            data-original-title="Delete">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                        {{ Form::close() }}

                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="8">No Blog Found</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>

    <script type="text/javascript">
        $(document).on("submit", '#delete', function(e) {
        alert
        //This function use for sweetalert confirm message
        e.preventDefault();
        var form = this;
        swal({
                title: 'Are you sure you want to Delete?',
                text: '',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete",
                closeOnConfirm: false
            },
            function(isConfirm) {
                if (isConfirm) {
                    toastr.info("Loading...", "Please Wait.", {
                        "closeButton": true
                    });
                    form.submit();
                } else {
                    //swal(sa_popupTitleCancel, sa_popupMessageCancel, "error");

                }
            });
    });
    </script>
@stop
