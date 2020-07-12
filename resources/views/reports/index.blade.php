@extends('layouts.dashboard')


@section('breadcrumbs')
    <p class="mb-0 text-white">Home / <a class="text-white" href="/reports">Reports</a></p>
    <h3 class="mb-0 font-weight-bold text-white">My Reports</h3>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card border mb-3">
            <div class="card-body d-flex align-items-center justify-content-between">
                <h4 class="font-weight-bold mb-0">My Reports</h4>
                <a href="#addReport" data-toggle="modal" class="btn btn-primary"><i class="fe-plus mr-2"></i> Add Report</a>
            </div>
        </div>

        <div class="card">
            <div class="card-body">

                <form method="GET" action="/reports">

                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="exampleInputPassword1">Form Date</label>
                            <input type="text" placeholder="Choose From Date" autocomplete="off" class="form-control datepicker" value="{{ request('from_date') }}" name="from_date" placeholder="">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="exampleInputPassword1">To Date</label>
                        <input type="text" placeholder="Choose To Date" autocomplete="off" class="form-control datepicker" name="to_date" value="{{ request('to_date') }}" placeholder="">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="appointment_id">Appointment Id</label>
                            <div>
                                <input name="appointment_id" placeholder="Enter appointment id" class="form-control" id="appointment_id"value="{{ request('appointment_id') }}"  type="text">
                            </div>
                        </div>
                        <div class="form-group col=md-2 mt-4">
                            <button type="submit" class="btn btn-success float-right">Filter Reports</button>
                        </div>
                    </div>

                </form>

            </div> <!-- end card-body-->
        </div> <!-- end card-->


        <div class="card mt-3">
            <div class="card-body p-0">


                @if (!empty($reports))

                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Test name</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reports as $index => $report)
                                    <tr>
                                        <td>{{ $report->test }}</td>
                                        <td>{{ $report->created_at->format('d-m-Y') }}</td>
                                        <td>
                                            <a href="{{ $report->report_url }}" target="_blank" class="btn btn-primary btn-sm"><i class="fe-eye"></i></a>
                                            <a href="/reports/{{$report->id}}/delete" onclick="return confirm('Are you sure?')"  class="btn btn-danger btn-sm ml-2"><i class="fe-trash"></i></a>
                                            <a href="#shareReport-{{$report->id}}" data-toggle="modal"   class="btn btn-success btn-sm ml-2"><i class="fe-share"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="row" style="place-content: center;">
                        <p class="mt-3 text-center">No Reports Found</p>
                    </div>

                @endif
            </div>
        </div>
    </div>

    @include('modals.add-report')

    @foreach ($reports as $report)
        @include('modals.share-report')    
    @endforeach
    
@endsection


@push('js')
    
<script>
    $('.datepicker').datepicker({
        format: 'dd-mm-yyyy',
    });
</script>   

@endpush