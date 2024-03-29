@extends('layouts.template.app')
@section('title', 'Jurnal')

@section('contents')
<div class="page-wrapper">
  <div id="delete-alert" class="alert alert-success d-none">
    Data have been removed
   </div>
   <div id="duplicate-alert" class="alert alert-success d-none">
    Data was successfully duplicated
   </div>
   <div id="update-status-alert" class="alert alert-success d-none">
    Status successfully updated
   </div>
  @if(session('status'))
  <div id="alert" class="alert alert-success">
    {{ session('status') }}
  </div>
  @endif
  @if(session('error'))
  <div id="alert" class="alert alert-danger">
    {{ session('error') }}
  </div>
  @endif
  <div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Jurnal List</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="{{route('home')}}" class="text-muted">Home</a></li>
                        <li class="breadcrumb-item text-muted active" aria-current="page">Jurnal</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab">
            <div class="card-body">
              <div class="mb-4">
                <div class="nav-item my-1">
                  <a href="{{ route('jurnals.create') }}" type="button" class="btn btn-primary btn-rounded">
                    + Add New Record
                  </a>
                </div>
              </div>
              <div class="table-responsive">
                <table class="table table-bordered yajra-datatable table-striped no-wrap">
                  <thead>
                    <tr>
                      <th>Transaction No</th>
                      <th>Transaction Date</th>
                      <th>Total Debit</th>
                      <th>Total Credit</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
  $(function () {
   
        let alert = $('#alert').length;
        if (alert > 0) {
            setTimeout(() => {
                $('#alert').remove();
            }, 3000);
        }
        // data table
        datatable(1);

        $('body').on('click', '#show-detail', function () {
            let data_id = $(this).data('id');
            let url = "jurnals/" + data_id;
            $(location).attr('href', url);
        });

        $('body').on('click', '#invoice', function () {
            let data_id = $(this).data('id');
            let url = "jurnals/invoice/" + data_id;
            $(location).attr('href', url);
        });

        $('body').on('click', '#edit', function () {
            let data_id = $(this).data('id');
            let url = "jurnals/" + data_id + "/edit";
            $(location).attr('href', url);
        });

        $('body').on('click', '#delete',async function () {
            let data_id = $(this).data("id");
            let confirmation = await showDialog("Are you sure?","You want to delete this data!","warning");
            if (confirmation) {
                let url = window.location.origin + "/jurnals/" + data_id;
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        id: data_id
                    },
                    success: function (data) {
                      if(data.error){
                        var element = document.getElementById("not-delete-alert");
                        element.classList.remove("d-none");
                        setTimeout(()=>{
                          element.classList.add("d-none");
                        }, 3000);
                        return;
                      }
                      var table =  $(".yajra-datatable").DataTable();
                      table.ajax.reload();
                      var element = document.getElementById("delete-alert");
                      element.classList.remove("d-none");
                      setTimeout(()=>{
                        element.classList.add("d-none");
                      }, 3000);
                    },
                    error: function (data) {
                        $(location).attr('href', window.location.origin + "/jurnals");
                    }
                });
            }
        });

        $('body').on('click', '#duplicate', async function () {
            let data_id = $(this).data('id');
            let confirmation = await showDialog("Please confirm!","Do you want to duplicate this data?","question");
            if(confirmation){
              let url = "jurnals/duplicate/" + data_id;
              $.ajax({
                url: url,
                success: function(data){
                  var table =  $(".yajra-datatable").DataTable();
                  table.ajax.reload();
                  var element = document.getElementById("duplicate-alert");
                      element.classList.remove("d-none");
                      setTimeout(()=>{
                        element.classList.add("d-none");
                      }, 3000);
                },
                error: function(data){
                  $(location).attr('href', window.location.origin + "/jurnals");
                }
              })
            }
        });

        // $('body').on('click', '.update-status', function () {
        //     let id = $(this).data("id");
        //     let status = $(this).data("status");

        //     let url = window.location.origin + "/purchases-status";
        //     $.ajax({
        //         url: url,
        //         type: 'POST',
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         },
        //         data: {
        //             id: id,
        //             status: status
        //         },
        //         success: function (data) {
        //           if(data.error){
        //             var element = document.getElementById("not-update-status-alert");
        //               element.classList.remove("d-none");
        //               setTimeout(()=>{
        //                 element.classList.add("d-none");
        //               }, 3000);
        //             return;
        //           }
        //           var table =  $(".yajra-datatable").DataTable();
        //           table.ajax.reload();
        //           var element = document.getElementById("update-status-alert");
        //               element.classList.remove("d-none");
        //               setTimeout(()=>{
        //                 element.classList.add("d-none");
        //               }, 3000);
        //           $.ajax({
        //             url: window.location.origin + "/purchases-counter",
        //             success: function(data){
        //               updateBadge(data);
        //             }
        //           });
        //         },
        //         error: function (data) {
        //             $(location).attr('href', window.location.origin + "/purchases");
        //         }
        //     });
        // });
  });

  // function updateBadge(data){
  //   let waiting = $('#waiting-badge');
  //   let warehouse = $('#warehouse-badge');
  //   let indonesia = $('#indonesia-badge');
  //   let arrived = $('#arrived-badge');
  //   let completed = $('#completed-badge');

  //   waiting.text(data.waiting);
  //   warehouse.text(data.warehouse);
  //   indonesia.text(data.indonesia);
  //   arrived.text(data.arrived);
  //   completed.text(data.completed);
  // }

  function datatable(status) {
    $table = $('.yajra-datatable').DataTable({
      destroy: true,
      processing: true,
      serverSide: true,
      ajax: `{{ url('jurnal-list') }}`,
      columns: [
          {
              data: 'transaction_no',
              name: 'transaction_no'
          },
          {
              data: 'transaction_date',
              name: 'transaction_date'
          },
          {
              data: 'total_debit',
              name: 'total_debit'
          },
          {
              data: 'total_credit',
              name: 'total_credit'
          },
          {
              data: 'action',
              name: 'action',
              orderable: false,
              searchable: false
          },
      ]
    });
  }
</script>
@endsection