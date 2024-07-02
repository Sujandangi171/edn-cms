 <!-- Content Wrapper. Contains page content -->

 <!-- Content Header (Page header) -->
 <div class="content-header">
     <div class="container-fluid">
         <div class="row m-1">
             <div class="col-sm-6">
                 <h1 class="m-0 text-dark">{{ $moduleName . ' ' . 'Management' ?? '' }}</h1>

             </div><!-- /.col -->
             <div class="col-sm-6">
                 <ol class="breadcrumb float-sm-right">
                     @foreach ($breadCrumb as $bread)
                         {{-- @dump($bread) --}}
                         <li class="breadcrumb-item">
                             @if (isset($bread['active']))
                                 <a href="{{ route($bread['link']) }}">{{ $bread['title'] }}</a>
                             @else
                                 {{ $bread['title'] }}
                             @endif
                         </li>
                     @endforeach
                 </ol>
             </div><!-- /.col -->
         </div><!-- /.row -->
     </div><!-- /.container-fluid -->
 </div>
 <!-- /.content-header -->
