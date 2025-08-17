<div>
    <h1>Product list</h1>
<!--    
    {{print_r($product);
    }} -->
   
    <table border = "1">
        <tr>
           <td>Name</td> 
           <td>Code</td> 
           <td>category</td> 
           <td>date</td> 
           <td>status</td> 
</tr>

        @foreach($product as $key)
        <tr>
            <td>{{$key ->name}}</td>
            <td>{{$key ->code}}</td>
            <td>{{$key ->category}}</td>
            <td>{{$key ->addedDate}}</td>
            <td>{{$key ->status}}</td>
        </tr>
        @endforeach
        <table>
            <!-- Because you are alive, everything is possible. - Thich Nhat Hanh -->
</div>
