@extends('layouts.app')
@section('content')
    <section>
        <div class="d-flex justify-content-between">
            <div>
                <h3>Dashboard</h3>
                <p>Welcome back admin</p>
            </div>
            <div>
                <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                    <option selected>Filter Date</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
            </div>
        </div>
        <div class="grey-bg my-2">
            <section id="minimal-statistics">
              <div class="row mb-4">
                <div class="col-xl-3 col-sm-6 col-12 gap-3"> 
                  <div class="card">
                    <div class="card-content">
                      <div class="card-body">
                        <div class="media d-flex">
                          <div class="align-self-center">
                            <i class="icon-pencil primary font-large-2 float-left"></i>
                          </div>
                          <div class="media-body text-right">
                            <h3>278</h3>
                            <span>New Posts</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                  <div class="card">
                    <div class="card-content">
                      <div class="card-body">
                        <div class="media d-flex">
                          <div class="align-self-center">
                            <i class="icon-speech warning font-large-2 float-left"></i>
                          </div>
                          <div class="media-body text-right">
                            <h3>156</h3>
                            <span>New Comments</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                  <div class="card">
                    <div class="card-content">
                      <div class="card-body">
                        <div class="media d-flex">
                          <div class="align-self-center">
                            <i class="icon-graph success font-large-2 float-left"></i>
                          </div>
                          <div class="media-body text-right">
                            <h3>64.89 %</h3>
                            <span>Bounce Rate</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                  <div class="card">
                    <div class="card-content">
                      <div class="card-body">
                        <div class="media d-flex">
                          <div class="align-self-center">
                            <i class="icon-pointer danger font-large-2 float-left"></i>
                          </div>
                          <div class="media-body text-right">
                            <h3>423</h3>
                            <span>Total Visits</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            
              <div class="row">
                <div class="col-xl-3 col-sm-6 col-12">
                  <div class="card">
                    <div class="card-content">
                      <div class="card-body">
                        <div class="media d-flex">
                          <div class="media-body text-left">
                            <h3 class="danger">278</h3>
                            <span>New Projects</span>
                          </div>
                          <div class="align-self-center">
                            <i class="icon-rocket danger font-large-2 float-right"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                  <div class="card">
                    <div class="card-content">
                      <div class="card-body">
                        <div class="media d-flex">
                          <div class="media-body text-left">
                            <h3 class="success">156</h3>
                            <span>New Clients</span>
                          </div>
                          <div class="align-self-center">
                            <i class="icon-user success font-large-2 float-right"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            
                <div class="col-xl-3 col-sm-6 col-12">
                  <div class="card">
                    <div class="card-content">
                      <div class="card-body">
                        <div class="media d-flex">
                          <div class="media-body text-left">
                            <h3 class="warning">64.89 %</h3>
                            <span>Conversion Rate</span>
                          </div>
                          <div class="align-self-center">
                            <i class="icon-pie-chart warning font-large-2 float-right"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                  <div class="card">
                    <div class="card-content">
                      <div class="card-body">
                        <div class="media d-flex">
                          <div class="media-body text-left">
                            <h3 class="primary">423</h3>
                            <span>Support Tickets</span>
                          </div>
                          <div class="align-self-center">
                            <i class="icon-support primary font-large-2 float-right"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
        </div>
    </section>
@endsection