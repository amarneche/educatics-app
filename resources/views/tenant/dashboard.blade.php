@extends('layouts.tenant.base')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="box">
          <div class="row g-0 py-2">

            <div class="col-12 col-lg-3">
              <div class="box-body be-1 border-light">
                <div class="flexbox mb-1">
                  <span>
                      <span class="icon-User fs-40"><span class="path1"></span><span class="path2"></span></span><br>
                    New Users
                  </span>
                  <span class="text-primary fs-40">845</span>
                </div>
                <div class="progress progress-xxs mt-10 mb-0">
                  <div class="progress-bar" role="progressbar" style="width: 35%; height: 4px;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            </div>


            <div class="col-12 col-lg-3 hidden-down">
              <div class="box-body be-1 border-light">
                <div class="flexbox mb-1">
                  <span>
                      <span class="icon-Selected-file fs-40"><span class="path1"></span><span class="path2"></span></span><br>
                    Today Invoices
                  </span>
                  <span class="text-info fs-40">952</span>
                </div>
                <div class="progress progress-xxs mt-10 mb-0">
                  <div class="progress-bar bg-info" role="progressbar" style="width: 55%; height: 4px;" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            </div>


            <div class="col-12 col-lg-3 d-none d-lg-block">
              <div class="box-body be-1 border-light">
                <div class="flexbox mb-1">
                  <span>
                      <span class="icon-Info-circle fs-40"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span><br>
                    Open Issues
                  </span>
                  <span class="text-warning fs-40">845</span>
                </div>
                <div class="progress progress-xxs mt-10 mb-0">
                  <div class="progress-bar bg-warning" role="progressbar" style="width: 65%; height: 4px;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            </div>


            <div class="col-12 col-lg-3 d-none d-lg-block">
              <div class="box-body">
                <div class="flexbox mb-1">
                  <span>
                      <span class="icon-Group-folders fs-40"><span class="path1"></span><span class="path2"></span></span><br>
                    New Projects
                  </span>
                  <span class="text-danger fs-40">158</span>
                </div>
                <div class="progress progress-xxs mt-10 mb-0">
                  <div class="progress-bar bg-danger" role="progressbar" style="width: 40%; height: 4px;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            </div>


          </div>
        </div>
    </div>
    <!-- /.col -->

  </div>


  <div class="row">
    <div class="col-lg-6 col-12">
        <div class="row">
          <div class="col-12 col-md-4">
              <a class="box box-link-shadow text-center" href="javascript:void(0)">
              <div class="box-body py-25">
                  <p class="mt-5"><span class="icon-Shield-check fs-50"><span class="path1"></span><span class="path2"></span></span></p>
                  <p class="fw-600">Badges</p>
              </div>
              </a>
          </div>
          <div class="col-12 col-md-4">
              <a class="box box-link-shadow text-center" href="javascript:void(0)">
                  <div class="box-body py-25">
                      <p class="mt-5">
                          <span class="icon-Incoming-mail fs-50 text-success"><span class="path1"></span><span class="path2"></span></span>
                      </p>
                      <p class="fw-600">Inbox</p>
                  </div>
              </a>
          </div>
          <div class="col-12 col-md-4">
              <a class="box box-link-shadow text-center" href="javascript:void(0)">
                  <div class="box-body py-25">
                      <p class="mt-5">
                          <span class="icon-Cart fs-50 text-danger"><span class="path1"></span><span class="path2"></span></span>
                      </p>
                      <p class="fw-600">Cart</p>
                  </div>
              </a>
          </div>

        </div>
        <!-- /.row -->
    </div>
    <div class="col-lg-6 col-12">	
        <div class="row">
          <div class="col-12 col-md-4">
              <a class="box box-link-pop text-center" href="javascript:void(0)">
                  <div class="box-body py-25">
                      <p class="fs-40">
                          <strong>$499</strong>
                      </p>
                      <p class="fw-600">
                          <span class="icon-Money me-5 text-info"><span class="path1"></span><span class="path2"></span></span>Earnings
                      </p>
                  </div>
              </a>
          </div>
          <div class="col-12 col-md-4">
              <a class="box box-link-pop text-center" href="javascript:void(0)">
                  <div class="box-body py-25">
                      <p class="fs-40 text-success">
                          <strong>10</strong>
                      </p>
                      <p class="fw-600">
                          <span class="icon-Incoming-mail me-5 text-success"><span class="path1"></span><span class="path2"></span></span> Messages
                      </p>
                  </div>
              </a>
          </div>
          <div class="col-12 col-md-4">
              <a class="box box-link-pop text-center" href="javascript:void(0)">
                  <div class="box-body py-25">
                      <p class="fs-40 text-danger">
                          <strong>3</strong>
                      </p>
                      <p class="fw-600">
                          <span class="icon-Cart me-5 text-danger"><span class="path1"></span><span class="path2"></span></span> Products
                      </p>
                  </div>
              </a>
          </div>
        </div>
        <!-- /.row -->
    </div>
</div>



  @endsection
