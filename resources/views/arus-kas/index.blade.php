@extends('layouts.template.app')
@section('title', 'Arus Kas')

@section('contents')
<div class="page-wrapper">
  <div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
          <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Arus Kas</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="{{route('home')}}" class="text-muted">Home</a></li>
                        <li class="breadcrumb-item text-muted active" aria-current="page">Arus Kas</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <form method="POST" enctype="multipart/form-data"
            action="{{ route('arus-kas.print') }}">
            @csrf
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                    <label for="start_month">Start Month</label>
                    <input type="date" class="form-control @error('start_month') is-invalid @enderror" id="start_month" name="start_month" value="{{ old('start_month') }}" required>
                    @error('start_month')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                    <label for="end_month">End Month</label>
                    <input type="date" class="form-control @error('end_month') is-invalid @enderror" id="end_month" name="end_month" value="{{ old('end_month') }}" required>
                    @error('end_month')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                </div>
              </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <hr>
                    <div class="">
                      <button type="submit" class="btn btn-primary btn-rounded">Print</button>
                    </div>
                </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection