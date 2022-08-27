<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Using  soft delete in Laravel</title>
    {!! Html::style("/bootstrap/css/bootstrap.min.css") !!}
    {!! Html::script("/bootstrap/js/bootstrap.min.js")!!}
    {!! Html::script("/javascript/jquery-3.6.0.min.js")!!}
  </head>
  <body>
   <div class="container">
      <br/>
  <h1 class="text-center text-primary">How to use soft Delete</h1>
   <br />
   @if(session()->has('success'))
       <div class="alert alert-success">
         {{ session()->get('success') }}
       </div>
       @endif
   </div>
   <div class="card">
    <div class="card-header">
   <div class="row">
   <div class="col col-md-6">Sample Data</div>
   <div class="col col-md-6 text-right">
     @if (request()->has('view_deleted'))
     <a href="{{ route('delete.index') }}" class="btn btn-info btn-sm">View all list </a>
     <a href="{{ route('delete.restore_all') }}" class="btn btn-success btn-sm">Restore All List</a>
     @else
        <a href="{{ route('delete.index',['view_deleted'=>'DeletedRecords']) }}" class="btn btn-primary btn-sm">View Deleted List</a>
        @endif
   </div>
   </div>
    </div>
<div class="card-body">
   <div class="table-responsive">
      <table class="table table-bordered table->striped">
         <thead>
           <tr>
             <th>Id</th>
             <th>Name</th>
             <th>Description</th>
             <th>Action</th>
           </tr>
         </thead>
         <tbody>
           @if(count($post) > 0)
             @foreach($post as $row)
             <tr>
               <td>{{ $row->id }}</td>
               <td>{{ $row->name }}</td>
               <td>{{ $row->description }}</td>
               <td>
               @if(request()->has('view_deleted'))
               <a href="{{ route('delete.restore',$row->id) }}" class="btn btn-success btn-sm">Restore</a>
               @else
               <form class="" action="{{ route('delete.delete',$row->id) }}" method="post">
                  @csrf
                 <input type="hidden" name="_method" value="DELETE" />
                 <button type="submit" class="btn btn-danger btn-sm">Delete</button>
               </form>
               @endif
               </td>
             </tr>
             @endforeach
            @else
            <tr>
               <td colspan="4" class="text-center">No List Found</td>
            </tr>
            @endif
         </tbody>
      </table>
   </div>
</div>
   </div>
 </div>
  </body>
</html>

