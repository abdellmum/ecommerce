@extends('admin.admin_layouts')
@section('admin_content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="{{ route('admin.home') }}">Deshboard</a>
      <span class="breadcrumb-item active">Search Reports</span>
    </nav>

    <div class="sl-pagebody">
        <div class="row">
            <div class="col-12">
                <div class="card">
                     <div class="card-body">
                        <h4 class="text-left" style="font-size: 25px; font-weight: bold;"> 
                           Search Your Order Report
                        </h4>
                        <hr><br>

                         <!-- Search report form -->
                         <div class="row">
                             <div class="col-md-6">
                                 <form action="{{ route('admin.report.date.search') }}" method="POST">
                                    @csrf
                                     <div class="form-group">
                                         <label for="">Search By Date</label>
                                         <input type="date" class="form-control" name="date">
                                     </div>
                                     <div class="form-group">
                                        <button type="submit" class="btn btn-primary" style="margin-left: 88%;">Search</button>
                                    </div>
                                 </form>
                             </div><!-- end col md 6 -->

                             <div class="col-md-6">
                                <form action="{{ route('admin.report.month.search') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">Search By Month</label>
                                        <select name="month" class="form-control">
                                            <option value="01">January</option>
                                            <option value="02">February</option>
                                            <option value="03">March</option>
                                            <option value="04">April</option>
                                            <option value="05">May</option>
                                            <option value="06">June</option>
                                            <option value="07">July</option>
                                            <option value="08">Augest</option>
                                            <option value="09">September</option>
                                            <option value="10">October</option>
                                            <option value="11">Nomember</option>
                                            <option value="12">December</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                       <button type="submit" class="btn btn-primary" style="margin-left: 88%;">Search</button>
                                   </div>
                                </form>
                            </div><!-- end col md 6 -->
                         </div><!-- end row-->
                         <br>

                          <!-- Search report form -->
                          <div class="row">
                            <div class="col-md-6">
                                <form action="{{ route('admin.report.year.search') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">Search By Year</label>
                                        <select name="year" class="form-control">
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
                                            <option value="2026">2026</option>
                                            <option value="2027">2027</option>
                                            <option value="2028">2028</option>
                                            <option value="2029">2029</option>
                                            <option value="2030">2030</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                       <button type="submit" class="btn btn-primary" style="margin-left: 88%;">Search</button>
                                   </div>
                                </form>
                            </div><!-- end col md 6 -->

                            <div class="col-md-6">
                            <span for="">Search By Spacefic Date Wais Example(01/01/2021 To 01/01/2022)</span>
                            <form action="{{ route('admin.report.between.search') }}" method="POST">
                                @csrf
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="date" name="start_date" class="form-control">
                                        </div>   
                                    </div><!-- end form col 6 -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="date" name="end_date" class="form-control">
                                        </div>   
                                    </div><!-- end form col 6 -->
                                </div><!-- end form row -->
                                <button type="submit" class="btn btn-primary" style="margin-left: 88%;">Search</button>
                            </form>
                           </div><!-- end col md 6 -->

                        </div><!-- end row-->
                    </div>
                </div>
            </div>
        </div><!-- row --->
    </div><!-- sl-pagebody -->

</div><!-- sl-mainpanel -->
@endsection
