@extends("BangladeshRecruitingAgency.master")

@section('title', 'Selected Candidates')
@section('DataTableCss')
    <!-- DataTables -->
    <link href="{{ asset('assets/plugins/datatables/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/datatables/buttons.bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/datatables/fixedHeader.bootstrap.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/plugins/datatables/responsive.bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/datatables/dataTables.bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/datatables/scroller.bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('main-content')
    <!-- Start content -->
    <div class="content">
        <div class="container">
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-header-title">
                        <h4 class="pull-left page-title">Selected Candidates</h4>
                        <ol class="breadcrumb pull-right">
                            <li><a href="#">mGES</a></li>
                            <li><a href="#">Candidates
                                </a></li>
                            <li class="active">Selected Candidates</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Selected candidates</h3>
                        </div>
                        <div class="panel-body">
                            <form action="{{ route('BangladeshRecruitingAgency.candidate.forwardToBA') }}" method="post">
                                @csrf
                            <table id="datatable-buttons" class="table table-striped table-bordered">
                                <center><button type="submit" class="btn btn-md btn-info">Forward to BA</button></center>
                                <thead>
                                    <tr>
                                        <th style="width:15%">
                                            <label><input type="checkbox" name="select_option" id="select_option"
                                                    onclick="checkedAll.call(this);">&nbsp;&nbsp;Select/Unsellect
                                                All</label>
                                        </th>
                                        <th>SL No</th>
                                        <th>Recruiter Name</th>
                                        {{-- <th>Company Name</th> --}}
                                        <th>Job Category</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($selectedCandidates as $selectedCandidate)
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="all_option[]" value="{{ $selectedCandidate->id }}">
                                            </td>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $selectedCandidate->company->user_name }}</td>
                                            {{-- <td>{{ $selectedCandidate->user->company_name }}</td> --}}
                                            <td>{{ $selectedCandidate->job_category->category_name }}</td>

                                            <td>
                                                {{-- @if ($selectedCandidate->result_status == 'Selected')
                                                    <a class="btn btn-info btn-sm"
                                                        href="{{ route('BangladeshRecruitingAgency.appliedJob.show', $selectedCandidate->id) }}">
                                                        <i class="fa fa-eye"></i></a>
                                                @elseif ($selectedCandidate->result_status == 'Approved')
                                                    <a class="btn btn-info btn-sm"
                                                        href="{{ route('BangladeshRecruitingAgency.candidate.viewSelected', $selectedCandidate->job_post_id) }}"><i
                                                            class="fa fa-users"></i></a>
                                                @endif --}}

                                                <a class="btn btn-info btn-sm"
                                                    href="{{ route('BangladeshRecruitingAgency.candidate.show', $selectedCandidate->id) }}">
                                                    <i class="fa fa-eye"></i>&nbsp;View</a>


                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>SL No</th>
                                        <th>Recruiter Name</th>
                                        <th>Job Category</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </form>
                        </div>
                    </div>
                </div>
            </div> <!-- End Row -->
        </div> <!-- container -->
    </div>
    <!--End content -->

    <script type="text/javascript">
        function checkedAll() {

            var elements = document.querySelectorAll('input[type="checkbox"]');
            for (var i = elements.length; i--;) {
                if (elements[i].type == 'checkbox') {
                    elements[i].checked = this.checked;
                }
            }
        }
    </script>
@endsection

@section('DataTableJs')
    <!-- Datatables-->
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/dataTables.fixedHeader.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/responsive.bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/dataTables.scroller.min.js') }}"></script>
    <!-- Datatable init js -->
    <script src="{{ asset('assets/pages/datatables.init.js') }}"></script>
@endsection
