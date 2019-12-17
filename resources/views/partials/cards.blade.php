
    
<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="overview-wrap">
                        {{-- <h2 class="title-1">Quick Links</h2> --}}
                        <a title="Add New Cases" href="{{route('Add New Case')}}">
                            <button class="au-btn btn-lg au-btn-icon au-btn--gray" id="buttonadd">
                                <i class="zmdi zmdi-plus" style="font-weight: 1000" ></i>add cases
                            </button>
                        </a>

                        <h1 class="fullview"><u> <?php echo \Request::route()->getName() ; ?> </u></h1>
                        <a title="Show Decided Cases" href="{{route('Decided Cases')}}">
                            <button class="au-btn btn-lg au-btn-icon au-btn--gray top-space" id="buttonadd">
                                <i class="fas fa-check"></i>decided cases
                            </button>
                        </a>
                        <h1 class="halfview"><u> <?php echo \Request::route()->getName() ; ?> </u></h1>
                        
                        
                    </div>
                    <hr>
                </div>
            </div>
            
            <div class="row m-t-25">
                <div  class="col-sm-6 col-lg-3 col-xs-12">
                    <div class="overview-item overview-item--c1">
                        <a href="{{route('All Cases')}}" id="allcasebtn">
                        <div class="overview__inner">
                            <div class="overview-box clearfix">
                                <div class="icon">
                                    <i class="far fa-folder-open"></i>
                                </div>
                                <div class="text">
                                <h2>{{$data['allcases']}}</h2>
                                    <span>All Cases</span>                                   
                                </div>
                            </div>    
                        </div>
                        </a>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div title="Show Todays Cases" class="overview-item overview-item--c1">
                        <a href="{{route('Today Cases')}}">
                        <div class="overview__inner">
                            <div class="overview-box clearfix">
                                <div class="icon">
                                    <i class="fa fa-tasks"></i>
                                    {{-- <i class="zmdi zmdi-shopping-cart"></i> --}}
                                </div>
                                <div class="text">
                                    <h2>{{$data['todaycases']}}</h2>
                                    <span>Today Cases</span>
                                </div>
                            </div>                            
                        </div>
                        </a>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div title="Show Next Day Cases" class="overview-item overview-item--c1">
                        <a href="{{route('Next Day Cases')}}">
                        <div class="overview__inner">
                            <div class="overview-box clearfix">
                                <div class="icon">
                                        <i class="fa fa-mail-forward"></i>
                                    {{-- <i class="zmdi zmdi-calendar-note"></i> --}}
                                </div>
                                <div class="text">
                                    <h2>{{$data['nextdaycases']}}</h2>
                                    <span>Next Day Cases</span>
                                </div>
                            </div>  
                        </div>
                        </a>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div title="Show All Cases Who's Next Date Is Not Updated" class="overview-item overview-item--c1">
                        <a href="{{route('Pending Cases')}}">
                        <div class="overview__inner">
                            <div class="overview-box clearfix">
                                <div class="icon">
                                    <i class="fa fa-calendar-times-o"></i>
                                    {{-- <i class="zmdi zmdi-money"></i> --}}
                                </div>
                                <div class="text">
                                    <h2>{{$data['pendingcases']}}</h2>
                                    <span>Pending Cases</span>
                                </div>
                            </div>   
                        </div>
                        </a>
                    </div>
                </div>
            </div>
            <hr style="font-weight:1000">