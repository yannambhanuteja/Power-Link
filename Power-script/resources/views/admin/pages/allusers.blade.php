@extends('layouts.admin')


  @section('content')

  <div class="content table-responsive table-full-width">
  <table class="table table-striped">

  <thead>
  <th>ID</th>
  <th>User Name</th>
  <th>User Email</th>
  <th>Referal Count</th>
  <th>Referal Commission</th>
  <th>Total Earnings</th>
  <th>Total Payouts Requested</th>
  <th>Total Payouts Paid</th>

  </thead>
  <tbody>

  @foreach($users as $user)




  <tr>
  <td>{{$user->id}} </td>
    <td>{{$user->name}} </td>
      <td>{{$user->email}} </td>
        <td> <?php 

        $referals = App\User::where('ref_id',$user->id)->get();


?>

{{$referals->count()}}

</td>
  <td><?php echo number_format((float)$user->ref_income, 4, '.', ''); ?>  $</td>
    <td><?php echo number_format((float)$user->earnings, 4, '.', ''); ?> $</td>
      <td>

      <?php   $requests = App\Payments::where('success','0')->where('user_id',$user->id)->get(); ?>
      {{$requests->sum('amount')}} $
        </td>
        <td> 
        <?php   $success = App\Payments::where('success','1')->where('user_id',$user->id)->get(); ?>
        {{$success->sum('amount')}} $
          </td>



          <tr>

          @endforeach
          </tbody>
          </table>
          <div class="pagination-center-align"> 
        {!! $users->links('vendor.pagination.simple-default');!!}
</div>
  </div>
  <style>
  .pagination-center-align{

    display: block;
    align-items: center;
    margin-left: 40%;
  }
</style>
  @endsection