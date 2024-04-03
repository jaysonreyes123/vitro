@extends('layout._main',["title"=>"Employee"])
@section('content')

<section class="section">
@include('layout._breadcrumb',["title_page"=>"Employee"])
   <div class="row">
        <div class="col-lg-12 grid-margin col-xl-12 stretch-card">
            <div class="card p-2">
                <div class="card-body">
                    <div class="d-flex justify-content-end mb-3 mt-3">
                        <button type="button" id="btn-payment" class="badge bg-success mright10 btn" data-bs-toggle="modal" data-bs-target="#employee-modal">Add Employee</button>
                    </div>
                    <div class="table-reponsive">
                        <table class="table" id="employee-table">
                            <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
   </div>

<div class="modal" id="employee-modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Employee</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Firstname</label>
                                <input type="text" name="firstname" class="form-control" placeholder="Firstname">
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Lastname</label>
                                <input type="text" name="lastname" class="form-control"  placeholder="Lastname">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Username</label>
                                <input type="text" name="username" class="form-control" placeholder="Username">
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Password</label>
                                <input type="text" name="password" class="form-control"  placeholder="Password">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="" class="form-label">Employee Status</label>
                                <select class="form-select" name="employee_status" id="">
                                    @php
                                        $models = \App\Models\EmployeeStatus::all();
                                    @endphp
                                    @foreach ($models as $model)
                                        <option value="{{$model->id}}">{{$model->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer d-flex justify-content-between">
                <button class="btn btn-default" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-primary btn-sm">Save</button>
            </div>
        </div>
    </div>
</div>
</section>
@push('script')
     <script>
        $("#employee-table").DataTable({
            ajax:"/hr/employee/list",
            serverSide:true,
            processing:true,
            columns:[
                {data:"firstname",name:"firstname"},
                {data:"lastname",name:"lastname"},
                {data:"status",name:"status"}

            ]
        });
     </script>
@endpush

@endsection