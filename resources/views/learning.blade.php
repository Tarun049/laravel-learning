<h1>Learning view</h1>

@if ( $subjects == 'English' )
    <h3>{{$subjects}}</h3>
@else
    <h3>no</h3>
@endif

<x-learning componentName="learning"/>
@include('inner')

@foreach ($subjects as $item)
    <h4>{{$item}}</h4>
@endforeach

<script>
    var data = @json($subjects);
    console.log(data);
</script>
@csrf