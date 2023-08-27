<div>
    <div class="row">
        <div class="col-12 col-md-12">
            <div class="table-responsive">
                <table class="table table-striped table-hover	 table-bordered table-info text-center table-sm align-middle">
                    <thead class="table-light">
                        <caption>College's And Hostel's</caption>
                        <tr>
                            <th class="text-start">Count</th>
                            <th>College's</th>
                            <th>Hostel's</th>
                            <th>Boy's Hostel</th>
                            <th>Girls's Hostel</th>
                        </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <tr class="table-primary">
                                <th class="text-start" scope="row">Active</th>
                                <td>{{ $a_college }}</td>
                                <td>{{ $a_hostel }}</td>
                                <td>{{ $a_b_hostel }}</td>
                                <td>{{ $a_g_hostel }}</td>
                            </tr>
                            <tr class="table-primary">
                                <th class="text-start" scope="row">In Active</th>
                                <td>{{ $i_college }}</td>
                                <td>{{ $i_hostel }}</td>
                                <td>{{ $i_b_hostel }}</td>
                                <td>{{ $i_g_hostel }}</td>
                            </tr>
                            <tr class="table-primary" >
                                <th class="text-start" scope="row">Total</th>
                                <td>{{ $total_college }}</td>
                                <td>{{ $total_hostel }}</td>
                                <td>{{ $total_b_hostel }}</td>
                                <td>{{ $total_g_hostel }}</td>
                            </tr>
                        </tbody>
                </table>
            </div>
        </div>
        <div class="col-12 col-md-12">
            <div class="table-responsive">
                <table class="table table-striped table-hover	 table-bordered table-info text-center table-sm align-middle">
                    <thead class="table-light">
                        <caption>Building's</caption>
                        <tr>
                            <th class="text-start">Count</th>
                            <th>Building's</th>
                            <th>Boy's Hostel</th>
                            <th>Girls's Hostel</th>
                        </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <tr class="table-primary">
                                <th class="text-start" scope="row">Active</th>
                                <td>{{ $bca=App\Models\Building::where('status',0)->count(); }}</td>
                                <td>  
                                    @php
                                        $bh=App\Models\Hostel::where('gender',0)->pluck('id');
                                        $bhc=App\Models\Building::where('status',0)->where('hostel_id',$bh)->count();
                                    @endphp
                                    {{ $bhc }}
                                </td>
                                <td>  
                                    @php
                                        $gh=App\Models\Hostel::where('gender',1)->pluck('id');
                                        $ghc=App\Models\Building::where('status',0)->where('hostel_id',$bh)->count();
                                    @endphp
                                    {{ $ghc }}
                                </td>
                            </tr>
                            <tr class="table-primary">
                                <th class="text-start" scope="row">In Active</th>
                                <td>{{ $bci=App\Models\Building::where('status',1)->count(); }}</td>
                                <td>  
                                    @php
                                        $bh=App\Models\Hostel::where('gender',0)->pluck('id');
                                        $bhc=App\Models\Building::where('status',1)->where('hostel_id',$bh)->count();
                                    @endphp
                                    {{ $bhc }}
                                </td>
                                <td>  
                                    @php
                                        $gh=App\Models\Hostel::where('gender',1)->pluck('id');
                                        $ghc=App\Models\Building::where('status',1)->where('hostel_id',$bh)->count();
                                    @endphp
                                    {{ $ghc }}
                                </td>
                            </tr>
                            <tr class="table-primary" >
                                <th class="text-start" scope="row">Total</th>
                                <td>{{ $bc=App\Models\Building::count(); }}</td>
                                <td>  
                                    @php
                                        $bh=App\Models\Hostel::where('gender',0)->pluck('id');
                                        $bhc=App\Models\Building::where('hostel_id',$bh)->count();
                                    @endphp
                                    {{ $bhc }}
                                </td>
                                <td>  
                                    @php
                                        $gh=App\Models\Hostel::where('gender',1)->pluck('id');
                                        $ghc=App\Models\Building::where('hostel_id',$bh)->count();
                                    @endphp
                                    {{ $ghc }}
                                </td>
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
        <div class="col-12 col-md-12">
            <div class="table-responsive">
                <table class="table table-striped table-hover	 table-bordered table-info text-center table-sm align-middle">
                    <thead class="table-light">
                        <caption>Room's</caption>
                        <tr>
                            <th class="text-start">Room's</th>
                            <th>Count</th>
                            <th>Full</th>
                            <th>Free</th>
                        </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @foreach ($seated as $s)
                                <tr class="table-primary" >
                                   <th class="text-start">{{ $s->seated }} Seated</th>
                                   <td>{{ $room=App\Models\Room::where('seated_id',$s->id)->count(); }}</td>  
                                   <td>{{ $room=App\Models\Room::where('status',1)->where('seated_id',$s->id)->count(); }}</td>  
                                   <td>{{ $room=App\Models\Room::where('status',0)->where('seated_id',$s->id)->count(); }}</td>  
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr class="table-primary ">
                                <th class="text-start">Total</th>
                                <th>{{ $total_room }}</th>
                                <th>{{ $f_room }}</th>
                                <th>{{ $a_room }}</th>
                            </tr>
                        </tfoot>
                </table>
            </div>
        </div>
        
    </div>
    <div>
        
        
    </div>
    <br>

  @section('title') Admin Dashboard @endsection
  <div class="row">
      <div class="col-md-12">
          <div class="d-sm-flex justify-content-between align-items-center transaparent-tab-border {">
              <h1>Dashboard Overview</h1>
          </div>
          <div class="tab-content tab-transparent-content">
              <div class="tab-pane fade show active" id="business-1" role="tabpanel" aria-labelledby="business-tab">
                  <div class="row">
                      <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
                          <div class="card">
                              <div class="card-body text-center">
                                  <h5 class="mb-2 text-dark font-weight-normal">
                                      Orders
                                  </h5>
                                  <h2 class="mb-4 text-dark font-weight-bold">
                                      932.00
                                  </h2>
                                  <div
                                      class="dashboard-progress dashboard-progress-1 d-flex align-items-center justify-content-center item-parent">
                                      <i class="mdi mdi-lightbulb icon-md absolute-center text-dark"></i>
                                  </div>
                                  <p class="mt-4 mb-0">Completed</p>
                                  <h3 class="mb-0 font-weight-bold mt-2 text-dark">
                                      5443
                                  </h3>
                              </div>
                          </div>
                      </div>
                      <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
                          <div class="card">
                              <div class="card-body text-center">
                                  <h5 class="mb-2 text-dark font-weight-normal">
                                      Unique Visitors
                                  </h5>
                                  <h2 class="mb-4 text-dark font-weight-bold">
                                      756,00
                                  </h2>
                                  <div
                                      class="dashboard-progress dashboard-progress-2 d-flex align-items-center justify-content-center item-parent">
                                      <i class="mdi mdi-account-circle icon-md absolute-center text-dark"></i>
                                  </div>
                                  <p class="mt-4 mb-0">
                                      Increased since yesterday
                                  </p>
                                  <h3 class="mb-0 font-weight-bold mt-2 text-dark">
                                      50%
                                  </h3>
                              </div>
                          </div>
                      </div>
                      <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
                          <div class="card">
                              <div class="card-body text-center">
                                  <h5 class="mb-2 text-dark font-weight-normal">
                                      Impressions
                                  </h5>
                                  <h2 class="mb-4 text-dark font-weight-bold">
                                      100,38
                                  </h2>
                                  <div
                                      class="dashboard-progress dashboard-progress-3 d-flex align-items-center justify-content-center item-parent">
                                      <i class="mdi mdi-eye icon-md absolute-center text-dark"></i>
                                  </div>
                                  <p class="mt-4 mb-0">
                                      Increased since yesterday
                                  </p>
                                  <h3 class="mb-0 font-weight-bold mt-2 text-dark">
                                      35%
                                  </h3>
                              </div>
                          </div>
                      </div>
                      <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
                          <div class="card">
                              <div class="card-body text-center">
                                  <h5 class="mb-2 text-dark font-weight-normal">
                                      Followers
                                  </h5>
                                  <h2 class="mb-4 text-dark font-weight-bold">
                                      4250k
                                  </h2>
                                  <div
                                      class="dashboard-progress dashboard-progress-4 d-flex align-items-center justify-content-center item-parent">
                                      <i class="mdi mdi-cube icon-md absolute-center text-dark"></i>
                                  </div>
                                  <p class="mt-4 mb-0">
                                      Decreased since yesterday
                                  </p>
                                  <h3 class="mb-0 font-weight-bold mt-2 text-dark">
                                      25%
                                  </h3>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-12 grid-margin">
                          <div class="card">
                              <div class="card-body">
                                  <div class="row">
                                      <div class="col-sm-12">
                                          <div class="d-flex justify-content-between align-items-center mb-4">
                                              <h4 class="card-title mb-0">
                                                  Recent Activity
                                              </h4>
                                              <div class="dropdown dropdown-arrow-none">
                                                  <button class="btn p-0 text-dark dropdown-toggle" type="button"
                                                      id="dropdownMenuIconButton1" data-bs-toggle="dropdown"
                                                      aria-haspopup="true" aria-expanded="false">
                                                      <i class="mdi mdi-dots-vertical"></i>
                                                  </button>
                                                  <div class="dropdown-menu dropdown-menu-right"
                                                      aria-labelledby="dropdownMenuIconButton1">
                                                      <h6 class="dropdown-header">
                                                          Settings
                                                      </h6>
                                                      <a class="dropdown-item" href="#">Action</a>
                                                      <a class="dropdown-item" href="#">Another action</a>
                                                      <a class="dropdown-item" href="#">Something else
                                                          here</a>
                                                      <div class="dropdown-divider"></div>
                                                      <a class="dropdown-item" href="#">Separated link</a>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="col-lg-3 col-sm-4 grid-margin grid-margin-lg-0">
                                          <div class="wrapper pb-5 border-bottom">
                                              <div
                                                  class="text-wrapper d-flex align-items-center justify-content-between mb-2">
                                                  <p class="mb-0 text-dark">
                                                      Total Profit
                                                  </p>
                                                  <span class="text-success"><i
                                                          class="mdi mdi-arrow-up"></i>2.95%</span>
                                              </div>
                                              <h3 class="mb-0 text-dark font-weight-bold">
                                                  $ 92556
                                              </h3>
                                              <canvas id="total-profit"></canvas>
                                          </div>
                                          <div class="wrapper pt-5">
                                              <div
                                                  class="text-wrapper d-flex align-items-center justify-content-between mb-2">
                                                  <p class="mb-0 text-dark">
                                                      Expenses
                                                  </p>
                                                  <span class="text-success"><i
                                                          class="mdi mdi-arrow-up"></i>52.95%</span>
                                              </div>
                                              <h3 class="mb-4 text-dark font-weight-bold">
                                                  $ 59565
                                              </h3>
                                              <canvas id="total-expences"></canvas>
                                          </div>
                                      </div>
                                      <div class="col-lg-9 col-sm-8 grid-margin grid-margin-lg-0">
                                          <div class="ps-0 ps-lg-4">
                                              <div class="d-xl-flex justify-content-between align-items-center mb-2">
                                                  <div class="d-lg-flex align-items-center mb-lg-2 mb-xl-0">
                                                      <h3 class="text-dark font-weight-bold me-2 mb-0">
                                                          Devices sales
                                                      </h3>
                                                      <h5 class="mb-0">
                                                          ( growth 62% )
                                                      </h5>
                                                  </div>
                                                  <div class="d-lg-flex">
                                                      <p class="me-2 mb-0">
                                                          Timezone:
                                                      </p>
                                                      <p class="text-dark font-weight-bold mb-0">
                                                          GMT-0400 Eastern
                                                          Delight Time
                                                      </p>
                                                  </div>
                                              </div>
                                              <div class="graph-custom-legend clearfix" id="device-sales-legend">
                                              </div>
                                              <canvas id="device-sales"></canvas>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-sm-4 grid-margin stretch-card">
                          <div class="card card-danger-gradient">
                              <div class="card-body mb-4">
                                  <h4 class="card-title text-white">
                                      Account Retention
                                  </h4>
                                  <canvas id="account-retension"></canvas>
                              </div>
                              <div class="card-body bg-white pt-4">
                                  <div class="row pt-4">
                                      <div class="col-sm-6">
                                          <div class="text-center border-right border-md-0">
                                              <h4>Conversion</h4>
                                              <h1 class="text-dark font-weight-bold mb-md-3">
                                                  $306
                                              </h1>
                                          </div>
                                      </div>
                                      <div class="col-sm-6">
                                          <div class="text-center">
                                              <h4>Cancellation</h4>
                                              <h1 class="text-dark font-weight-bold">
                                                  $1,520
                                              </h1>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="col-sm-8 grid-margin stretch-card">
                          <div class="card">
                              <div class="card-body">
                                  <div class="d-xl-flex justify-content-between mb-2">
                                      <h4 class="card-title">
                                          Page views analytics
                                      </h4>
                                      <div class="graph-custom-legend primary-dot" id="pageViewAnalyticLengend"></div>
                                  </div>
                                  <canvas id="page-view-analytic"></canvas>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>