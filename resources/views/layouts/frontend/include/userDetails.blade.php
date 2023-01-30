<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
    <h1 class="header margin-bottom-10">User Details </h1>
    <div class="row">
        <div class="table-responsive">
            <table class="table table-hover" id="myTable">
                <thead>
                    <tr class="center">
                        <th>Sl No.</th>
                        <th>Name</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Role</th>
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
                                <td>{{ $target->name ?? '' }}</td>
                                <td>{{ $target->email ?? '' }}</td>
                                <td>{{ $target->role->title ?? '' }}</td>

                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="8">No User Found</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>


