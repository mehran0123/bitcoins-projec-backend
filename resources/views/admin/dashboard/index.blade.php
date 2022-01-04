@extends('layouts.master')
@section('title','Dashboard')
@section('dashboard','has-active')
@section('content')
<div class="container-full">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <h3>
            Dashboard
            <small>Control panel</small>
        </h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"> Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-3">
                <div class="box bg-light counter-card">
                    <div class="box-body text-center">
                        <h4 class="cardscounter">TOTAL DEPOSITED</h4>
                        <h3>{{$deposits}} <small class="text-light">USD</small></h3>
                        <span>$</span>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="box bg-light counter-card">
                    <div class="box-body text-center">
                        <h4 class="cardscounter">TOTAL Withdraw</h4>
                        <h3>0 <small class="text-light">USD</small></h3>
                        <span>$</span>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="box bg-light counter-card">
                    <div class="box-body text-center">
                        <h4 class="cardscounter">Right Point</h4>
                        <h3>{{ Auth::user()->right_points  }} <small class="text-light"></small></h3>
                        <i class="fa fa-cubes" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="box bg-light counter-card">
                    <div class="box-body text-center">
                        <h4 class="cardscounter">Left Points</h4>
                        <h3>{{ Auth::user()->left_points  }} <small class="text-light"></small></h3>
                        <i class="fa fa-cubes" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block" src="{{ URL::to('/public/admin/assets') }}/images/banner1.png" alt=" slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block" src="{{ URL::to('/public/admin/assets') }}/images/banner2.png" alt=" slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block" src="{{ URL::to('/public/admin/assets') }}/images/banner3.png" alt=" slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
               <div class="col-12">
                    <div class="box p-4">
                        <h2>Ranks & Achivements</h2>
                        Get The Most Points to Achive Ranks and Get Amazing Bonuses
                        <table class="ranks-section">
                            <tr>
                                <td><h3>Current Rank</h3></td>
                                <td><h3>Rank Badge</h3></td>
                                <td><h3>Total Points</h3></td>
                                <td><h3>Next Rank</h3></td>

                            </tr>
                            <tr>
                                <td><h4>Current Rank</h4></td>
                                <td><h4>Rank Badge</h4></td>
                                <td><h4>Total Points</h4></td>
                                <td><h4>Next Rank</h4></td>
                            </tr>
                        </table>
                    </div>
                </div>
            <div class="col-12">
                    {{-- <!-- TradingView Widget BEGIN -->
                    <div class="tradingview-widget-container m-5">
                        <div class="tradingview-widget-container__widget"></div>
                        <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/markets/stocks-usa/" rel="noopener" target="_blank"></a></div>
                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-hotlists.js" async>
                            {
                            "colorTheme": "light",
                            "dateRange": "12M",
                            "exchange": "NASDAQ",
                            "showChart": true,
                            "locale": "en",
                            "largeChartUrl": "",
                            "isTransparent": false,
                            "showSymbolLogo": true,
                            "showFloatingTooltip": false,
                            "width": "400",
                            "height": "600",
                            "plotLineColorGrowing": "rgba(255, 255, 0, 1)",
                            "plotLineColorFalling": "rgba(255, 255, 0, 1)",
                            "gridLineColor": "rgba(0, 0, 0, 0)",
                            "scaleFontColor": "rgba(120, 123, 134, 1)",
                            "belowLineFillColorGrowing": "rgba(41, 98, 255, 0.12)",
                            "belowLineFillColorFalling": "rgba(41, 98, 255, 0.12)",
                            "belowLineFillColorGrowingBottom": "rgba(41, 98, 255, 0)",
                            "belowLineFillColorFallingBottom": "rgba(41, 98, 255, 0)",
                            "symbolActiveColor": "rgba(41, 98, 255, 0.12)"
                            }
                        </script>
                    </div>
                    <!-- TradingView Widget END --> --}}
                    <!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
    <div class="tradingview-widget-container__widget"></div>
    <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/crypto-screener/" rel="noopener" target="_blank"><span class="blue-text">Crypto Screener</span></a> by TradingView</div>
    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-screener.js" async>
    {
    "width": "100%",
    "height": "523",
    "defaultColumn": "overview",
    "defaultScreen": "general",
    "market": "crypto",
    "showToolbar": true,
    "colorTheme": "light",
    "locale": "en"
  }
    </script>
  </div>
  <!-- TradingView Widget END -->
            </div>
                {{-- <div class="col-6">
                        <!-- TradingView Widget BEGIN -->
                        <div class="tradingview-widget-container m-5">
                            <div class="tradingview-widget-container__widget"></div>
                            <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/markets/" rel="noopener" target="_blank"></div>
                            <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-market-overview.js" async>
                                {
                                "colorTheme": "light",
                                "dateRange": "12M",
                                "showChart": true,
                                "locale": "en",
                                "largeChartUrl": "",
                                "isTransparent": false,
                                "showSymbolLogo": true,
                                "showFloatingTooltip": false,
                                "width": "400",
                                "height": "660",
                                "plotLineColorGrowing": "rgba(255, 255, 0, 1)",
                                "plotLineColorFalling": "rgba(255, 255, 0, 1)",
                                "gridLineColor": "rgba(0, 0, 0, 0)",
                                "scaleFontColor": "rgba(255, 255, 255, 1)",
                                "belowLineFillColorGrowing": "rgba(41, 98, 255, 0.12)",
                                "belowLineFillColorFalling": "rgba(41, 98, 255, 0.12)",
                                "belowLineFillColorGrowingBottom": "rgba(0, 0, 0, 0)",
                                "belowLineFillColorFallingBottom": "rgba(0, 0, 0, 0)",
                                "symbolActiveColor": "rgba(41, 98, 255, 0.12)",
                                "tabs": [
                                  {
                                    "title": "Indices",
                                    "symbols": [
                                      {
                                        "s": "FOREXCOM:SPXUSD",
                                        "d": "S&P 500"
                                      },
                                      {
                                        "s": "FOREXCOM:NSXUSD",
                                        "d": "US 100"
                                      },
                                      {
                                        "s": "FOREXCOM:DJI",
                                        "d": "Dow 30"
                                      },
                                      {
                                        "s": "INDEX:NKY",
                                        "d": "Nikkei 225"
                                      },
                                      {
                                        "s": "INDEX:DEU40",
                                        "d": "DAX Index"
                                      },
                                      {
                                        "s": "FOREXCOM:UKXGBP",
                                        "d": "UK 100"
                                      }
                                    ],
                                    "originalTitle": "Indices"
                                  },
                                  {
                                    "title": "Futures",
                                    "symbols": [
                                      {
                                        "s": "CME_MINI:ES1!",
                                        "d": "S&P 500"
                                      },
                                      {
                                        "s": "CME:6E1!",
                                        "d": "Euro"
                                      },
                                      {
                                        "s": "COMEX:GC1!",
                                        "d": "Gold"
                                      },
                                      {
                                        "s": "NYMEX:CL1!",
                                        "d": "Crude Oil"
                                      },
                                      {
                                        "s": "NYMEX:NG1!",
                                        "d": "Natural Gas"
                                      },
                                      {
                                        "s": "CBOT:ZC1!",
                                        "d": "Corn"
                                      }
                                    ],
                                    "originalTitle": "Futures"
                                  },
                                  {
                                    "title": "Bonds",
                                    "symbols": [
                                      {
                                        "s": "CME:GE1!",
                                        "d": "Eurodollar"
                                      },
                                      {
                                        "s": "CBOT:ZB1!",
                                        "d": "T-Bond"
                                      },
                                      {
                                        "s": "CBOT:UB1!",
                                        "d": "Ultra T-Bond"
                                      },
                                      {
                                        "s": "EUREX:FGBL1!",
                                        "d": "Euro Bund"
                                      },
                                      {
                                        "s": "EUREX:FBTP1!",
                                        "d": "Euro BTP"
                                      },
                                      {
                                        "s": "EUREX:FGBM1!",
                                        "d": "Euro BOBL"
                                      }
                                    ],
                                    "originalTitle": "Bonds"
                                  },
                                  {
                                    "title": "Forex",
                                    "symbols": [
                                      {
                                        "s": "FX:EURUSD"
                                      },
                                      {
                                        "s": "FX:GBPUSD"
                                      },
                                      {
                                        "s": "FX:USDJPY"
                                      },
                                      {
                                        "s": "FX:USDCHF"
                                      },
                                      {
                                        "s": "FX:AUDUSD"
                                      },
                                      {
                                        "s": "FX:USDCAD"
                                      }
                                    ],
                                    "originalTitle": "Forex"
                                  }
                                ]
                                }
                            </script>
                        </div>
                        <!-- TradingView Widget END -->

                </div> --}}
                <div class="col-12">
<!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
    <div class="tradingview-widget-container__widget"></div>
    <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/screener/" rel="noopener" target="_blank"><span class="blue-text">Stock Screener</span></a> by TradingView</div>
    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-screener.js" async>
    {
    "width": "1100",
    "height": "523",
    "defaultColumn": "overview",
    "defaultScreen": "most_capitalized",
    "showToolbar": true,
    "locale": "en",
    "market": "us",
    "colorTheme": "light"
  }
    </script>
  </div>
  <!-- TradingView Widget END -->
                </div>
            </div>
    </section>
    <!-- /.content -->
    </div>
@endsection
