@extends("template.master")
@section("content")
    @include('flash::message')

        <div class="row col-lg-10">
            <table class="table table-striped">
                <thead>
                    <td>Name</td>
                    <td>Price</td>
                    <td>Image</td>
                </thead>

                <tbody>
                    @foreach($products as $product)

                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->price }}</td>
                            <td>
                                <img class="img-responsive" minimal-lightbox class="b-link-fade b-animate-go" src="/images/{{ $product->name .'.'. $product->image_extension . '?' . 'time='. time() }}">
                            <td>
                                {!! Form::model($product, ['route' => ['products.destroy', $product->id], 'method' => 'DELETE']) !!}
                                <div class="form-group">
                                    {!! Form::submit('Delete', array('class' => 'btn btn-raised btn-danger', 'Onclick' => 'return confirmDelete();')) !!}
                                </div>
                                   {!! Form::close() !!}
                            </td>

                            <td>
                                <div class="form-group">
                                    {!! link_to(route('products.edit', $product->id), 'Edit', ['class' => 'btn btn-raised btn-info']) !!}
                                </div>
                            </td>

                        </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
        <script src="js/minimal.lightbox.js"></script>
@stop