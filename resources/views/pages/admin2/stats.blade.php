@extends('layouts.admin2')

@section('content')
@include('includes.admin2.nav')

<section id="content">
    
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h3 class="mb-0">Important Numbers</h3>
                </div>
            </div>
        </div>
    </div>

    <style type="text/css">
        .big-table-container {
            overflow-x: auto;
        }
        .big-table td {
            min-width: 80px !important;
        }
    </style>

    <div class="page-section padded-10 mb-20">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mb-20">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="big-table-container">
                               <table class="table table-sm table-bordered mb-0 big-table table-hover text-center b-bold">
                                   <tbody>
                                       <tr>
                                           <td></td>
                                           <td class="bl-bold br-bold"><strong>All time</strong></td>
                                           <td class="bl-bold br-bold" colspan="4"><strong>October 2020</strong></td>
                                           <td class="bl-bold br-bold" colspan="4"><strong>November 2020</strong></td>
                                           <td class="bl-bold br-bold" colspan="4"><strong>December 2020</strong></td>
                                       </tr>
                                       <tr>
                                           <td></td>
                                           <td class="bl-bold br-bold"></td>
                                           
                                           <td>W1 <br>1 - 7</td>
                                           <td>W2 <br>8 - 14</td>
                                           <td>W3 <br>15 - 21</td>
                                           <td class="br-bold">W4 <br>22 - 31</td>

                                           <td>W1 <br>1 - 7</td>
                                           <td>W2 <br>8 - 14</td>
                                           <td>W3 <br>15 - 21</td>
                                           <td class="br-bold">W4 <br>22 - 30</td>

                                           <td>W1 <br>1 - 7</td>
                                           <td>W2 <br>8 - 14</td>
                                           <td>W3 <br>15 - 21</td>
                                           <td class="br-bold">W4 <br>22 - 31</td>
                                       </tr>
                                       <tr>
                                           <td class="text-left">Members</td>
                                           <td class="text-right bl-bold br-bold">3,201</td>

                                           <td class="text-right">123</td>
                                           <td class="text-right">123</td>
                                           <td class="text-right">123</td>
                                           <td class="text-right br-bold">123</td>
                                           
                                           <td class="text-right">123</td>
                                           <td class="text-right">123</td>
                                           <td class="text-right">123</td>
                                           <td class="text-right br-bold">123</td>
                                           
                                           <td class="text-right">123</td>
                                           <td class="text-right">123</td>
                                           <td class="text-right">123</td>
                                           <td class="text-right br-bold">123</td>
                                       </tr>
                                       <tr>
                                           <td class="text-left">Phone verified</td>
                                           <td class="text-right bl-bold br-bold">1,201</td>

                                           <td class="text-right">123</td>
                                           <td class="text-right">123</td>
                                           <td class="text-right">123</td>
                                           <td class="text-right br-bold">123</td>

                                           <td class="text-right">123</td>
                                           <td class="text-right">123</td>
                                           <td class="text-right">123</td>
                                           <td class="text-right br-bold">123</td>

                                           <td class="text-right">123</td>
                                           <td class="text-right">123</td>
                                           <td class="text-right">123</td>
                                           <td class="text-right br-bold">123</td>
                                       </tr>
                                       <tr>
                                           <td class="text-left">Unique visitors (GA)</td>
                                           <td class="text-right bl-bold br-bold">1,201</td>

                                           <td class="text-right">123</td>
                                           <td class="text-right">123</td>
                                           <td class="text-right">123</td>
                                           <td class="text-right br-bold">123</td>

                                           <td class="text-right">123</td>
                                           <td class="text-right">123</td>
                                           <td class="text-right">123</td>
                                           <td class="text-right br-bold">123</td>

                                           <td class="text-right">123</td>
                                           <td class="text-right">123</td>
                                           <td class="text-right">123</td>
                                           <td class="text-right br-bold">123</td>
                                       </tr>
                                       <tr>
                                           <td class="text-left">Total checkout</td>
                                           <td class="text-right bl-bold br-bold">Rp 1,201,000</td>

                                           <td class="text-right bb-bold">Rp 1,201,000</td>
                                           <td class="text-right bb-bold">Rp 1,201,000</td>
                                           <td class="text-right bb-bold">Rp 1,201,000</td>
                                           <td class="text-right br-bold">Rp 1,201,000</td>

                                           <td class="text-right">Rp 1,201,000</td>
                                           <td class="text-right">Rp 1,201,000</td>
                                           <td class="text-right">Rp 1,201,000</td>
                                           <td class="text-right br-bold">Rp 1,201,000</td>

                                           <td class="text-right">Rp 1,201,000</td>
                                           <td class="text-right">Rp 1,201,000</td>
                                           <td class="text-right">Rp 1,201,000</td>
                                           <td class="text-right br-bold">Rp 1,201,000</td>
                                       </tr>
                                   </tbody>
                               </table> 
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<section id="page-modals">
    
</section>

<style type="text/css">
    /*page specific css*/
    .b-bold {
        border: 2px solid #aaa !important;
    }
    .bl-bold {
        border-left: 2px solid #aaa !important;
    }
    .br-bold {
        border-right: 2px solid #aaa !important;
    }
    .bt-bold {
        border-top: 2px solid #aaa !important;
    }
    .bb-bold {
        border-bottom: 2px solid #aaa !important;
    }
</style>
@endsection
@section('js')
<script>
    $(document).ready(function() {
        
        // page specific scripts

    })
</script>
@endsection