@extends('layouts.admin-panel')

@section('title')
    Dashboard
@endsection

@section('content')

<div class="container pb-5">
    
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-4 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
    </div>

    <div class="row">
      
      <div class="col-md-4 pb-4">
        <div class="card border-0 shadow text-center" style="height: 125px">
          <h6 class="pt-4">Total Coupon</h6>
          <b class="display-6 pb-3">{{ number_format($totalcoupon) }}</b>
        </div>
      </div>

      <div class="col-md-4 pb-4">
        <div class="card border-0 shadow text-center" style="height: 125px">
          <h6 class="pt-4">Total Vendor</h6>
          <b class="display-6 pb-3">{{ number_format($totalvendor) }}</b>
        </div>
      </div>

      <div class="col-md-4 pb-4">
        <div class="card border-0 shadow text-center" style="height: 125px">
          <h6 class="pt-4">Total Apps User</h6>
          <b class="display-6 pb-3">{{ number_format($totaluser) }}</b>
        </div>
      </div>
      
    </div>

    <div class="row pb-4">
      <div class="col-md-8">
        <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
      </div>
      <div class="col-md-4">
        <div class="card border-0 shadow text-center" style="height: 22rem">
          <h6 class="pt-4">HUN Membership</h6>
          <canvas id="memberChart" style="width:100%; max-width:600px; height:55%; max-height:800px;"></canvas>
          <div class="table-responsive p-2">
            <table class="table table-borderless table-sm">
              <tr>
                <td class="text-end">Members</td>
                <td style="width: 1rem">:</td>
                <td class="text-start"style="width: 7.5rem">{{ $member }}</td>
              </tr>
              <tr>
                <td class="text-end">Non-members</td>
                <td style="width: 1rem">:</td>
                <td class="text-start" style="width: 7.5rem">{{ $nonmember }}</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>

<script>
  new Chart("myChart", {
    type: "bar",
    data: {
      labels: ['Category'],
      datasets: [{
        label: 'Automotive',
        backgroundColor: "#000080",
        data: [{{$automotive}}]
      }, {
        label: 'Business Support & Supplies',
        backgroundColor: "#d3d3d3",
        data: [{{$bss}}]
      }, {
        label: 'Computers & Electronics',
        backgroundColor: "#add8e6",
        data: [{{$ce}}]
      }, {
        label: 'Construction & Contractors',
        backgroundColor: "red",
        data: [{{$cc}}]
      }, {
        label: 'Education',
        backgroundColor: "green",
        data: [{{$education}}]
      },{
        label: 'Entertainment',
        backgroundColor: "orange",
        data: [{{$entertainment}}]
      }, {
        label: 'Food & Dining',
        backgroundColor: "#00aba9",
        data: [{{$fnd}}]
      }, {
        label: 'Health & Medicine',
        backgroundColor: "purple",
        data: [{{$hnm}}]
      }, {
        label: 'Home & Garden',
        backgroundColor: "yellow",
        data: [{{$hng}}]
      }, {
        label: 'Legal & Financial',
        backgroundColor: "cyan",
        data: [{{$lnf}}]
      },{
        label: 'Manufacturing, Wholesale & Distribution',
        backgroundColor: "maroon",
        data: [{{$mwd}}]
      }, {
        label: 'Merchants (Retail)',
        backgroundColor: "#b91d47",
        data: [{{$merchant}}]
      }, {
        label: 'Real Estate',
        backgroundColor: "black",
        data: [{{$estate}}]
      }, {
        label: 'Travel & Transportation',
        backgroundColor: "brown",
        data: [{{$travel}}]
      }]
    },
    options: {
      legend: {
        display: true,
        position: 'bottom',
        align: 'start'
        },
      title: {
        display: true,
        text: "Total Uploaded Coupon by Category"
      }
    }
  });
</script>

{{-- Members chart --}}
<script>
  var xValues = ["Members", "Non-members"];
  var yValues = [{{ $member }}, {{ $nonmember }}];
  var barColors = [
    "#00aba9",
    "#b91d47"
  ];
  
  new Chart("memberChart", {
    type: "doughnut",
    data: {
      labels: xValues,
      datasets: [{
        backgroundColor: barColors,
        data: yValues
      }]
    },
    options: {
      title: {
        display: false,
        text: "HUN Membership"
      }
    }
  });
</script>

@endsection